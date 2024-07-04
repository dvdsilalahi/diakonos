<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\MdSkillTalent;
use App\Http\Requests\StoreMdSkillTalentRequest;
use App\Http\Requests\UpdateMdSkillTalentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MdSkillTalentController extends Controller
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
    public function store(StoreMdSkillTalentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MdSkillTalent $mdSkillTalent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MdSkillTalent $mdSkillTalent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMdSkillTalentRequest $request, MdSkillTalent $mdSkillTalent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MdSkillTalent $mdSkillTalent)
    {
        //
    }

    public function table()
    {
        if (! Gate::allows('admin')) {
            abort(403, 'You are not authorized.');
        }
        return view('master-data.table-skilltalent',[
            'skillstalents' => MdSkillTalent::orderBy('title', 'ASC')->get(),
        ]);
    }

    public function select()
    {
        if (! Gate::allows('admin')) {
            abort(403, 'You are not authorized.');
        }
        return view('master-data.select-skilltalent',[
            'skillstalents' => MdSkillTalent::orderBy('title', 'ASC')->get(),
        ]);

//        $collection = collect(MdGender::all());
//        return $collection->implode('title', ',');
    }
}
