<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use DB;
use Config;

class ForecastController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        return view('forecast.index')->with("data", $data);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function sourceCall()
    { }

    public function returnAjaxCountry()
    {
        $countries = DB::table(City::returnTableName())
            ->select('country_name')
            ->distinct()
            ->where('country_name', 'like', '%' . trim($_POST['country']) . '%')
            // ->groupBy('country_name')
            ->get()
            ->toArray();
            // ->pluck('country_name');

       
        print json_encode($countries);
    }


    public function returnAjaxCity()
    {
        $cities = DB::table(City::returnTableName())
            ->select('city_name' , 'id')
            ->distinct()
            ->where('country_name', 'like', '%' . trim($_POST['country']) . '%')
            ->get()
            ->toArray();
            // ->pluck('city_name');
         //   ->toSql();

        print json_encode($cities);
    }
}