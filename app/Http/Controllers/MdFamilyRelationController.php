<?php

namespace App\Http\Controllers;

use App\Models\MdFamilyRelation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            "title"    => "required|array",
            "title.*"  => "required|string|max:50",
            "description"    => "array",
            "description.*"  => "nullable|string|max:256",
            "id"    => "array",
            "id.*"  => "nullable|integer",
        ]);
        if($validator->passes()){
            $validatedData = $validator->getData();

            if(count($validatedData['title']) === count(array_unique(array_map("strtoupper",$validatedData['title'])))){
                if(count($validatedData['title'])>0){

                    $familyrelations = MdFamilyRelation::all();
                    foreach($familyrelations as $familyrelation){
                        if(!in_array($familyrelation->id, $validatedData['id'])){
                            MdFamilyRelation::destroy($familyrelation->id);
                        }
                    }

                    for ($x = 0; $x < count($validatedData['title']); $x++)
                    {
                        if(array_key_exists($x, $validatedData['id'])){
                            $data['id'] = $validatedData['id'][$x];
                            $data['title'] = strtoupper($validatedData['title'][$x]);
                            $data['description'] = $validatedData['description'][$x];
                            if(!MdFamilyRelation::select('uuid')->where('id',$data['id'])->get()){
                                $data['uuid'] = sha1($data['title']);
                            }
                            MdFamilyRelation::where('id',$data['id'])->update($data);
                        }
                    }
                    for ($x = 0; $x < count($validatedData['title']); $x++)
                    {
                        if(!array_key_exists($x, $validatedData['id'])){
                            $data['title'] = strtoupper($validatedData['title'][$x]);
                            $data['description'] = $validatedData['description'][$x];
                            $data['uuid'] = sha1($data['title']);
                            MdFamilyRelation::create($data);
                        }
                    }

                }
                return true;
            } else {
                $ndup = count($validatedData['title']) - count(array_unique(array_map("strtoupper",$validatedData['title'])));
                return json_encode(['title'=>["There is $ndup duplicate(s) in the 'title' column"]]);
            }

        } else {
            return $validator->getMessageBag();
        }


        if(count($request->title)>0){
            for ($x = 0; $x < count($request->title); $x++)
            {
                $familyrelation = new MdFamilyRelation();
                if(array_key_exists($x, $request->id)){
                    $familyrelation->id = $request->id[$x];
                }
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
        return view('master-data.table-famrelation',[
            'famrelations' => MdFamilyRelation::orderBy('title', 'ASC')->get(),
        ]);
    }

    public function select()
    {
        if (! Gate::allows('admin')) {
            abort(403, 'You are not authorized.');
        }

        return view('master-data.select-famrelation',[
            'familyrelations' => MdFamilyRelation::orderBy('title', 'ASC')->get(),
        ]);
    }

}
