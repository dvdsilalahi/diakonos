<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\MdCOA;
use App\Http\Requests\StoreMdCOARequest;
use App\Http\Requests\UpdateMdCOARequest;
use Illuminate\Support\Facades\Gate;

class MdCOAController extends Controller
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
    public function store(StoreMdCOARequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MdCOA $mdCOA)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MdCOA $mdCOA)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMdCOARequest $request, MdCOA $mdCOA)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MdCOA $mdCOA)
    {
        //
    }

    public function select()
    {
        if (! Gate::allows('admin')) {
            abort(403, 'You are not authorized.');
        }

        return view('master-data.select-account',[
            'accounts' => MdCOA::orderBy('account_name', 'ASC')->get(),
        ]);
    }

}
