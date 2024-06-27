<?php

namespace App\Http\Controllers;

use App\Models\MdFamilyRelation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MdFamilyRelationController extends Controller
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
        MdFamilyRelation::truncate();

        if(count($request->title)>0){
            for ($x = 0; $x < count($request->title); $x++)
            {
                $familyrelation = new MdFamilyRelation();
                $familyrelation->title = strtoupper($request->title[$x]);
                $familyrelation->description = $request->description[$x];
                $familyrelation->save();
            }
        }
        return true;
    }

    /**
     * Display the specified resource.
     */
    public function show(MdFamilyRelation $mdFamilyRelation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MdFamilyRelation $mdFamilyRelation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MdFamilyRelation $mdFamilyRelation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MdFamilyRelation $mdFamilyRelation)
    {
        //
    }

    public function table()
    {
        if (! Gate::allows('admin')) {
            abort(403, 'You are not authorized.');
        }
        return view('master-data.table-familyrelation',[
            'famrelations' => MdFamilyRelation::all(),
        ]);
    }

    public function select()
    {
        if (! Gate::allows('admin')) {
            abort(403, 'You are not authorized.');
        }
        $collection = collect(MdFamilyRelation::all());
        return $collection->implode('title', ',');
    }

}
