<?php

namespace App\Http\Controllers;

use App\Models\MdMinistry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MdMinistryController extends Controller
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
        MdMinistry::truncate();

        if(count($request->title)>0){
            for ($x = 0; $x < count($request->title); $x++)
            {
                $ministry = new MdMinistry();
                $ministry->title = strtoupper($request->title[$x]);
                $ministry->description = $request->description[$x];
                $ministry->save();
            }
        }
        return true;
    }

    /**
     * Display the specified resource.
     */
    public function show(MdMinistry $mdMinistry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MdMinistry $mdMinistry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MdMinistry $mdMinistry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MdMinistry $mdMinistry)
    {
        //
    }

    public function table()
    {
        if (! Gate::allows('admin')) {
            abort(403, 'You are not authorized.');
        }
        return view('master-data.table-ministry',[
            'ministries' => MdMinistry::orderBy('title', 'ASC')->get(),
        ]);
    }

    public function select()
    {
        if (! Gate::allows('admin')) {
            abort(403, 'You are not authorized.');
        }
        return view('master-data.select-ministry',[
            'ministries' => MdMinistry::orderBy('title', 'ASC')->get(),
        ]);
    }
}
