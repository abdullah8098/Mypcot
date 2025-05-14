@extends('admin.layouts.master')

@section('content')
    <div class="content-wrapper" style="min-height: 1345.31px;">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-7">
                        <h1>Blogs List</h1>
                    </div>
                    <div class="col-sm-5">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard"><i class="nav-icon fa fa-dashboard"></i>
                                    &nbsp;&nbsp;Home</a></li>
                            <li class="breadcrumb-item active">Blogs List</li>
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
                                    <a href="{{ route('user.blog.create') }}" class="btn btn-primary mb-2 mt-2" style="width: 120px; border-radius: 5px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); transition: all 0.3s ease;">
                                        Add
                                    </a>
                                    <button class="btn btn-danger" id="bulkDeleteBtn" style="width: 140px; border-radius: 5px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); transition: all 0.3s ease;">
                                        Bulk Delete
                                    </button>
                                </div>
                            </div>
                            <hr>
                            <div class="card-body" style="overflow-x: auto;">
                                <table class="table table-bordered" id="blogTable">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="selectAll"></th>
                                            <th style="width: 10px">#</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th style="width: 100px" data-sortable="false">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($blogs as $key => $blog)
                                            <tr>
                                                <td><input type="checkbox" class="userCheckbox" data-id="{{ encrypt($blog->id) }}"></td>
                                                <td>{{ $key + 1 }}</td>
                                                <td>
                                                    {{ $blog->name }}
                                                </td>
                                                <td>{{ $blog->description }}</td>
                                                <td>
                                                    <div>
                                                        <a href="{{ url('user/blog/' . encrypt($blog->id) . '/edit') }}" class="mr-3"><i class="fa fa-edit bts-popup-close mt-2"></i></a>
                                                        <a href="#" onclick="confirmDelete('{{ encrypt($blog->id) }}')"><i class="fa fa-times bts-popup-close mt-2 mr-2"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
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
                window.location.href = "{{ url('user/blog/') }}/" + id + "/delete";
            }
        }

        $(document).ready(function() {
            $('#blogTable').DataTable();
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
                    var result = window.confirm("Are you sure you want to delete selected blogs?");
                    if (result) {
                        window.location.href = "{{ url('user/blog/bulkDelete') }}/" + selectedIds.join(',');
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
