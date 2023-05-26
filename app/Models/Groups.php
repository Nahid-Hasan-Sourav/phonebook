<?php
namespace App\Models;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;

class Groups extends Model
{
    use HasFactory;
    private static $group;

    public function customers(){
        return $this->hasMany(Customer::class);
    }

    public static function createNewGroup($request){
    self::$group=New Groups();
    self::$group->group_name = $request->group_name;
    self::$group->user_id= Session::get('user_id');

    self::$group->save();
}

   public static function deleteGroupName($id){
        $group = Groups::find($id);
        $group->delete();
//        return $group;
       return $status="true";
   }

   public static function updatedGroupName($request,$id)
   {   self::$group = Groups::find($id);
       self::$group->group_name = $request->group_name_update;
       self::$group->save();
       return $status="true";
   }

}
