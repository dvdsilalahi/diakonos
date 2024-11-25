<?php

namespace App\Http\Controllers;

use App\Models\MdHobbyActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class MdHobbyActivityController extends Controller
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

                    $hobbiesactivities = MdHobbyActivity::all();
                    foreach($hobbiesactivities as $hobbyactivity){
                        if(!in_array($hobbyactivity->id, $validatedData['id'])){
                            MdHobbyActivity::destroy($hobbyactivity->id);
                        }
                    }

                    for ($x = 0; $x < count($validatedData['title']); $x++)
                    {
                        if(array_key_exists($x, $validatedData['id'])){
                            $data['id'] = $validatedData['id'][$x];
                            $data['title'] = strtoupper($validatedData['title'][$x]);
                            $data['description'] = $validatedData['description'][$x];
                            if(!MdHobbyActivity::select('uuid')->where('id',$data['id'])->get()){
                                $data['uuid'] = sha1($data['title']);
                            }
                            MdHobbyActivity::where('id',$data['id'])->update($data);
                        }
                    }
                    for ($x = 0; $x < count($validatedData['title']); $x++)
                    {
                        if(!array_key_exists($x, $validatedData['id'])){
                            $data['title'] = strtoupper($validatedData['title'][$x]);
                            $data['description'] = $validatedData['description'][$x];
                            $data['uuid'] = sha1($data['title']);
                            MdHobbyActivity::create($data);
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
                $hobbyactivity = new MdHobbyActivity();
                if(array_key_exists($x, $request->id)){
                    $hobbyactivity->id = $request->id[$x];
                }
                $hobbyactivity->title = strtoupper($request->title[$x]);
                $hobbyactivity->description = $request->description[$x];
                $hobbyactivity->save();
            }
        }
        return true;
    }

    /**
     * Display the specified resource.
     */
    public function show(MdHobbyActivity $mdHobbyActivity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MdHobbyActivity $mdHobbyActivity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MdHobbyActivity $mdHobbyActivity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MdHobbyActivity $mdHobbyActivity)
    {
        //
    }

    public function table()
    {
        if (! Gate::allows('admin')) {
            abort(403, 'You are not authorized.');
        }
        return view('master-data.table-hobbyactivity',[
            'hobbiesactivities' => MdHobbyActivity::orderBy('title', 'ASC')->get(),
        ]);
    }

    public function select()
    {
        if (! Gate::allows('admin')) {
            abort(403, 'You are not authorized.');
        }
        return view('master-data.select-hobbyactivity',[
            'hobbiesactivities' => MdHobbyActivity::orderBy('title', 'ASC')->get(),
        ]);
    }
}
