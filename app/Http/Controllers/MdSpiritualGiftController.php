<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\MdSpiritualGift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MdSpiritualGiftController extends Controller
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
        MdSpiritualGift::truncate();

        if(count($request->title)>0){
            for ($x = 0; $x < count($request->title); $x++)
            {
                $spritualgift = new MdSpiritualGift();
                $spritualgift->title = strtoupper($request->title[$x]);
                $spritualgift->description = $request->description[$x];
                $spritualgift->save();
            }
        }
        return true;
    }

    /**
     * Display the specified resource.
     */
    public function show(MdSpiritualGift $mdSpiritualGift)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MdSpiritualGift $mdSpiritualGift)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MdSpiritualGift $mdSpiritualGift)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MdSpiritualGift $mdSpiritualGift)
    {
        //
    }

    public function table()
    {
        if (! Gate::allows('admin')) {
            abort(403, 'You are not authorized.');
        }
        return view('master-data.table-spiritualgift',[
            'spiritualgifts' => MdSpiritualGift::orderBy('title', 'ASC')->get(),
        ]);
    }

    public function select()
    {
        if (! Gate::allows('admin')) {
            abort(403, 'You are not authorized.');
        }
        return view('master-data.select-spiritualgift',[
            'spiritualgifts' => MdSpiritualGift::orderBy('title', 'ASC')->get(),
        ]);
    }
}
