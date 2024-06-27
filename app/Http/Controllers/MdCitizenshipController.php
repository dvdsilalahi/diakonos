<?php

namespace App\Http\Controllers;

use App\Models\MdCitizenship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class MdCitizenshipController extends Controller
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
        MdCitizenship::truncate();

        if(count($request->title)>0){
            for ($x = 0; $x < count($request->title); $x++)
            {
                $citizenship = new MdCitizenship();
                $citizenship->title = strtoupper($request->title[$x]);
                $citizenship->description = $request->description[$x];
                $citizenship->save();
            }
        }
        return true;
    }

    /**
     * Display the specified resource.
     */
    public function show(MdCitizenship $mdCitizenship)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MdCitizenship $mdCitizenship)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MdCitizenship $mdCitizenship)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MdCitizenship $mdCitizenship)
    {
        //
    }

    public function table()
    {
        if (! Gate::allows('admin')) {
            abort(403, 'You are not authorized.');
        }
        return view('master-data.table-citizenship',[
            'citizenships' => MdCitizenship::all(),
        ]);
    }

    public function select()
    {
        if (! Gate::allows('admin')) {
            abort(403, 'You are not authorized.');
        }
        $collection = collect(MdCitizenship::all());
        return $collection->implode('title', ',');
    }

}
