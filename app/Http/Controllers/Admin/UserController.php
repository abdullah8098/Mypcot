<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Carbon\Carbon;


class UserController extends Controller
{
    private $currentPageTitles = 'User';

    public function index()
    {
        $users = User::where('role', 1)->get();
        $activeUsers = User::where('role', 1)->where('status', 'active')->get();
        $inactiveUsers = User::where('role', 1)->where('status', 'inactive')->get();

        return view('admin.user.index', compact('users', 'activeUsers', 'inactiveUsers'));
    }

    public function create(){
        return view ('admin.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required||email|unique:users,email',
            'passwords' => 'required|string',
            'gender' => 'required',
        ]);

        $user = new User();

        $user->name = $request->name;
        $user->role = 1;
        $user->email = $request->email;
        $user->password = bcrypt($request->passwords);
        $user->gender = $request->gender;
        $user->save();
        if($user->save()){
            return redirect()->route('admin.user')->with('success', $this->currentPageTitles.' has been added successfully.');
        }else{
            return back()->with('error', 'Something went wrong.');
        };
    }

    public function edit($id)
    {
        $id = decrypt($id);
        $user = User::where('id', $id)->first();
        return view ('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($id)
            ],
            'gender' => 'required',
            'passwords' => 'nullable|string',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->gender = $request->gender;

        if ($request->filled('passwords') && !Hash::check($request->passwords, $user->password)) {
            $user->password = bcrypt($request->passwords);
        }

        if($user->save()){
            return redirect()->route('admin.user')->with('success', $this->currentPageTitles.' has been updated successfully.');
        }else{
            return back()->with('error', 'Something went wrong.');
        };
    }

    public function delete($id)
    {
        $id = decrypt($id);

        $user = User::where('id', $id)->first();
        if($user->delete()){
            return back()->with('success', $this->currentPageTitles.' has been deleted successfully.');
        }else{
            return back()->with('error', 'Something went wrong.');
        };
    }

    public function bulkDelete($ids)
    {
        $encryptedIds = explode(',', $ids);
        $userIds = [];

        try {
            foreach ($encryptedIds as $encryptedId) {
                $userIds[] = decrypt($encryptedId);
            }
        } catch (DecryptException $e) {
            return redirect()->back()->with('error', 'Invalid user selection.');
        }

        User::whereIn('id', $userIds)->delete();

        return redirect()->route('admin.user')->with('success', 'Selected users have been deleted.');
    }

    public function toggleStatus($id)
    {
        $id = decrypt($id);
        $user = User::findOrFail($id);
        $user->status = $user->status === 'active' ? 'inactive' : 'active';
        $user->save();

        return back()->with('success', $this->currentPageTitles.' status updated successfully.');
    }

}
