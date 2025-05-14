@extends('admin.layouts.master')

@section('content')
    <div class="content-wrapper" style="min-height: 1345.31px;">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-7">
                        <h1>Users List</h1>
                    </div>
                    <div class="col-sm-5">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard"><i class="nav-icon fa fa-dashboard"></i>
                                    &nbsp;&nbsp;Home</a></li>
                            <li class="breadcrumb-item active">Users List</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card card-primary card-outline">
                            <div class="row mb-7 mt-3 mr-3">
                                <div class="col-sm-8">
                                    <h1></h1>
                                </div>
                                <div class="col-sm-4 text-end">
                                    <a href="{{ route('admin.user.create') }}" class="btn btn-primary mb-2 mt-2" style="width: 120px; border-radius: 5px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); transition: all 0.3s ease;">
                                        Add
                                    </a>
                                    <button class="btn btn-danger" id="bulkDeleteBtn" style="width: 140px; border-radius: 5px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); transition: all 0.3s ease;">
                                        Bulk Delete
                                    </button>
                                </div>
                            </div>
                            <hr>

                            <ul class="nav nav-tabs ml-2" id="userTabs">
                                <li class="nav-item">
                                    <a class="nav-link active" id="all-tab" data-toggle="tab" href="#all" role="tab">All</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="active-tab" data-toggle="tab" href="#active" role="tab">Active</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="inactive-tab" data-toggle="tab" href="#inactive" role="tab">Inactive</a>
                                </li>
                            </ul>
                            <div class="tab-content mt-3">
                                <div class="tab-pane fade show active" id="all" role="tabpanel">
                                    @include('admin.user.partials.user_table', ['users' => $users, 'tableId' => 'allTable'])
                                </div>
                                <div class="tab-pane fade" id="active" role="tabpanel">
                                    @include('admin.user.partials.user_table', ['users' => $activeUsers, 'tableId' => 'activeTable'])
                                </div>
                                <div class="tab-pane fade" id="inactive" role="tabpanel">
                                    @include('admin.user.partials.user_table', ['users' => $inactiveUsers, 'tableId' => 'inactiveTable'])
                                </div>
                            </div>

                            {{-- <div class="card-body" style="overflow-x: auto;">
                                <table class="table table-bordered" id="userTable">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="selectAll"></th>
                                            <th style="width: 10px">#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Gender</th>
                                            <th>Status</th>
                                            <th style="width: 100px" data-sortable="false">Action</th>
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
                            </div> --}}
                        </div>
                    </div>
                </div>

            </div>
        </section>

    </div>
@endsection

@section('scripts')
    <script>
        function confirmDelete(id) {
            var result = window.confirm("Are you sure you want to delete?");
            if (result) {
                window.location.href = "{{ url('admin/user/') }}/" + id + "/delete";
            }
        }

        $(document).ready(function() {
            $('#allTable').DataTable();
            $('#activeTable').DataTable();
            $('#inactiveTable').DataTable();
            $('#selectAll').on('change', function() {
                $('.userCheckbox').prop('checked', $(this).prop('checked'));
                toggleBulkDeleteButton();
            });

            $(document).on('change', '.userCheckbox', function() {
                toggleBulkDeleteButton();
            });

            $('#bulkDeleteBtn').on('click', function() {
                var selectedIds = [];
                $('.userCheckbox:checked').each(function() {
                    selectedIds.push($(this).data('id'));
                });

                if (selectedIds.length > 0) {
                    var result = window.confirm("Are you sure you want to delete selected users?");
                    if (result) {
                        window.location.href = "{{ url('admin/user/bulkDelete') }}/" + selectedIds.join(',');
                    }
                } else {
                    alert("Please select at least one user to delete.");
                }
            });
        });

        function toggleBulkDeleteButton() {
            var selectedCount = $('.userCheckbox:checked').length;
            if (selectedCount > 0) {
                $('#bulkDeleteBtn').prop('disabled', false);
            } else {
                $('#bulkDeleteBtn').prop('disabled', true);
            }
        }
    </script>
@stop
