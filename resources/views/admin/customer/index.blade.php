@extends('admin.master')

@section('body')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Customer Form</h4>
                    <h3 class="text-success text-center">
                        {{Session::get('message') }}
                    </h3>
                    <form action="{{route('create-customer')}}" class="form-horizontal p-t-20" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">Customer Name*</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="ti-user"></i></span>
                                    <input type="text" class="form-control" name="name" id="exampleInputuname3" placeholder="Username">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail3" class="col-sm-3 control-label">Customer Email*</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="ti-email"></i></span>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail3" placeholder="Enter email">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="form-label col-sm-3 control-label" for="web">Phone Number</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="ti-world"></i></span>
                                    <input type="tel" name="phone_number" class="form-control" id="web" placeholder="Enter Phone Number">
                                </div>
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="row">
                                <label class="form-label col-md-3"></label>
                                <select class="form-select col-md-9 " id="inlineFormCustomSelect" name="group_id">
                                    <option selected="" >--- Select Your Group ---</option>
                                    @foreach($groups as $group)
                                        <option value="{{$group->id}}">{{$group->group_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div>

                                <input class="form-control form-control-lg" id="formFileLg" type="file" name="image">
                            </div>
                        </div>



                        <div class="form-group row m-b-0">
                            <div class="offset-sm-3 col-sm-9">
                                <button type="submit" class="btn btn-success waves-effect waves-light text-white">Add New Customer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
