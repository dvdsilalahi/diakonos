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
        return view('admin.communities.show',[
            'community' => $community
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Community $community)
    {
         $community->leaders = json_decode($community->leaders, true);
         $community->social_media = json_decode($community->social_media, true);

//        dd($community);
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
    public function update(Request $request, Member $member)
    {
        $rules = [
            'member_code' => 'max:16|nullable',
            'first_name' => 'required|max:50',
            'last_name' => 'max:50|nullable',
            'pic' => 'image|file|max:1024',
            "email"=> "email:dns|nullable",
            "phone_number"=> "nullable",
            "place_of_birth"=> "nullable",
            "date_of_birth"=> "nullable",
            "address"=> "nullable",
            "nin"=> "nullable",
            "fr_no"=> "nullable",
            "gender"=> "nullable",
            "fam_relation"=> "nullable",
            "education"=> "nullable",
            "profession"=> "nullable",
            "citizenship"=> "nullable",
            "father_name"=> "nullable",
            "mother_name"=> "nullable",
        ];

        $validatedData = $request->validate($rules);

        if(!$request->member_code){
            $validatedData['member_code'] = strval(rand(1000000000,9999999999));
        }

        if($request->file('pic')){
            if($request->oldPic) {
                Storage::delete($request->oldPic);
            }
            $validatedData['pic'] = $request->file('pic')->store('member-pic');
        }

        Member::where('uuid',$member->uuid)->update($validatedData);

        return redirect('/dashboard/communities')->with('success','Member '.$member->first_name.' '.$member->last_name.' has been updated!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        if($member->pic) {
            Storage::delete($member->pic);
        }

        $member->delete();

        $contains = Str::contains(URL::previous(), 'family');

        if($contains){
            $rmn_member = Member::where('fr_no', $member->fr_no)->first();
            if($rmn_member) {
                return redirect('/dashboard/family/'.$rmn_member->uuid)->with('success','Member '.$member->first_name.' '.$member->last_name.' has been deleted!');
            } else {
                return redirect()->back()->with('success','Member '.$member->first_name.' '.$member->last_name.' has been deleted!');
            }
        } else {
            return redirect()->back()->with('success','Member '.$member->first_name.' '.$member->last_name.' has been deleted!');
        }
    }

    public function archive(Request $request, Member $member){
        $member->is_active = $request->is_active;
        $member->save();

        $contains = Str::contains(URL::previous(), 'family');

        if($contains){
            $rmn_member = Member::where('fr_no', $member->fr_no)->first();
            if($rmn_member) {
                return redirect('/dashboard/family/'.$rmn_member->uuid)->with('success','Member '.$member->first_name.' '.$member->last_name.' has been archived!');
            } else {
                return redirect()->back()->with('success','Member '.$member->first_name.' '.$member->last_name.' has been archived!');
            }
        } else {
            return redirect()->back()->with('success','Member '.$member->first_name.' '.$member->last_name.' has been archived!');
        }
    }

    public function list()
    {
        $data = Community::with(['communityCategory','communitySegment','communityArea'])->get()->toArray();

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
