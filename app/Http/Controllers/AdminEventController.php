<?php

namespace App\Http\Controllers;

use App\Models\Community;
use App\Models\Event;
use App\Models\MdEventCategory;
use App\Models\MdEventTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class AdminEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        dd(123);
        if (! Gate::allows('admin')) {
            abort(403, 'You are not authorized.');
        }

        return view('admin.events.index',[
            'events' => Event::all(),
            'eventcategories' => MdEventCategory::all(),
            'eventcommunities' => Community::all(),
        ]);

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
       $validatedData = $request->validate([
            "title" => "required",
            "start_date" => "required|date",
            "start_time" => "required",
            "end_date" => "required|date",
            "end_time" => "required",
            "event_category" => "required",
            "communities" => "required",
            "color" => "required",
        ]);

        $validatedData['communities'] = json_encode(array('items' => $request->communities));

//        dd($validatedData);
        $data = Event::create($validatedData);
        $validatedData['uuid'] = sha1($data->id);
        $data = Event::where('id', $data->id)->update($validatedData);
        return redirect()->route('events.index')
            ->with('success', 'Event is added successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function list()
    {
        $data = Event::get();


        for($i=0;$i<count($data);$i++){
            $template = MdEventTemplate::where('event_category',$data[$i]->event_category)->get();
            $category = MdEventCategory::where('id',$data[$i]->event_category)->get();
            $data[$i]['event_category'] = $category;
            $data[$i]['event_template'] = $template;

//            dd($data[$i]['event_category'][0]['title']);
            $communities = json_decode(json_decode($data[$i])->communities)->items;
            $communities_att ="";
            for($j=0;$j<count($communities);$j++){
                $communities_att .= Community::where('id',$communities[$j])->first()->name . ",";
            }
            $data[$i]['communities'] = rtrim($communities_att, ',');

        }

        dd($data);

    }
}
