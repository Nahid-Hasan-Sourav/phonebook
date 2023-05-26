<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\View;

use App\Models\Groups;
use Illuminate\Http\Request;
use App\Models\Customer;


class CustomerController extends Controller
{
    private $groups,$customers;
    public function index(){
        $this->groups = Groups::all();

        return view('admin.customer.index',['groups'=>$this->groups]);

    }




    public function manage(){
        $customers = Customer::with('group')->get();

        // foreach($customers as $customer){
        //     echo $customer->group->group_name;
        //     echo '<br>';
        // }

        // die();
        // return $customers;
        return view('admin.customer.manage',['customers'=>$customers],['groups'=>Groups::all()]);
        die();


//        if ($request->ajax()) {
//            $groupId = $request->input('group_id');
//
//            $query = Customer::query();
//
//            if ($groupId) {
//                $query->where('group_id', $groupId);
//            }
//
//            //$customer = $query->get();
//
////            return response()->json([
////                'status'=>"success",
////                'data'=>$query->get()
////            ]);
//
//            $customers = $query->get();
//
//            return view('admin.customer.manage', ['customers' => $customers]);
//
//        }
//        else{
//            return view('admin.customer.manage',['groups'=>Groups::all()]);
//        }

//        if ($request->ajax()) {
//            $groupId = $request->input('group_id');
//
//            $query = Customer::query();
//
//            if ($groupId) {
//                $query->where('group_id', $groupId);
//            }
//
//            $customers = $query->get();
//
//            $view = View::make('admin.customer.manage')->with('customers', $customers)->render();
//
//            return response()->json($view);
//        } else {

//        if ($request->ajax()) {
//            $groupId = $request->input('group_id');
//            if($groupId){
//                $customers=Customer::where('group_id',$groupId)->get();
//                return response()->json([
//                   'data'=>$customers,
//                ]);
//                return view('admin.customer.manage',['customers'=>$customers]);
//            }
//
//        }
//            $this->groups= Groups::all();
//            $this->customers=Customer::all();
//            return view('admin.customer.manage', ['groups' => $this->groups],['customers'=>$this->customers]);





        //working--code
            $groupId = $request->input('group_id');
            if($groupId){
                $this->customers=Customer::where('group_id',$groupId)->get();
//                return response()->json([
//                   'data'=>$customers,
//                ]);
                return view('admin.customer.manage',['customers'=> $this->customers]);
            }


        $this->groups= Groups::all();
        $this->customers=Customer::all();
        return view('admin.customer.manage', ['groups' => $this->groups],['customers'=>$this->customers]);







        }





    public function createCustomer(Request $request){
        Customer::createNewCustomer($request);
        return back()->with('message','customer created successfully');
    }

    public function manageCustomer(){

    }

    public function deleteCustomer($id){
        $del = Customer::deleteCustomer($id);

        if($del){
            return response()->json([
                'status' => "200",
                'del' => $del
            ]);
        }

        else{
            return response()->json([
                'status' => "400",
                'del' => $del
            ]);
        }
    }
}
