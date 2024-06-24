<?php

namespace App\Http\Controllers;

use App\Models\MdProfession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MdProfessionController extends Controller
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
        MdProfession::truncate();

        if(count($request->title)>0){
            for ($x = 0; $x < count($request->title); $x++)
            {
                $profession = new MdProfession();
                $profession->title = strtoupper($request->title[$x]);
                $profession->description = $request->description[$x];
                $profession->save();
            }
        }
        return true;
    }

    /**
     * Display the specified resource.
     */
    public function show(MdProfession $mdProfession)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MdProfession $mdProfession)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MdProfession $mdProfession)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MdProfession $mdProfession)
    {
        //
    }

    public function table()
    {
        if (! Gate::allows('admin')) {
            abort(403, 'You are not authorized.');
        }
        return view('master-data.table-profession',[
            'professions' => MdProfession::orderBy('title', 'ASC')->get(),
        ]);
    }

    public function select()
    {
        if (! Gate::allows('admin')) {
            abort(403, 'You are not authorized.');
        }
        return view('master-data.select-profession',[
            'professions' => MdProfession::orderBy('title', 'ASC')->get(),
        ]);
    }

}
