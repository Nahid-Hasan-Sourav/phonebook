<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    private static $user,$image,$directory,$extension,$imageUrl,$imageName;
    protected $fillable = [
        'name',
        'email',
        'password',
        'image'
    ];

    private static function getImageUrl($request){
        self::$image        =$request->file('image');
        self::$extension        =self::$image->getClientOriginalExtension();
        self::$imageName    =time().'.'.self::$extension;
        self::$directory    ='user-images/';
        self::$image->move(self::$directory,self::$imageName);
        self::$imageUrl     =self::$directory.self::$imageName;


        return self::$imageUrl;
    }

    public static function createNewUser($request){
        self::$user   = New User();
        self::$user->name  = $request->name;
        self::$user->email = $request->email;
        self::$user->password = bcrypt($request->password);
        self::$user->image = self::getImageUrl($request);

        self::$user->save();
    }



}
