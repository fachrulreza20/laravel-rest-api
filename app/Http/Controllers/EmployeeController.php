<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    public function index()
    {

        //return Employee::all();

        $employees = Employee::all();

        return response()->json([

            'message' => 'Berikut adalah data Employee :',
            'data_employee' => $employees

        ],200);

        
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {

        $request->validate([

            'nip' => 'required',
            'nama' => 'required',
            'kodecabang' => 'required',
            'kodejabatan' => 'required',

        ]);

        $employee = new Employee;
        $employee->nip = $request->nip;
        $employee->nama = $request->nama;
        $employee->kodecabang = $request->kodecabang;
        $employee->kodejabatan = $request->kodejabatan;
        $employee->save();

        return response()->json([
            'nip' => $employee->nip,
            'nama' => $employee->nama,
            'kodecabang' => $employee->kodecabang,
            'namacabang' => $employee->namacabang,
            'result' => 'Data Created Successfully!',
            'data' => $employee
        ]);
    }


    public function show(Employee $employee)
    {
        //
    }


    public function edit(Employee $employee)
    {
        //
    }


    public function update(Request $request, $id)
    {

        $request->validate([

            'nip' => 'required',
            'nama' => 'required',
            'kodecabang' => 'required',
            'kodejabatan' => 'required',

        ]);

        $employee = Employee::find($id);
        $employee->nip          = $request->nip; 
        $employee->nama         = $request->nama; 
        $employee->kodecabang   = $request->kodecabang; 
        $employee->kodejabatan   = $request->kodejabatan; 
        $employee->save();

        return response()->json([
            'nip' => $employee->nip,
            'nama' => $employee->nama,
            'kodecabang' => $employee->kodecabang,
            'kodejabatan' => $employee->kodejabatan,
            'result'    => 'Data Updated!!'

        ]);
    }


    public function destroy($id)
    {
        $employee = Employee::find($id);
        // return $id;
        $employee->delete();

        return "Data deleted...";
    }
}
