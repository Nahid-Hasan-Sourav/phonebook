@extends('admin.master')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class=" d-flex justify-content-between align-items-center">
                            <h4 class="card-title">All Groups</h4>
                            <button class="btn btn-primary" id="add_new_group">Add New Group</button>

                        </div>
                        <h4 class="text-center text-success">
                            {{session('message')}}
                        </h4>

                        <table id="datatable_group" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>SL NO</th>
                                <th>Group Name</th>
{{--                                <th>Email</th>--}}
{{--                                <th>Image</th>--}}
{{--                                <th>Phone</th>--}}
{{--                                <th>Group Name</th>--}}
                                <th>Action</th>
                            </tr>
                            </thead>


                            <tbody>

                             @foreach($groups as $group)
                                 <tr>
                                     <th>{{$loop->iteration}}</th>
                                     <td>{{$group->group_name}}</td>
                                     <td>
                                         <div class="d-flex">
                                            <button class="btn btn-success btn-sm add_group_name_edit_btn" id="" value="{{$group->id}}">
                                                <i class="fa fa-edit"></i>
                                                edit
                                            </button>

                                             <button type='submit' class='btn btn-danger btn-sm add_group_name_delete_btn' id=""
                                             value="{{$group->id}}"
                                             >
                                                     <i class='fa fa-trash'></i>
                                                     delete
                                             </button>


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
    </div>



    <!--Add Group Modal -->
    <div class="modal fade" id="add_new_group_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Group</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
{{--                        <label for="exampleInputuname3" class="col-sm-3 control-label">Customer Name*</label>--}}
                        <div class="col-sm-12">
                            <div class="input-group">
{{--                                <span class="input-group-text"><i class="ti-user"></i></span>--}}
                                <input type="text" class="form-control group_name" name="name" id="exampleInputuname3" placeholder="Group Name">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="group_name_add_btn">Add</button>
                </div>
            </div>
        </div>
    </div>


{{--    EDIT GROUP MODAL--}}
    <div class="modal fade" id="add_new_group_modal_edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Group</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        {{--                        <label for="exampleInputuname3" class="col-sm-3 control-label">Customer Name*</label>--}}
                        <div class="col-sm-12">
                            <div class="input-group">
                                {{--                                <span class="input-group-text"><i class="ti-user"></i></span>--}}
                                <input type="text" class="form-control group_name group_name_update" name="group_name_update"  id="group_name" placeholder="Group Name">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="group_name_update_btn">Update</button>
                </div>
            </div>
        </div>
    </div>


{{--    Delete group Modal--}}
    <!-- Modal -->
    <div class="modal fade" id="group_name_delete_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmation Messages</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure want to delete this??
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary modal_confirm_delete_btn" >Confirm</button>
                </div>
            </div>
        </div>
    </div>

@endsection
