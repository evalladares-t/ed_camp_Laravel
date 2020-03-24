<?php

namespace App\Http\Controllers;

use App\Price;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $precios =Price::Paginate(8);
        return response()->json($precios,Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $price = Price::create($request->all());
        return response()->json(["message"=>"El precio ha sido creado correctamente","data"=>$price,"status"=>Response::HTTP_CREATED],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function show(Price $price)
    {
        return response()->json(["message"=>"El precio buscado es el siguiente","data"=>$price,"status"=>Response::HTTP_OK],Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Price $price)
    {
        $price->update($request->all());
        return response()->json(["message"=>"El precio se a actualizado correctamente","data"=>$price,"status"=>Response::HTTP_OK],Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function destroy(Price $price)
    {
        $price->delete();
        return response()->json(["message"=>"El precio se a eliminado correctamente","data"=>$price,"status"=>Response::HTTP_OK],Response::HTTP_OK);
    }
}
