<?php

namespace App\Http\Controllers;

use App\Models\Community;
use App\Models\MdCommunityArea;
use App\Models\MdCommunityCategory;
use App\Models\MdCommunitySegment;
use App\Models\Member;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use App\Models\MdAdministrativeDivision;
use App\Http\Requests\UpdateMemberRequest;

class AdminCommunityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (! Gate::allows('admin')) {
            abort(403, 'You are not authorized.');
        }

        return view('admin.communities.index',[
            'communities' => Community::where('is_active',1)->get(),
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
//        dd(MdCommunityArea::all());
//        dd(Member::where('ministries','!=',[])->orWhere('ministries','!=',null)->get());
        return view('admin.communities.create',[
            'categories' => MdCommunityCategory::all(),
            'segments' => MdCommunitySegment::all(),
            'areas' => MdCommunityArea::all(),
            'leaders' => Member::where('ministries','!=',[])->orWhere('ministries','!=',null)->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Validate input data
        $validatedData = $request->validate([
            "category"  => "required|integer",
            "segment"  => "required|integer",
            "area"  => "required|integer",
            'name' => 'required|unique:communities,name|max:256',
            "leaders"    => "array",
            "leaders.*"  => "nullable|integer",
            "description"  => "nullable|string|max:256",
            "address"  => "required|string|max:256",
            "social_media"    => "array",
            "social_media.*"  => "nullable|string|max:256",
            "gmap_link"  => "nullable|string|max:256",
        ]);

//        dd($validatedData);

        $validatedData['uuid'] = sha1($request->name.floor(microtime(true) * 1000));

        $validatedData['leaders'] = json_encode(array('items' => $request->leaders));
        $validatedData['social_media'] = json_encode(array('items' => $request->social_media));

        // Create a new member record
        Community::create($validatedData);

        return redirect()->route('communities.index')
            ->with('success', 'Community '.$request->name.' is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Community $community)
    {
        $community = Community::where('uuid',$community->uuid)->with(['communityCategory','communitySegment','communityArea'])->get()[0];
        $leaders = json_decode($community['leaders'], true)['items'];
        $leaders_att = "";
        for($j=0;$j<count($leaders);$j++){
            $leader = Member::where('id',$leaders[$j])->first();
            $leaders_att .= $leader->first_name . ' ' . $leader->last_name . ",<br>";
        }
        $community['leaders'] = rtrim($leaders_att, ',<br>');

        $social_media = json_decode($community['social_media'], true)['items'];
        $social_media_att = "";
        for($j=0;$j<count($social_media);$j++){
            $social_media_att .= $social_media[$j] . ",<br>";
        }
        $community['social_media'] = rtrim($social_media_att, ',<br>');

       return view('admin.communities.show',[
           'community' => $community,
       ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Community $community)
    {

         $community->leaders = json_decode($community->leaders, true);
         $community->social_media = json_decode($community->social_media, true);
//         $community->social_media = $community->social_media['items'];
  //      dd($community);
        //
        return view('admin.communities.edit',[
            'community' => $community,
            'categories' => MdCommunityCategory::all(),
            'segments' => MdCommunitySegment::all(),
            'areas' => MdCommunityArea::all(),
            'leaders' => Member::where('ministries','!=',[])->orWhere('ministries','!=',null)->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            "category"  => "required|integer",
            "segment"  => "required|integer",
            "area"  => "required|integer",
            'name' => 'required|max:256',
            "leaders"    => "array",
            "leaders.*"  => "nullable|integer",
            "description"  => "nullable|string|max:256",
            "address"  => "required|string|max:256",
            "social_media"    => "array",
            "social_media.*"  => "nullable|string|max:256",
            "gmap_link"  => "nullable|string|max:256",
        ];

        $validatedData = $request->validate($rules);

        $validatedData['leaders'] = json_encode(array('items' => $request->leaders));
        $validatedData['social_media'] = json_encode(array('items' => $request->social_media));

        // Create a new member record
        Community::where('uuid', $id)->update($validatedData);

        return redirect()->route('communities.index')
            ->with('success', 'Community '.$request->name.' is added successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Community $community)
    {
        $community->delete();

        return redirect()->back()->with('success','Member '.$community->name.' has been deleted!');
    }

    public function archive(Request $request, Community $community){
        $community->is_active = $request->is_active;
        $community->save();

        return redirect()->back()->with('success','Community '.$community->name.' has been archived!');
    }

    public function list()
    {
        $data = Community::with(['communityCategory','communitySegment','communityArea'])->where('is_active', 1)->get()->toArray();

        for($i=0;$i<count($data);$i++){
            if(isset($data[$i]['community_category'])){
                $data[$i]['category'] = $data[$i]['community_category']['title'];
            }
            if(isset($data[$i]['community_segment'])){
                $data[$i]['segment'] = $data[$i]['community_segment']['title'];
            }
            if(isset($data[$i]['community_area'])){
                $data[$i]['area'] = $data[$i]['community_area']['title'];
            }
//            print_r(json_decode($data[$i]['leaders']));
            if(isset(json_decode($data[$i]['leaders'])->items)){
                $leaders = json_decode($data[$i]['leaders'])->items;
                $leaders_att ="";
                for($j=0;$j<count($leaders);$j++){
                    $leader = Member::where('id',$leaders[$j])->first();
                    $leaders_att .= $leader->first_name . ' ' . $leader->last_name . ",<br>";
                }
                $data[$i]['leaders'] = rtrim($leaders_att, ',<br>');

            }
            if(isset(json_decode($data[$i]['social_media'])->items)){
                $social_media = json_decode($data[$i]['social_media'])->items;
                $social_media_att ="";
                for($j=0;$j<count($social_media);$j++){
                    $social_media_att .= $social_media[$j] . ",<br>";
                }
                $data[$i]['social_media'] = rtrim($social_media_att, ',<br>');

            }

        }
        return ['data' => $data];
    }

}
