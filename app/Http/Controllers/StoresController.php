<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stores;
use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class StoresController extends Controller
{
    public function storeStores() {
      $name = 'Collins';
      if (Stores::where('name', $name)->exists()) {
      }
      else {
        $store = new Stores;
        $store->name = $name;
        $store->sh_name = 'cmc';
        $store->campus = 'collins';
        $store->save();
        echo "Stored ".$store->name;
      }

      $name = 'Frank';
      if (Stores::where('name', $name)->exists()) {
      }
      else {
        $store = new Stores;
        $store->name = 'Frank';
        $store->sh_name = 'frank';
        $store->campus = 'Pomona';
        $store->save();
        echo "Stored ".$store->name;
      }

      $name = 'Frary';
      if (Stores::where('name', $name)->exists()) {
      }
      else {
        $store = new Stores;
        $store->name = 'Frary';
        $store->sh_name = 'frary';
        $store->campus = 'Pomona';
        $store->save();
        echo "Stored ".$store->name;
      }

      $name = 'Malott';
      if (Stores::where('name', $name)->exists()) {
      }
      else {
        $store = new Stores;
        $store->name = 'Malott';
        $store->sh_name = 'scripps';
        $store->campus = 'Scripps';
        $store->save();
        echo "Stored ".$store->name;
      }

      $name = 'McConnell';
      if (Stores::where('name', $name)->exists()) {
      }
      else {
        $store = new Stores;
        $store->name = 'McConnell';
        $store->sh_name = 'pitzer';
        $store->campus = 'Pitzer';
        $store->save();
        echo "Stored ".$store->name;
      }

      $name = 'Hoch';
      if (Stores::where('name', $name)->exists()) {
      }
      else {
        $store = new Stores;
        $store->name = 'Hoch';
        $store->sh_name = 'mudd';
        $store->campus = 'Mudd';
        $store->save();
        echo "Stored ".$store->name;
      }

      $name = 'Oldenborg';
      if (Stores::where('name', $name)->exists()) {
      }
      else {
        $store = new Stores;
        $store->name = 'Oldenborg';
        $store->sh_name = 'oldenborg';
        $store->campus = 'Pomona';
        $store->save();
        echo "Stored ".$store->name;
      }

    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
