<?php

namespace App\Http\Controllers;

use App\Models\MdGender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MdGenderController extends Controller
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
        MdGender::truncate();

        if(count($request->title)>0){
            for ($x = 0; $x < count($request->title); $x++)
            {
                $gender = new MdGender();
                $gender->title = strtoupper($request->title[$x]);
                $gender->description = $request->description[$x];
                $gender->save();
            }
        }
        return true;
    }

    /**
     * Display the specified resource.
     */
    public function show(MdGender $mdGender)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MdGender $mdGender)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MdGender $mdGender)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MdGender $mdGender)
    {
        //
    }

    public function table()
    {
        if (! Gate::allows('admin')) {
            abort(403, 'You are not authorized.');
        }
        return view('master-data.table-gender',[
            'genders' => MdGender::all(),
        ]);
    }

    public function select()
    {
        if (! Gate::allows('admin')) {
            abort(403, 'You are not authorized.');
        }

        $collection = collect(MdGender::all());
        return $collection->implode('title', ',');
    }

}
