@extends('website.master')

@section('title')
    signup
@endsection

@section('body')
    <section>
        <div class="container mt-0">
            <div class="row">
                <div class="col-md-5 px-0 vh-100">
                    <div class="card h-100 rounded-0">
                        <div>
                            <h3 class="text-danger fw-bold text-center py-2">ADMIN</h3>
                        </div>
                        <div class="ms-3 mt-2">
                            <h4>Register Now</h4>
                            <small>Create your account and enjoy</small>
                        </div>
                        <form action="{{route('user-create')}}" method="POST" enctype="multipart/form-data" class="card-body d-flex flex-column justify-content-center ">
                            @csrf
                            <div class="form-group row mb-2">
                                <label for="horizontal-firstname-input" class="col-form-label">Name</label>
                                <div class="">
                                    <input type="text" name="name" class="form-control" id="horizontal-firstname-input">
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label for="horizontal-password-input" class=" col-form-label">Email</label>
                                <div class="">
                                    <input type="email" name="email" class="form-control" >
                                </div>
                            </div>

                            <div class="form-group row my-2">
                                <label for="horizontal-password-input" class=" col-form-label">Password</label>
                                <div class="">
                                    <input type="password" name="password" class="form-control" >
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label for="horizontal-password-input" class="col-sm-3 col-form-label">Image</label>
                                <div class="col-sm-9">
                                    <input type="file" name="image" class="form-control-file" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <div>
                                        <button type="submit" class="btn btn-primary w-100 d-block">Login</button>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mt-4">
                                <div class="col-sm-12 text-center">
                                    Already have an account? <a href="{{route('login')}}" class="text-primary m-l-5"><b>Sign In</b></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-7 px-0">
                    <img src="{{asset('/')}}img/website/login-image.jpg" class="img-fluid  w-100 h-100"/>
                </div>
            </div>
        </div>
    </section>
@endsection
