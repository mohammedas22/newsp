<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\User;
use App\Models\Viewer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ViewerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $viewers = Viewer::with('user')->orderBy('id' ,'desc')->get();
        return response()->view('cms.viewers.index', compact('viewers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return response()->view('cms.viewers.create' ,compact('countries'));
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
            // 'email' => 'required|string|min:3|max:40',
            // 'password' => 'required|string|min:3|max:30',
        ]
    );

        if(!$validator->fails()){

            $viewers = new Viewer();
            $viewers->email = $request->get('email');
            // $viewers->password = Hash::make($request->get('password'));
            $viewers->bio = $request->get('bio');
            $isSaved = $viewers->save();

            if($isSaved){
            $users = new User();
            if (request()->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . 'image.' . $image->getClientOriginalExtension();
                $image->move('storage/images/viewer', $imageName);
                $users->image = $imageName;
                }
            $users->first_name = $request->get('first_name');
            $users->last_name = $request->get('last_name');
            $users->gender = $request->get('gender');
            $users->status = $request->get('status');
            $users->birth_date = $request->get('birth_date');
            $users->Country_id = $request->get('Country_id');
            $users->actor()->associate($viewers);
            $isSaved = $users->save();

            if($isSaved){
                return response()->json(['icon' => 'success' , 'title' => 'The admin has been added successfully'] , 200);
            }

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
        $viewers = Viewer::with('user')->orderBy('id' ,'desc')->get();
        return response()->view('cms.viewers.show', compact('viewers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $viewers = Viewer::with('user')->findOrFail($id);
        $countries = Country::all();
        return response()->view('cms.viewers.edit' , compact('viewers' ,'countries'));
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
            'email' => 'required|string|min:3|max:40',
            // 'password' => 'required|string|min:3|max:30',
        ]
    );

        if(!$validator->fails()){

            $viewers =Viewer::findOrFail($id);
            $viewers->email = $request->get('email');
            // $viewers->password = Hash::make($request->get('password'));
            $viewers->bio = $request->get('bio');
            $isSaved = $viewers->save();
            if($isSaved){
            $users = $viewers->user;
            if (request()->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . 'image.' . $image->getClientOriginalExtension();
                $image->move('storage/images/viewer', $imageName);
                $users->image = $imageName;
                }
            $users->first_name = $request->get('first_name');
            $users->last_name = $request->get('last_name');
            $users->gender = $request->get('gender');
            $users->status = $request->get('status');
            $users->birth_date = $request->get('birth_date');
            $users->Country_id = $request->get('Country_id');
            $users->actor()->associate($viewers);
            $isSaved = $users->save();
            return ['redirect'=>route('viewers.index')];
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
        $viewers = Viewer::destroy($id);
        return response()->json(['icon' => 'success' , 'title' => 'The city has been deleted successfully'] , $viewers ? 200 : 400);
    }
}
