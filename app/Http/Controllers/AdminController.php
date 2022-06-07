<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $admins = Admin::all();
        $admins = Admin::with('user')->orderBy('id' ,'desc')->get();
        return response()->view('cms.admin.index' , compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('cms.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(),[
            'email' => 'required|string|min:3|max:40',
            'password' => 'required|string|min:3|max:30',
        ]
    );

        if(!$validator->fails()){

            $admins = new Admin();
            $admins->email = $request->get('email');
            $admins->password = $request->get('password');

            $isSaved = $admins->save();

            if($isSaved){
                return response()->json(['icon' => 'success' , 'title' => 'The admin has been added successfully'] , 200);

            }
            else{
                return response()->json(['icon' => 'error' , 'title' => 'Failed to add admin'] , 400);
            }
        }
            else{
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
        $admins = Admin::findOrFail($id);
        return response()->view('cms.admin.edit' , compact('admins'));
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
        $validator = Validator($request->all(),[
            'email' => 'required|string|min:3|max:20',
            'password' => 'required|min:3|max:30',
        ]
    );

        if(!$validator->fails()){

            $admins = Admin::findOrFail($id);
            $admins->email = $request->get('email');
            $admins->password = $request->get('password');

            $isSaved = $admins->save();
            return ['redirect'=>route('admins.index')];
            if($isSaved){
                return response()->json(['icon' => 'success' , 'title' => 'The admin has been added successfully'] , 200);
            }
            else{
                return response()->json(['icon' => 'error' , 'title' => 'Failed to add admin'] , 400);
            }
        }
        else{
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
        $admins= Admin::destroy($id);
        return response()->json(['icon' => 'success' , 'title' => 'The city has been deleted successfully'] , $admins ? 200 : 400);
    }
}
