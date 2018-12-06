<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $category = Product::get_category();
        $products = Product::latest()->paginate(3);
        return view('products.index', compact('products'),['category'=>$category])->with('i', (request()->input('page', 1) - 1) * 3);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $category = Product::get_category();
        return view('products.create',['category'=>$category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request) {
        
        $return = Product::save_data($request);
        if ($return === false) {
            return back();
        } else {
            return redirect()->route('products.index')->with('success', 'Product created successfully.');
        }
        //Product::save_data($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $return = Product::get_data($id);
        return view('products.show',['product'=>$return]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product) {
        $category = Product::get_category();
        return view('products.edit', compact('product'),['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request) {
        $return = Product::update_data($request);
        if ($return === false) {
            return back();
        } else {
            return redirect()->route('products.index')->with('success', 'Product updated successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product) {
        
        Product::delete_data($product);
        return redirect('products')->with('success', 'Product deleted successfully.');
    }

}