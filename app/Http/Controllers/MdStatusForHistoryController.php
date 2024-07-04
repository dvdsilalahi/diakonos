<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\MdStatusForHistory;
use App\Http\Requests\StoreMdStatusForHistoryRequest;
use App\Http\Requests\UpdateMdStatusForHistoryRequest;

class MdStatusForHistoryController extends Controller
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
    public function store(StoreMdStatusForHistoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MdStatusForHistory $mdStatusForHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MdStatusForHistory $mdStatusForHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMdStatusForHistoryRequest $request, MdStatusForHistory $mdStatusForHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MdStatusForHistory $mdStatusForHistory)
    {
        //
    }
}
