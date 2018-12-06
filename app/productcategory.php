<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class productcategory extends Model
{
    protected $table = 'productcategories';
    static $tableName = 'productcategories';
    protected $fillable = [
        'product_category'
    ];
    public static function save_data($request) {

        DB::table(self::$tableName)
                ->insert([
                    'product_category' => $request->name]);
        return true;
    }
    public static function get_data($id){
        $check = DB::table(self::$tableName)
                         ->select('*')
                         ->where('id', $id)
                         ->first();
        return $check;
    }
    public static function update_data($request) {
        DB::table(self::$tableName)
                ->where('id', $request['id'])
                ->update(['product_category' => $request['name']
        ]);
        return true;
    }

    public static function delete_data($id) {
        DB::table(self::$tableName)
                ->where('id', $id)
                ->delete();
    }
}
