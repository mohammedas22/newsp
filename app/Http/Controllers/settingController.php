<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;

class settingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::orderBy('id' ,'desc')->Paginate(5);
        return response()->view('cms.settings.index' , compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return response()->view('cms.settings.create' ,compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = validator($request->all(),[
            // 'email'=> 'required|string|min:3|max:40',
            // 'mobile'=> 'required|string',
            // 'phone'=> 'required|string|min:3|max:20',
            // 'start_date'=> 'required|string|min:3|max:20',
            // 'box_office'=> 'required|string|min:3|max:20',
            // 'address'=> 'required',
        ]);
        if(!$validator->fails()){
        $settings = new Setting();
        $settings->email = $request->get('email');
        $settings->mobile = $request->get('mobile');
        $settings->phone = $request->get('phone');
        $settings->working_time = $request->get('start_date');
        $settings->box_office = $request->get('box_office');
        $settings->address = $request->get('address');
        $isSaved =$settings->save();
        if($isSaved){
        return response()->json(['icon' => 'success' , 'title' => 'The diploma has been added successfully'] ,200);
        }else{
        return response()->json(['icon' => 'error' , 'title' => 'Failed to add diploma'] ,400);
        }
        }else{
        return response()->json(['icon' => 'error' , 'title' => $validator->getMessageBag()->first()] , 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $settings = Setting::findOrFail($id);
        return response()->view('cms.sett$settings.edit' , compact('settings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = validator($request->all(),[
            'email'=> 'required|string|min:3|max:20',
            'mobile'=> 'required|string|min:3|max:20',
            'phone'=> 'required|string|min:3|max:20',
            'start_date'=> 'required|string|min:3|max:20',
            'box_office'=> 'required|string|min:3|max:20',
            'address'=> 'required',
        ]);
        if(!$validator->fails()){
        $settings = Setting::findOrFail($id);
        $settings->email = $request->get('email');
        $settings->mobile = $request->get('mobile');
        $settings->phone = $request->get('phone');
        $settings->working_time = $request->get('start_date');
        $settings->box_office = $request->get('box_office');
        $settings->address = $request->get('address');
        $isSaved =$settings->save();
        return ['redirect'=>route('settings.index')];
        if($isSaved){
        return response()->json(['icon' => 'success' , 'title' => 'The diploma has been added successfully'] ,200);
        }else{
        return response()->json(['icon' => 'error' , 'title' => 'Failed to add diploma'] ,400);
        }
        }else{
        return response()->json(['icon' => 'error' , 'title' => $validator->getMessageBag()->first()] , 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $settings = Setting::destroy($id);
        return response()->json(['icon' => 'success' , 'title' => 'The city has been deleted successfully'] , $settings ? 200 : 400);
    }
}
