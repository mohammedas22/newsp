<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::orderBy('id' ,'desc')->Paginate(5);
        return response()->view('cms.countries.index' , compact('countries'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('cms.countries.create');
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
            // 'country'=> 'required|string|min:3|max:20',
            // 'city'=> 'required',
        ]);
        if(!$validator->fails()){
        $countries = new Country();
        $countries->country = $request->get('country');
        $countries->city = $request->get('city');

        $isSaved =$countries->save();
        if($isSaved){
        return response()->json(['icon' => 'success' , 'title' => 'The country has been added successfully'] ,200);
        }
        else{
        return response()->json(['icon' => 'error' , 'title' => 'Failed to add country'] ,400);
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
        $countries = Country::findOrFail($id);
        return response()->view('cms.countries.edit' , compact('countries'));
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
            // 'country'=> 'required|string|min:3|max:20',
            // 'city'=> 'required',
        ]);
        if(!$validator->fails()){
        $countries = Country::findOrFail($id);
        $countries->country = $request->get('country');
        $countries->city = $request->get('city');

        $isSaved =$countries->save();
        return ['redirect'=>route('countries.index')];
        if($isSaved){
        return response()->json(['icon' => 'success' , 'title' => 'The country has been added successfully'] ,200);
        }
        else{
        return response()->json(['icon' => 'error' , 'title' => 'Failed to add country'] ,400);
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
        $countries = Country::destroy($id);
        return response()->json(['icon' => 'success' , 'title' => 'The city has been deleted successfully'] , $countries ? 200 : 400);
    }
}
