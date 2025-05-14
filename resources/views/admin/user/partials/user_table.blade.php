<table class="table table-bordered" id="{{ $tableId ?? 'userTable' }}">
    <thead>
        <tr>
            <th><input type="checkbox" id="selectAll"></th>
            <th style="width: 10px">#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Status</th>
            <th style="width: 120px" data-sortable="false">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $key => $user)
            <tr>
                <td><input type="checkbox" class="userCheckbox" data-id="{{ encrypt($user->id) }}"></td>
                <td>{{ $key + 1 }}</td>
                <td>
                    {{ $user->name }}
                    <i class="fas fa-circle {{ $user->status == 'active' ? 'text-success' : 'text-danger' }}" style="font-size: 8px;"></i>
                </td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->gender }}</td>
                <td>{{ $user->status }}</td>
                <td>
                    <div>
                        <a href="{{ url('admin/user/' . encrypt($user->id) . '/edit') }}" class="mr-3"><i class="fa fa-edit bts-popup-close mt-2"></i></a>
                        <a href="#" onclick="confirmDelete('{{ encrypt($user->id) }}')"><i class="fa fa-times bts-popup-close mt-2 mr-2"></i></a>
                        <form action="{{ route('admin.user.toggleStatus', encrypt($user->id)) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Are you sure you want to change status?')">
                            @csrf
                            <button type="submit" class="btn btn-sm {{ $user->status === 'active' ? 'btn-success' : 'btn-secondary' }}" title="Toggle Status">
                                <i class="fas {{ $user->status === 'active' ? 'fa-check-circle' : 'fa-ban' }}"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
