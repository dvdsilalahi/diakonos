<?php

namespace App\Http\Controllers;

use App\Models\MdBloodType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MdBloodTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        MdBloodType::truncate();

        if(count($request->title)>0){
            for ($x = 0; $x < count($request->title); $x++)
            {
                $bloodtype = new MdBloodType();
                $bloodtype->title = strtoupper($request->title[$x]);
                $bloodtype->description = $request->description[$x];
                $bloodtype->save();
            }
        }
        return true;
    }

    /**
     * Display the specified resource.
     */
    public function show(MdBloodType $mdBloodType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MdBloodType $mdBloodType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MdBloodType $mdBloodType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MdBloodType $mdBloodType)
    {
        //
    }

    public function table()
    {
        if (! Gate::allows('admin')) {
            abort(403, 'You are not authorized.');
        }
        return view('master-data.table-bloodtype',[
            'bloodtypes' => MdBloodType::orderBy('title', 'ASC')->get(),
        ]);
    }

    public function select()
    {
        if (! Gate::allows('admin')) {
            abort(403, 'You are not authorized.');
        }
        return view('master-data.select-bloodtype',[
            'bloodtypes' => MdBloodType::orderBy('title', 'ASC')->get(),
        ]);
    }

}
