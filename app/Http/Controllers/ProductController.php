<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('products')->paginate(10);
        return view('index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $products = DB::table('products')->where('name', 'like', '%'.$search. '%')->paginate(5);
        return view('index', ['products' => $products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->get('name');
        $verkoopprijs = $request->get('verkoopprijs');
        $inkoopprijs = $request->get('inkoopprijs');
        $products = DB::insert('insert into products(name, verkoopprijs, inkoopprijs) value(?,?,?)', [$name, $verkoopprijs, $inkoopprijs]);
        if($products){
            $red = redirect('products')->with('success','Data has been added');
        }  else {
            $red = redirect('products/create')->with('danger','Input data failed, please try again.');
        }
        return $red;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = DB::select('select * from products where id=?',[$id]);
        return view('show', ['products' => $products]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = DB::select('select * from products where id=?',[$id]);
        return view('edit', ['products' => $products]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $name = $request->get('name');
        $verkoopprijs = $request->get('verkoopprijs');
        $inkoopprijs = $request->get('inkoopprijs');
        $products = DB::update('update products set name=?, verkoopprijs=?, inkoopprijs=? where id=?',[$name, $verkoopprijs, $inkoopprijs, $id]);
        if($products){
            $red = redirect('products')->with('success','Data has been updated.');
        } else {
            $red = redirect('products/edit/'.$id)->with('danger','Error update please try again.');
        }
        return $red;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = DB::delete('delete from products where id=?',[$id]);
        $red = redirect('products');
        return $red;
    }
}