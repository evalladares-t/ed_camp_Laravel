<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments =Payment::Paginate(8);
        return response()->json($payments,Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $payments = Payment::create($request->all());
        return response()->json(["message"=>"El registro ha sido creado correctamente","data"=>$payments,"status"=>Response::HTTP_CREATED],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        return response()->json(["message"=>"El registro buscado es el siguiente","data"=>$payment,"status"=>Response::HTTP_OK],Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        $price->update($request->all());
        return response()->json(["message"=>"El registro se a actualizado correctamente","data"=>$payment,"status"=>Response::HTTP_OK],Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        $price->delete();
        return response()->json(["message"=>"El registro se a eliminado correctamente","data"=>$payment,"status"=>Response::HTTP_OK],Response::HTTP_OK);
    }
}
