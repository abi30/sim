<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Size;

class SizesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        $sizes = Size::orderby( 'created_at', 'DESC' )->get();
        return view( 'sizes.index', compact( 'sizes' ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view( 'sizes.create' );
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
            'size' => 'required|min:3|max:50|unique:sizes',
        ] );
        $size = new Size();
        $size->size = $request->size;
        $size->save();

        flash( message:'Size created successfully' )->success();
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
        $size = Size::findOrFail( $id );
        // if don't get in the database then 404 error
        return view( 'sizes.edit', compact( 'size' ) );

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
            'size' => 'required|min:3|max:50|unique:sizes,size,' . $id,
        ] );

        // $size = new Size();
        $size = Size::findOrFail( $id );
        $size->size = $request->size;
        $size->save();

        flash( message:'Size updated successfully' )->success();
        return redirect()->route( 'sizes.index' );
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
        $size = Size::findOrFail( $id );
        $size->delete();

// if don't get in the database then 404 error
        flash( message:'Size deleted successfully' )->success();
        return redirect()->route( 'sizes.index' );


    }
}