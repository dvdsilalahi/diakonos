<?php

namespace App\Http\Controllers;

use App\Models\MdEducation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MdEducationController extends Controller
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
        MdEducation::truncate();

        if(count($request->title)>0){
            for ($x = 0; $x < count($request->title); $x++)
            {
                $education = new MdEducation();
                $education->title = strtoupper($request->title[$x]);
                $education->description = $request->description[$x];
                $education->save();
            }
        }
        return true;
    }

    /**
     * Display the specified resource.
     */
    public function show(MdEducation $mdEducation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MdEducation $mdEducation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MdEducation $mdEducation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MdEducation $mdEducation)
    {
        //
    }

    public function table()
    {
        if (! Gate::allows('admin')) {
            abort(403, 'You are not authorized.');
        }
        return view('master-data.table-education',[
            'educations' => MdEducation::all(),
        ]);
    }

    public function select()
    {
        if (! Gate::allows('admin')) {
            abort(403, 'You are not authorized.');
        }
        $collection = collect(MdEducation::all());
        return $collection->implode('title', ',');
    }
}
