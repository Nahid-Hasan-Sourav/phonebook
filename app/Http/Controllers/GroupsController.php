<?php

namespace App\Http\Controllers;

use App\Models\Groups;
use Illuminate\Http\Request;

class GroupsController extends Controller
{
    private $add;
    public function index(){
        return view('admin.groups.index',['groups'=>Groups::all()]);
    }

    public function addGroup(Request $request){
        $this->add = Groups::createNewGroup($request);

        return response()->json([
            'status'=>"success"
        ]);

    }

//    delete group name
    public function delete($id){
        $del= Groups::deleteGroupName($id);
//        $del= Groups::find($id);
//        $del->delete();


        if($del){
            return response()->json([
                'status'=>"200",
                'del' => $del
            ]);
        }
        else{
            return  response()->json([
                'status'=>"400",
                'del' => $del
            ]);
        }


    }


    public function edit($id){
        $data = Groups::find($id);

        if($data){
            return response()->json([
               'status' => "200",
               'data'=>$data
            ]);
        }
        else{
            return response()->json([
                'status' => "404"
            ]);
        }

    }


    public function update(Request $request,$id){
        $update = Groups::updatedGroupName($request,$id);

        if($update){
            return response()->json([
               'status'=>"200",
                'update'=>$update
            ]);
        }
        else{
            return response()->json([
                'status'=>"400"
            ]);
        }
    }
}
