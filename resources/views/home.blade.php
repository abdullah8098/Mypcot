@extends('admin.layouts.app')

@section('content')
    @push('head')
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/fontawesome/all.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/primeng/9.0.6/resources/components/toast/toast.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>
     @endpush

    <div class="page-heading">
        <h3>Contacts</h3>
    </div>

    <section class="section">
        <div class="card card-primary card-outline>
            <div class="card-header">
                Contact List
                <!-- <button class="btn btn-primary btn-xs" style="float: right;">   
                    <a href="{{ url('paypayment/create') }}" class="text-white"> Pay Payment</a>     
                </button> -->
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Admin</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </section>


    @push('script')

        <script src="{{ asset('admin/assets/vendors/simple-datatables/simple-datatables.js') }}"></script>
        <script>
            // Simple Datatable
            let table1 = document.querySelector('#table1');
            let dataTable = new simpleDatatables.DataTable(table1);
        </script>
    <script src="{{ asset('admin/assets/vendors/fontawesome/all.min.js') }}"></script>



    @endpush
    
@endsection
