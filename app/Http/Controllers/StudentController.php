<?php

namespace App\Http\Controllers;

use App\Student;
use App\Company;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students =Student::Paginate(8);
        return response()->json($students,Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $students = Student::create($request->all());
        return response()->json(["message"=>"El estudiante ha sido creado correctamente","data"=>$students,"status"=>Response::HTTP_CREATED],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $compny=Company::find($student->id);
        return response()->json(["message"=>"El estudiante buscado es el siguiente","data"=>$student,"empresa"=>$compny,"status"=>Response::HTTP_OK],Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $price->update($request->all());
        return response()->json(["message"=>"El estudiante se a actualizado correctamente","data"=>$student,"status"=>Response::HTTP_OK],Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $price->delete();
        return response()->json(["message"=>"El estudiante se a eliminado correctamente","data"=>$student,"status"=>Response::HTTP_OK],Response::HTTP_OK);
    }
}
