<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::orderby( 'created_at', 'DESC' )->get();
        return view( 'brands.index', compact( 'brands' ) );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( 'brands.create' );

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request )
    {
        $this->validate( $request, [
            'name' => 'required|min:3|max:50|unique:brands',
        ] );
        $brand = new Brand();
        $brand->name = $request->name;
        $brand->save();

        flash( message:'Brand created successfully' )->success();
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id )
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id )
    {
        $brand = Brand::findOrFail( $id );
// if don't get in the database then 404 error
        return view( 'brands.edit', compact( 'brand' ) );

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, $id )
    {
        $this->validate( $request, [
            'name' => 'required|min:3|max:50|unique:brands,name,' . $id,
        ] );

// $category = new Brand();
        $brand = Brand::findOrFail( $id );
        $brand->name = $request->name;
        $brand->save();

        flash( message:'Brand updated successfully' )->success();
        return redirect()->route( 'brands.index' );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id )
    {
        $brand = Brand::findOrFail( $id );
        $brand->delete();

// if don't get in the database then 404 error
        flash( message:'Brand deleted successfully' )->success();
        return redirect()->route( 'brands.index' );

    }
}