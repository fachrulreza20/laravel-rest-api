<?php

namespace App\Http\Controllers;

use App\Models\Reward;
use App\Models\Employee;
use Illuminate\Http\Request;

class RewardController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {


/* contoh postman

{
    "nip": "110456",
    "nama": "GALIH BAGUS",
    "kodecabang": "ID0010022",
    "kodejabatan": "2",
    "rewardlist" : [
        {
            "reward_name" : "reward1",
            "year" : "2020",
            "score" : "100"
        },
        {
            "reward_name" : "reward2",
            "year" : "2022",
            "score" : "99"
        }

    ]
}

*/


        $employee = new Employee;
        $employee->nip = $request->nip;
        $employee->nama = $request->nama;
        $employee->kodecabang = $request->kodecabang;
        $employee->kodejabatan = $request->kodejabatan;
        $employee->save();

        foreach($request->rewardlist as $key => $value){


            $reward              = new Reward;
            $reward->employee_id = $employee->id; 
            $reward->reward_name = $value['reward_name'];
            $reward->year        = $value['year'];
            $reward->score       = $value['score'];
            $reward->save();

        }

        return response()->json([
            "message" => "Employee and Reward Store Successfully"
        ]);






    }


    public function show(Reward $reward)
    {
        //
    }


    public function edit(Reward $reward)
    {
        //
    }


    public function update(Request $request, Reward $reward)
    {
        //
    }


    public function destroy(Reward $reward)
    {
        //
    }
}
