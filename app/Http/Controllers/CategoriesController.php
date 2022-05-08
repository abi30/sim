<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderby( 'created_at', 'DESC' )->get();
        return view( 'categories.index', compact( 'categories' ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view( 'categories.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request )
    {
        //

        // return $request->all();
        // validate

        $this->validate( $request, [
            'name' => 'required|min:3|max:50|unique:categories',
        ] );
        $category = new Category();
        $category->name = $request->name;
        $category->save();

        flash( message:'Category created successfully' )->success();
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
        //
        $category = Category::findOrFail( $id );
        // if don't get in the database then 404 error
        return view( 'categories.edit', compact( 'category' ) );

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
        //
        $this->validate( $request, [
            'name' => 'required|min:3|max:50|unique:categories,name,' . $id,
        ] );

        // $category = new Category();
        $category = Category::findOrFail( $id );
        $category->name = $request->name;
        $category->save();

        flash( message:'Category updated successfully' )->success();
        return redirect()->route( 'categories.index' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id )
    {
        //
        $category = Category::findOrFail( $id );
        $category->delete();

// if don't get in the database then 404 error
        flash( message:'Category deleted successfully' )->success();
        return redirect()->route( 'categories.index' );


    }

    // HANDLE AJAX REQUEST  
    public function getCategoriesJson(){
        $categories = Category::all();

      return  response()->json([
            "success" =>  true,
            "data"    =>  $categories
            ],Response::HTTP_OK); 
    }
}