<?php

namespace App\Http\Controllers;

use App\Models\Community;
use App\Models\MdHobbyActivity;
use App\Models\MdMinistry;
use App\Models\MdPersonalityType;
use App\Models\MdSkillTalent;
use App\Models\MdSpiritualGift;
use App\Models\Member;
use App\Models\MdGender;
use App\Models\MdBloodType;
use App\Models\MdEducation;
use Illuminate\Support\Str;
use App\Models\MdProfession;
use Illuminate\Http\Request;
use App\Models\MdCitizenship;
use App\Models\MdFamilyRelation;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use App\Models\MdAdministrativeDivision;
use App\Http\Requests\UpdateMemberRequest;

class AdminMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (! Gate::allows('admin')) {
            abort(403, 'You are not authorized.');
        }

        return view('dashboard.members.index',[
            'members' => Member::where('is_active',1)->get(),
        ]);
    }

    public function family(Member $member)
    {
        if (! Gate::allows('admin')) {
            abort(403, 'You are not authorized.');
        }

        return view('dashboard.members.family',[
            'fam_members' => Member::where('fr_no', $member->fr_no)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.members.create',[
            'admindivs' => DB::table('md_administrative_divisions')
            ->select('id','village','district', 'municipality', 'province', 'country')
            ->groupBy('village','district', 'municipality', 'province', 'country')
            ->get(),
            'citizenships' => MdCitizenship::all(),
            'bloodtypes' => MdBloodType::orderBy('title', 'ASC')->get(),
            'educations' => MdEducation::all(),
            'professions' => MdProfession::orderBy('title', 'ASC')->get(),
            'famrelations' => MdFamilyRelation::orderBy('title', 'ASC')->get(),
            'genders' => MdGender::all(),
            'ministries' => MdMinistry::all(),
            'spiritualgifts' => MdSpiritualGift::all(),
            'communities' => Community::all(),
            'personalitytypes' => MdPersonalityType::all(),
            'skillstalents' => MdSkillTalent::all(),
            'hobbiesactivities' => MdHobbyActivity::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Validate input data
        $validatedData = $request->validate([
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
        ]);

        if(!$request->member_code){
            $validatedData['member_code'] = strval(rand(1000000000,9999999999));
        }

        if($request->file('pic')){
            $validatedData['pic'] = $request->file('pic')->store('member-pic');
        }

        if($request->ministries){
            $validatedData['ministries'] = json_encode(explode(',',$request->ministries));
        }

        $validatedData['uuid'] = sha1($request->email.$request->first_name.$request->last_name.$request->date_of_birth.$request->place_of_birth.$request->nin.$request->fr_no.floor(microtime(true) * 1000));

        // Create a new member record
        Member::create($validatedData);

        return redirect()->route('members.index')
            ->with('success', 'Member '.$request->first_name.' '.$request->last_name.' is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        //
        return view('dashboard.members.show',[
            'member' => $member
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        //
        return view('dashboard.members.edit',[
            'member' => $member
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

        return redirect('/dashboard/members')->with('success','Member '.$member->first_name.' '.$member->last_name.' has been updated!');

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
        return ['data' => Member::all()];
    }

    public function select()
    {
        if (! Gate::allows('admin')) {
            abort(403, 'You are not authorized.');
        }

        return view('dashboard.member.select-member',[
//            'members' => Member::whereNotNull('ministries')->get(),
            'members' => Member::all(),
        ]);
    }
}
