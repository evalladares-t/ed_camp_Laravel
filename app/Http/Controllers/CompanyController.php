<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companys =Company::Paginate(8);
        return response()->json($companys,Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $companys = Company::create($request->all());
        return response()->json(["message"=>"La empresa ha sido creado correctamente","data"=>$companys,"status"=>Response::HTTP_CREATED],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $companys
     * @return \Illuminate\Http\Response
     */
    public function show(Company $companys)
    {
        return response()->json(["message"=>"La empresa buscada es el siguiente","data"=>$companys,"status"=>Response::HTTP_OK],Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $companys
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $companys)
    {
        $companys->update($request->all());
        return response()->json(["message"=>"La empresa se a actualizado correctamente","data"=>$companys,"status"=>Response::HTTP_OK],Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $companys
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $companys)
    {
        $companys->delete();
        return response()->json(["message"=>"El precio se a eliminado correctamente","data"=>$companys,"status"=>Response::HTTP_OK],Response::HTTP_OK);
    }
}
