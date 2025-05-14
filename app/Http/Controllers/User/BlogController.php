<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class BlogController extends Controller
{
    private $currentPageTitles = 'Blog';

    public function index()
    {
        $id = Auth::id();
        $blogs = Blog::where('user_id', $id)->get();

        return view('user.blog.index', compact('blogs'));
    }

    public function create(){
        return view ('user.blog.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required',
        ]);

        $blog = new Blog();

        $blog->name = $request->name;
        $blog->description = $request->description;
        $blog->user_id = Auth::id();
        if($blog->save()){
            return redirect()->route('user.blog')->with('success', $this->currentPageTitles.' has been added successfully.');
        }else{
            return back()->with('error', 'Something went wrong.');
        };
    }

    public function edit($id)
    {
        $id = decrypt($id);
        $blog = Blog::where('id', $id)->first();
        return view ('user.blog.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required',
        ]);

        $blog = Blog::findOrFail($id);
        $blog->name = $request->name;
        $blog->description = $request->description;

        if($blog->save()){
            return redirect()->route('user.blog')->with('success', $this->currentPageTitles.' has been updated successfully.');
        }else{
            return back()->with('error', 'Something went wrong.');
        };
    }

    public function delete($id)
    {
        $id = decrypt($id);

        $blog = Blog::where('id', $id)->first();
        if($blog->delete()){
            return back()->with('success', $this->currentPageTitles.' has been deleted successfully.');
        }else{
            return back()->with('error', 'Something went wrong.');
        };
    }

    public function bulkDelete($ids)
    {
        $encryptedIds = explode(',', $ids);
        $blogIds = [];

        try {
            foreach ($encryptedIds as $encryptedId) {
                $blogIds[] = decrypt($encryptedId);
            }
        } catch (DecryptException $e) {
            return redirect()->back()->with('error', 'Invalid user selection.');
        }

        Blog::whereIn('id', $blogIds)->delete();

        return redirect()->route('user.blog')->with('success', 'Selected blogs have been deleted.');
    }

}
