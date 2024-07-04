<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\MdEventDuty;
use App\Http\Requests\StoreMdEventDutyRequest;
use App\Http\Requests\UpdateMdEventDutyRequest;

class MdEventDutyController extends Controller
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
    public function store(StoreMdEventDutyRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MdEventDuty $mdEventDuty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MdEventDuty $mdEventDuty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMdEventDutyRequest $request, MdEventDuty $mdEventDuty)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MdEventDuty $mdEventDuty)
    {
        //
    }
}
