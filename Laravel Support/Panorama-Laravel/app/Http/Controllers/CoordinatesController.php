<?php

namespace App\Http\Controllers;

use App\TblCoordinates;
use Illuminate\Http\Request;

class CoordinatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coordinates = TblCoordinates::all();
        return view('layout.output-coordinates', compact('coordinates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layout.input');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = 
        [
            'x' => $request->inputCoordinatesX,
            'y' => $request->inputCoordinatesY
        ];
        TblCoordinates::create($data);
        return redirect()->route('coordinate.index')->with('success', 'Input data successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Coordinates  $coordinates
     * @return \Illuminate\Http\Response
     */
    public function show(TblCoordinates $coordinates)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Coordinates  $coordinates
     * @return \Illuminate\Http\Response
     */
    public function edit(TblCoordinates $coordinates)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Coordinates  $coordinates
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TblCoordinates $coordinates)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Coordinates  $coordinates
     * @return \Illuminate\Http\Response
     */
    public function destroy(TblCoordinates $coordinates)
    {
        
    }
}
