<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    protected $table = 'products';
    static $tableName = 'products';
    protected $fillable = [
        'name', 'detail','images','cat_id'
    ];
    /**
     * 
     * @param type $request
     * @return boolean
     */
    public static function save_data($request) {
        $images = array();
        if ($request->hasFile('images')) {
            $files = $request->file('images');
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $file->move(public_path() . '/images/', $name);
                $images[] = $name;
            }
        }   
        DB::table(self::$tableName)
                ->insert([
                    'name' => $request->name,
                    'category_id' => $request->category,
                    'price'=> $request->price,
                    'detail' => $request->detail]);
        $lastid = DB::getPdo()->lastInsertId();
        DB::table('product_image')
                ->insert(['product_image' => implode("|", $images),
                    'parent_id' => $lastid]);
        return true;
    }
    /**
     * 
     * @param type $id
     * @return type 
     */
    public static function get_data($id) {

        $check = DB::table('products')
                ->leftjoin('product_image', 'product_image.parent_id', '=', 'products.id')
                ->select('products.*', 'product_image.product_image')
                ->where('products.id', $id)
                ->first();
        return $check;
    }
    /**
     * 
     * @return type
     */
    public static function All_Get_Data(){
        $return = DB::table('products')
                ->leftjoin('product_image', 'product_image.parent_id', '=', 'products.id')
                ->select('products.*', 'product_image.product_image')
                ->get();
        return $return; 
    }
    /**
     * 
     * @param type $id
     * @return type
     */
    public static function All_Get_Data_product($id){
        $check = DB::table('products')
                ->leftjoin('product_image', 'product_image.parent_id', '=', 'products.id')
                ->select('products.*', 'product_image.product_image')
                ->where('products.category_id', $id)
                ->get();
        return $check;
    }
    /**
     * 
     * @return type
     */
    public static function get_category() {
        $get_data = DB::table('productcategories')
                ->select('*')
                ->get();
        return $get_data;
    }
    /**
     * 
     * @param type $request
     * @return boolean
     */
    public static function update_data($request) {
        DB::table(self::$tableName)
                ->where('id', $request['id'])
                ->update(['name' => $request['name'],
                    'category_id' => $request['category'],
                    'detail' => $request['detail']
        ]);
        return true;
    }
    /**
     * 
     * @param type $product
     */
    public static function delete_data($product) {

        $product->delete();
        DB::table('product_image')
                ->where('parent_id', $product->id)
                ->delete();
    }

}
