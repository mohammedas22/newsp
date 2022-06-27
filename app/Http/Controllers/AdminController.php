<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        $countries = Country::all();
        return response()->view('cms.admin.create', compact('countries'));
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
            // 'password' => 'required|string|min:3|max:30',
        ]
    );

        if(!$validator->fails()){

            $admins = new Admin();
            $admins->email = $request->get('email');
            $admins->password = Hash::make($request->get('password'));
            if (request()->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . 'image.' . $image->getClientOriginalExtension();
                $image->move('storage/images/admin', $imageName);
                $admins->image = $imageName;
                }
            $isSaved = $admins->save();
            if($isSaved){
            $users = new User();
            $users->first_name = $request->get('first_name');
            $users->last_name = $request->get('last_name');
            $users->gender = $request->get('gender');
            $users->status = $request->get('status');
            $users->birth_date = $request->get('birth_date');
            $users->Country_id = $request->get('Country_id');
            $users->actor()->associate($admins);
            $isSaved = $users->save();
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
        $admins = Admin::with('user')->orderBy('id' ,'desc')->get();
        return response()->view('cms.admin.show' , compact('admins'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admins = Admin::with('user')->findOrFail($id);
        $countries = Country::all();
        return response()->view('cms.admin.edit' , compact('admins','countries'));
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
            // 'email' => 'required|string|min:3|max:40',
            // 'password' => 'required|string|min:3|max:30',
        ]
    );

        if(!$validator->fails()){

            $admins =Admin::findOrFail($id);
            $admins->email = $request->get('email');
            // $admins->password = Hash::make($request->get('password'));
            $isSaved = $admins->save();
            if($isSaved){
            $users = $admins->user;
            if (request()->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . 'image.' . $image->getClientOriginalExtension();
                $image->move('storage/images/admin', $imageName);
                $users->image = $imageName;
                }
            $users->first_name = $request->get('first_name');
            $users->last_name = $request->get('last_name');
            $users->gender = $request->get('gender');
            $users->status = $request->get('status');
            $users->birth_date = $request->get('birth_date');
            $users->Country_id = $request->get('Country_id');
            $users->actor()->associate($admins);
            $isSaved = $users->save();
            return ['redirect'=>route('admins.index')];
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
