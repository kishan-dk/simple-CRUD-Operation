<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class LoginModel extends Model
{
    protected $table = 'users';
    static $tableName = 'users';
    public static function Check_data($request) {
        $check_access = DB::table(self::$tableName)
                     ->select('*')
                     ->where(['email'=>$request->email,'password'=>md5($request->password)])
                     ->first();
        if(isset($check_access->email)&&$check_access->email==$request->email&&isset($check_access->password)&&$check_access->password==md5($request->password)):
            $request->session()->put('admin_id', $check_access->id);
            $request->session()->put('is_login', 'true');
            return true;
        else:
            $request->session()->put('is_login', 'false');
            return false;
        endif;
    }
}
