<?php

namespace App\Http\Controllers;

use App\Models\Community;
use App\Models\MdCOA;
use App\Models\MdCommunitySegment;
use App\Models\MdEventCategory;
use App\Models\MdEventDuty;
use App\Models\MdEventTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminEventTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (! Gate::allows('admin')) {
            abort(403, 'You are not authorized.');
        }

        return view('admin.event-templates.index',[
            'event_templates' => MdEventTemplate::with('eventCategory')->find(1),
            'event_categories' => MdEventCategory::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (! Gate::allows('admin')) {
            abort(403, 'You are not authorized.');
        }

        return view('admin.event-templates.create',[
            'event_templates' => MdEventTemplate::with('eventCategory')->find(1),
            'eventcategories' => MdEventCategory::all(),
            'event_duties' => MdEventDuty::all(),
            'segments' => MdCommunitySegment::all(),
            'accounts' => MdCOA::all(),
            'communities' => Community::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'event_category' => 'required',
            'minister_duties' => 'required',
            'segment_attendances' => 'required',
            'offering_accounts' => 'required',
            'public_visibility' => 'required',
        ]);

        $validatedData['event_category'] = $request->event_category;
        $validatedData['minister_duties'] = json_encode(array('items' => $request->minister_duties));
        $validatedData['community_duties'] = json_encode(array('items' => $request->community_duties));
        $validatedData['segment_attendances'] = json_encode(array('items' => $request->segment_attendances));
        $validatedData['offering_accounts'] = json_encode(array('items' => $request->offering_accounts));
        $validatedData['public_visibility'] = $request->public_visibility;
//dd($validatedData);
        $data = MdEventTemplate::create($validatedData);
        $validatedData['uuid'] = sha1($data->id);
        $data = MdEventTemplate::where('id', $data->id)->update($validatedData);
        return redirect()->route('event-templates.index')
            ->with('success', 'Event Template is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(MdEventTemplate $eventTemplate)
    {
        $eventTemplate->minister_duties = json_decode($eventTemplate->minister_duties, true);
        $eventTemplate->community_duties = json_decode($eventTemplate->community_duties, true);
        $eventTemplate->segment_attendances = json_decode($eventTemplate->segment_attendances, true);
        $eventTemplate->offering_accounts = json_decode($eventTemplate->offering_accounts, true);

        return view('admin.event-templates.show',[
            'eventTemplate' => $eventTemplate,
            'eventcategories' => MdEventCategory::all(),
            'event_duties' => MdEventDuty::all(),
            'segments' => MdCommunitySegment::all(),
            'accounts' => MdCOA::all(),
            'communities' => Community::all(),

        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MdEventTemplate $eventTemplate)
    {
        $eventTemplate->minister_duties = json_decode($eventTemplate->minister_duties, true);
        $eventTemplate->community_duties = json_decode($eventTemplate->community_duties, true);
        $eventTemplate->segment_attendances = json_decode($eventTemplate->segment_attendances, true);
        $eventTemplate->offering_accounts = json_decode($eventTemplate->offering_accounts, true);

        return view('admin.event-templates.edit',[
            'eventTemplate' => $eventTemplate,
            'eventcategories' => MdEventCategory::all(),
            'event_duties' => MdEventDuty::all(),
            'segments' => MdCommunitySegment::all(),
            'accounts' => MdCOA::all(),
            'communities' => Community::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'event_category' => 'required',
            'minister_duties' => 'required',
            'segment_attendances' => 'required',
            'offering_accounts' => 'required',
            'public_visibility' => 'required',
        ];

        $validatedData = $request->validate($rules);

        $validatedData['event_category'] = $request->event_category;
        $validatedData['minister_duties'] = json_encode(array('items' => $request->minister_duties));
        $validatedData['community_duties'] = json_encode(array('items' => $request->community_duties));
        $validatedData['segment_attendances'] = json_encode(array('items' => $request->segment_attendances));
        $validatedData['offering_accounts'] = json_encode(array('items' => $request->offering_accounts));
        $validatedData['public_visibility'] = $request->public_visibility;

        MdEventTemplate::where('uuid', $id)->update($validatedData);
        return redirect()->route('event-templates.index')
            ->with('success', 'Event Template is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MdEventTemplate $eventTemplate)
    {
//        dd($eventTemplate);
        $eventTemplate->delete();

        return redirect()->back()->with('success','Event Template '.$eventTemplate->event_category.' has been deleted!');

    }

    public function list()
    {
        $data = MdEventTemplate::with('eventCategory')->get();

        for($i=0;$i<count($data);$i++){
//            $event_category = MdEventCategory::where('id', $data[$i]['event_category'])->first();
//            $data[$i]['event_category'] = $event_category->title;

            $minister_duties = json_decode(json_decode($data[$i])->minister_duties)->items;
            $minister_duties_att ="";
            for($j=0;$j<count($minister_duties);$j++){
                $minister_duties_att .= MdEventDuty::where('id',$minister_duties[$j])->first()->title . ",";
            }
            $data[$i]['minister_duties'] = rtrim($minister_duties_att, ',');

            $community_duties = json_decode(json_decode($data[$i])->community_duties)->items;

            if(isset($community_duties)){
                $community_duties_att ="";
                for($j=0;$j<count($community_duties);$j++){
                    $community_duties_att .= MdEventDuty::where('id',$community_duties[$j])->first()->title . ",";
                }
                $data[$i]['community_duties'] = rtrim($community_duties_att, ',');
            } else {
                $data[$i]['community_duties'] = "N/A";
            }

            $segment_attendances = json_decode(json_decode($data[$i])->segment_attendances)->items;
            $str_segment_att ="";
            for($j=0;$j<count($segment_attendances);$j++){
                $str_segment_att .= MdCommunitySegment::where('id',$segment_attendances[$j])->first()->title . ",";
            }
            $data[$i]['segment_attendances'] = rtrim($str_segment_att, ',');

            $offering_accounts = json_decode(json_decode($data[$i])->offering_accounts)->items;
            $str_offering_acc ="";
            for($j=0;$j<count($offering_accounts);$j++){
                $str_offering_acc .= MdCOA::where('id',$offering_accounts[$j])->first()->account_name . ",";
            }
            $data[$i]['offering_accounts'] = rtrim($str_offering_acc, ',');
        }

        return ['data' => $data];
    }

}
