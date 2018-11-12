<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::all();
        return view('products.allproducts')->withProducts($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the data
        $this->validate($request, array(
            'name' => 'required|max:1000',
        ));

        //store in the database
        $products = new Products;

        $products->name = $request->name;
        $products->category = $request->category;
        $products->subcategory = $request->subcategory;
        $products->sellingprice = $request->sellingprice;
        $products->cost = $request->cost;

        $products->save();

        return redirect()->route('products.show', $products->id);

        //redirect to another page
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //page to show review
        $products = Products::find($id);
        return view('products.show')->withProducts($products);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Products::find($id);
        // return the view and pass in the var we previously created
        return view('products.edit')->withProducts($products);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validate the data
        $this->validate($request, array(
            //'body' => 'required|max1000',
        ));
        //save data to databases
        $products = Products::find($id);

        $products->name = $request->input('name');
        $products->category = $request->input('category');
        $products->subcategory = $request->input('subcategory');
        $products->name = $request->input('name');




        $products->save();

        //redirect
        return redirect()->route('products.show', $products->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Products::find($id);
        $products->delete();
        return redirect()->route('products.index');
    }
}
