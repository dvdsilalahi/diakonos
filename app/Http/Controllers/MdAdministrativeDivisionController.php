<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\MdAdministrativeDivision;
use App\Http\Requests\StoreMdAdministrativeDivisionRequest;
use App\Http\Requests\UpdateMdAdministrativeDivisionRequest;

class MdAdministrativeDivisionController extends Controller
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
        MdAdministrativeDivision::truncate();

        if(count($request->village)>0){
            for ($x = 0; $x < count($request->village); $x++)
            {
                $admindiv = new MdAdministrativeDivision();
                if(array_key_exists($x, $request->id)){
                    $admindiv->id = $request->id[$x];
                }
                $admindiv->village = strtoupper($request->village[$x]);
                $admindiv->district = strtoupper($request->district[$x]);
                $admindiv->municipality = strtoupper($request->municipality[$x]);
                $admindiv->province = strtoupper($request->province[$x]);
                $admindiv->country = strtoupper($request->country[$x]);
                $admindiv->save();
            }
        }
        return true;

    }

    /**
     * Display the specified resource.
     */
    public function show(MdAdministrativeDivision $mdAdministrativeDivision)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MdAdministrativeDivision $mdAdministrativeDivision)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMdAdministrativeDivisionRequest $request, MdAdministrativeDivision $mdAdministrativeDivision)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MdAdministrativeDivision $mdAdministrativeDivision)
    {
        //
    }

    public function table()
    {
        if (! Gate::allows('admin')) {
            abort(403, 'You are not authorized.');
        }
        return view('master-data.table-admindiv',[
            'admindivs' => DB::table('md_administrative_divisions')
            ->select('id', 'village','district', 'municipality', 'province', 'country')
            ->groupBy('village','district', 'municipality', 'province', 'country')
            ->get(),
        ]);
    }

    public function select()
    {
        if (! Gate::allows('admin')) {
            abort(403, 'You are not authorized.');
        }
        return view('master-data.select-village',[
            'admindivs' => DB::table('md_administrative_divisions')
            ->select('id', 'village','district', 'municipality', 'province', 'country')
            ->groupBy('village','district', 'municipality', 'province', 'country')
            ->get(),
        ]);
    }
}
