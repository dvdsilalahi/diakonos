<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\MdPersonalityType;
use App\Http\Requests\StoreMdPersonalityTypeRequest;
use App\Http\Requests\UpdateMdPersonalityTypeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class MdPersonalityTypeController extends Controller
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
    public function store(StoreMdPersonalityTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MdPersonalityType $mdPersonalityType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MdPersonalityType $mdPersonalityType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMdPersonalityTypeRequest $request, MdPersonalityType $mdPersonalityType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MdPersonalityType $mdPersonalityType)
    {
        //
    }

    public function table()
    {
        if (! Gate::allows('admin')) {
            abort(403, 'You are not authorized.');
        }
        return view('master-data.table-ministry',[
            'ministries' => MdPersonalityType::orderBy('title', 'ASC')->get(),
        ]);
    }

    public function select()
    {
        if (! Gate::allows('admin')) {
            abort(403, 'You are not authorized.');
        }
        return view('master-data.select-ministry',[
            'ministries' => MdPersonalityType::orderBy('title', 'ASC')->get(),
        ]);
    }
}
