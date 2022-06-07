<?php

namespace App\Http\Controllers;

use App\Models\Viewer;
use Illuminate\Http\Request;

class ViewerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $viewers = Viewer::orderBy('id', 'desc')->Paginate(5);
        return response()->view('cms.viewers.index', compact('viewers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('cms.viewers.create');
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
            // 'password' => 'required|string|min:3|max:20',
        ]);
        if (!$validator->fails()) {
            $viewers = new Viewer();
            $viewers->email = $request->get('email');
            $viewers->password = $request->get('password');
            $viewers->bio = $request->get('bio');
            $isSaved = $viewers->save();
            if ($isSaved) {
                return response()->json(['icon' => 'success', 'title' => 'The viewer has been added successfully'], 200);
            } else {
                return response()->json(['icon' => 'error', 'title' => 'Failed to add viewer'], 400);
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
        $viewers = Viewer::findOrFail($id);
        return response()->view('cms.viewers.edit' , compact('viewers'));
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
        $validator = validator($request->all(), [
            'email' => 'required|string|min:3|max:40',
            // 'password' => 'required|string|min:3|max:20',
        ]);
        if (!$validator->fails()) {
            $viewers = Viewer::findOrFail($id);
            $viewers->email = $request->get('email');
            $viewers->password = $request->get('password');
            $viewers->bio = $request->get('bio');
            $isSaved = $viewers->save();
            return ['redirect'=>route('viewers.index')];
            if ($isSaved) {
                return response()->json(['icon' => 'success', 'title' => 'The viewer has been added successfully'], 200);
            } else {
                return response()->json(['icon' => 'error', 'title' => 'Failed to add viewer'], 400);
            }
        } else {
            return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
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
