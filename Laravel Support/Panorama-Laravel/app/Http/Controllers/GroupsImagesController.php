<?php

namespace App\Http\Controllers;

use App\TblGroupsImages;
use Illuminate\Http\Request;

class GroupsImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'name' => $request->groupsName
        ];
        TblGroupsImages::create($data);
        return redirect('/')->with('success', 'Save groups succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TblGroupsImages  $tblGroupsImages
     * @return \Illuminate\Http\Response
     */
    public function show(TblGroupsImages $tblGroupsImages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TblGroupsImages  $tblGroupsImages
     * @return \Illuminate\Http\Response
     */
    public function edit(TblGroupsImages $tblGroupsImages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TblGroupsImages  $tblGroupsImages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TblGroupsImages $tblGroupsImages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TblGroupsImages  $tblGroupsImages
     * @return \Illuminate\Http\Response
     */
    public function destroy(TblGroupsImages $tblGroupsImages)
    {
        //
    }
}
