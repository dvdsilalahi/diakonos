<?php

namespace App\Http\Controllers;

use App\Models\CashJournal;
use App\Http\Requests\StoreCashJournalRequest;
use App\Http\Requests\UpdateCashJournalRequest;

class CashJournalController extends Controller
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
    public function store(StoreCashJournalRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CashJournal $cashJournal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CashJournal $cashJournal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCashJournalRequest $request, CashJournal $cashJournal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CashJournal $cashJournal)
    {
        //
    }
}
