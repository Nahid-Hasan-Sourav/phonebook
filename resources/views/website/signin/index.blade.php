@extends('website.master')

@section('title')
    login
@endsection

@section('body')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-5 px-0 vh-100">
                    <div class="card h-100 rounded-0">
                        <h3 class="text-success text-center">
                             {{Session::get('registration-message') }}
                        </h3>
                        <form action="{{route('user-login')}}" method="POST" enctype="multipart/form-data" class="card-body d-flex flex-column justify-content-center ">
                            @csrf
                            <div class="form-group row mb-4">
                                <label for="horizontal-firstname-input" class="col-form-label">Email</label>
                                <div class="">
                                    <input type="text" name="email" class="form-control" id="horizontal-firstname-input">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="horizontal-password-input" class=" col-form-label">Password</label>
                                <div class="">
                                    <input type="password" name="password" class="form-control" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <div>
                                        <button type="submit" class="btn btn-primary w-100 d-block">Login</button>
                                    </div>
                                </div>
                            </div>

                            <small class="text-danger">
                                {{Session::get('message') }}
                            </small>

                            <div class="form-group row mt-4">
                                <div class="col-sm-12 text-center">
                                    Don't have an account? <a href="{{route('signup')}}" class="text-primary m-l-5"><b>Sign Up</b></a>
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
