<?php

namespace App\Http\Controllers;

use App\Models\Contact_requests;
use App\Models\User;
use Illuminate\Http\Request;

class Contact_requestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact_requests = Contact_requests::orderBy('id', 'desc')->Paginate(5);
        return response()->view('cms.contact_requests.index', compact('contact_requests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return response()->view('cms.contact_requests.create' , compact('users') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = validator($request->all(), [
            'email' => 'required|string|min:3|max:40',
            'password' => 'required|string|min:3|max:20',
        ]);
        if (!$validator->fails()) {
            $contact_requests = new Contact_requests();
            $contact_requests->name = $request->get('name');
            $contact_requests->email = $request->get('email');
            $contact_requests->mobile = $request->get('mobile');
            $contact_requests->title = $request->get('title');
            $contact_requests->message = $request->get('message');
            $contact_requests->user_id = $request->get('user_id');
            $isSaved = $contact_requests->save();
            if ($isSaved) {
                return response()->json(['icon' => 'success', 'title' => 'The Contact_requests has been added successfully'], 200);
            } else {
                return response()->json(['icon' => 'error', 'title' => 'Failed to add Contact_requests'], 400);
            }
        } else {
            return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
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
        $contact_requests = Contact_requests::findOrFail($id);
        return response()->view('cms.contact_requests.edit' , compact('contact_requests'));
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
            'name'=> 'required|string|min:3|max:20',
            'email'=> 'required',
        ]);
        if(!$validator->fails()){
            $contact_requests = Contact_requests::findOrFail($id);
            $contact_requests->name = $request->get('name');
            $contact_requests->email = $request->get('email');
            $contact_requests->mobile = $request->get('mobile');
            $contact_requests->title = $request->get('title');
            $contact_requests->message = $request->get('message');
            $contact_requests->user_id = $request->get('user_id');
            $isSaved =$contact_requests->save();
            return ['redirect'=>route('contact_requests.index')];
            if($isSaved){
            return response()->json(['icon' => 'success' , 'title' => 'The Contact_requests has been added successfully'] ,200);
            }
            else{
            return response()->json(['icon' => 'error' , 'title' => 'Failed to add Contact_requests'] ,400);
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
        $contact_requests = Contact_requests::destroy($id);
        return response()->json(['icon' => 'success' , 'title' => 'The Category has been deleted successfully'] , $contact_requests ? 200 : 400);
    }
}
