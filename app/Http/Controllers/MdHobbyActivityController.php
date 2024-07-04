<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\MdHobbyActivity;
use App\Http\Requests\StoreMdHobbyActivityRequest;
use App\Http\Requests\UpdateMdHobbyActivityRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MdHobbyActivityController extends Controller
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
    public function store(StoreMdHobbyActivityRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MdHobbyActivity $mdHobbyActivity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MdHobbyActivity $mdHobbyActivity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMdHobbyActivityRequest $request, MdHobbyActivity $mdHobbyActivity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MdHobbyActivity $mdHobbyActivity)
    {
        //
    }

    public function table()
    {
        if (! Gate::allows('admin')) {
            abort(403, 'You are not authorized.');
        }
        return view('master-data.table-hobbyactivity',[
            'hobbiesactivities' => MdHobbyActivity::orderBy('title', 'ASC')->get(),
        ]);
    }

    public function select()
    {
        if (! Gate::allows('admin')) {
            abort(403, 'You are not authorized.');
        }
        return view('master-data.select-hobbyactivity',[
            'hobbiesactivities' => MdHobbyActivity::orderBy('title', 'ASC')->get(),
        ]);
    }
}
