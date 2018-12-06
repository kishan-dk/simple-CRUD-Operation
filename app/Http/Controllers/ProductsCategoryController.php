<?php

namespace App\Http\Controllers;
use App\productcategory;
use App\Http\Requests\CategoryRequest;

class ProductsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = productcategory::latest()->paginate(3);
        return view('productcategory.index', compact('products'))->with('i', (request()->input('page', 1) - 1) * 3);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productcategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $return = productcategory::save_data($request);
        if ($return === false) {
            return back();
        } else {
            return redirect()->route('productscategory.index')->with('success', 'Product created successfully.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $return = productcategory::get_data($id);
        return view('productcategory.show',['product'=>$return]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $return = productcategory::get_data($id);
        return view('productcategory.edit', ['product'=>$return]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request)
    {
        $return = productcategory::update_data($request);
        if ($return === false) {
            return back();
        } else {
            return redirect()->route('productscategory.index')->with('success', 'Product Category updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        productcategory::delete_data($id);
        return redirect('productscategory')->with('success', 'Product deleted successfully');
    }
}
