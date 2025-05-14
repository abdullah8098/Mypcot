
@extends('admin.layouts.master')

@section('content')
    <div class="content-wrapper" style="min-height: 1345.31px;">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-7">
                        <h1>Update Profile</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">

                        <div class="card card-primary card-outline">

                            <form action={{route('user.profile', $user->id)}} method="POST">
                            @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="name">Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="name" name="name" required value="{{ old('name', $user->name) }}" placeholder="Enter Name">
                                                @error('name')
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label for="email">Email <span class="text-danger">*</span></label>
                                                <input type="email" class="form-control" id="email" name="email" required value="{{old('email',$user->email)}}"
                                                    placeholder="Enter Email">
                                                @error('email')
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mt-3">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control" id="password" name="passwords" placeholder="Enter Password">
                                                @error('passwords')
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mt-3">
                                                <label for="gender">Gender <span class="text-danger">*</span></label>
                                                <select class="form-control" id="gender" name="gender" required>
                                                    <option value="">Select Gender</option>
                                                    <option value="male" {{ (old('gender', $user->gender) == 'male') ? 'selected' : '' }}>Male</option>
                                                    <option value="female" {{ (old('gender', $user->gender) == 'female') ? 'selected' : '' }}>Female</option>
                                                    <option value="other" {{ (old('gender', $user->gender) == 'other') ? 'selected' : '' }}>Other</option>
                                                </select>
                                                @error('gender')
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{route('admin.user')}}" class="btn btn-primary">Return</a>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>

            </div>
        </section>

    </div>
@endsection

@section('scripts')
    <script>

    </script>
@stop
