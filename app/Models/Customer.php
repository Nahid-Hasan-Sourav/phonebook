<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Group;

class Customer extends Model
{
    private static $customer,$image,$directory,$extension,$imageUrl,$imageName;
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'image'
    ];

    public function group(){
            return $this->belongsTo(Groups::class);
    }

    private static function getImageUrl($request){
        self::$image        =$request->file('image');
        self::$extension        =self::$image->getClientOriginalExtension();
        self::$imageName    =time().'.'.self::$extension;
        self::$directory    ='customer-images/';
        self::$image->move(self::$directory,self::$imageName);
        self::$imageUrl     =self::$directory.self::$imageName;


        return self::$imageUrl;
    }

    public static function createNewCustomer($request){
        self::$customer   = New Customer();
        self::$customer->group_id = $request->group_id;
        self::$customer->name  = $request->name;
        self::$customer->email = $request->email;
        self::$customer->phone_number = $request->phone_number;
        self::$customer->image = self::getImageUrl($request);

        self::$customer->save();
    }



}
