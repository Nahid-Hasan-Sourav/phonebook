@extends('admin.master')

@section('body')
    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div  class="card-header d-flex flex-row align-items-center h-100 justify-content-between">
                        <h4 class="card-title">All Customer</h4>

                        <div class="">
                            <label class="form-label col-md-3"></label>
                            <select class="form-select col-md-9 " id="group-filter" name="group_id">
                                <option selected="" >--- Filter By Group ---</option>
                                @foreach($groups as $group)
                                    <option value="{{$group->id}}">{{$group->group_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <h4 class="text-center text-success">
                        {{session('message')}}
                    </h4>




                    <table id="customer-table" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Customer Name</th>
                            <th>Image</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Group</th>
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody>
                        @foreach($customers as $customer)
                            <tr>
                                <th>{{$loop->iteration}}</th>
                                <td>{{$customer->name}}</td>
                                <td>
                                    <img src="{{asset($customer->image)}}"
                                         height="30px",
                                         width="40px"
                                    />
                                </td>
                                <td>{{$customer->email}}</td>
                                <td>{{$customer->phone_number}}</td>
                                <td>
                                    {{-- @foreach ($groups as $group)
                                        @if ($group['id'] === $customer->group_id)
                                            {{ $group['group_name'] }}
                                            @break
                                        @endif
                                    @endforeach --}}
                                    {{$customer->group->group_name }}
                                </td>

                                <td>
                                    <div class="d-flex">
                                        <a href="" class="btn btn-success btn-sm">
                                            <i class="fa fa-edit"></i>
                                            edit
                                        </a>

                                        <button type='submit' class='btn btn-danger btn-sm delete-customer' value="{{}}">
                                            <i class='fa fa-trash'></i>
                                            delete
                                        </button>

                                        {{-- <form class="mx-2" action="" method='POST'
                                              onsubmit="return confirm('Are you sure you want to delete this ')">
                                            @csrf

                                            <button type='submit' class='btn btn-danger btn-sm'>
                                                                                            <i class='fa fa-trash'></i>
                                                delete
                                            </button>

                                        </form> --}}


                                    </div>


                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>

                </div>


            </div>
        </div> <!-- end col -->
    </div>
@endsection
