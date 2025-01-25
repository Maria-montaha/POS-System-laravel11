<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catagory;

class CatagoryController extends Controller
{
  protected $catagory;
  public function _construct(){
      $this->catagory=new catagory();
    }
    public function index()
    {
      {$response['catagories']=$this->catagory->all();
    return view( 'index')->with($response);
    }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
