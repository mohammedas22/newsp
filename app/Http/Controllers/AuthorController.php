<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::with('user')->orderBy('id', 'desc')->Paginate(5);
        return response()->view('cms.authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return response()->view('cms.authors.create', compact('countries'));
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
            // 'email' => 'required|string|min:3|max:40',
            // 'password' => 'required|string|min:3|max:20',
        ]);
        if (!$validator->fails()) {
            $authors = new Author();
            $authors->email = $request->get('email');
            // $authors->password = $request->get('password');
            // $authors->add_files = $request->get('add_files');
            if (request()->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . 'image.' . $image->getClientOriginalExtension();
                $image->move('storage/images/author', $imageName);
                $authors->image = $imageName;
                }
            $isSaved = $authors->save();
            if ($isSaved) {
            $users = new User();
            $users->first_name = $request->get('first_name');
            $users->last_name = $request->get('last_name');
            $users->gender = $request->get('gender');
            $users->status = $request->get('status');
            $users->birth_date = $request->get('birth_date');
            $users->Country_id = $request->get('Country_id');
            $users->actor()->associate($authors);
            $isSaved = $users->save();
                return response()->json(['icon' => 'success', 'title' => 'The Author has been added successfully'], 200);
            } else {
                return response()->json(['icon' => 'error', 'title' => 'Failed to add Author'], 400);
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
        $authors = Author::orderBy('id', 'desc')->Paginate(5);
        return response()->view('cms.authors.show', compact('authors'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $authors = Author::findOrFail($id);
        $countries = Country::all();
        return response()->view('cms.authors.edit' , compact('authors','countries'));
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
            // 'email' => 'required|string|min:3|max:40',
            // 'password' => 'required|string|min:3|max:20',
        ]);
        if (!$validator->fails()) {
            $authors = Author::findOrFail($id);
            $authors->email = $request->get('email');


            // $authors->password = $request->get('password');
            // $authors->add_files = $request->get('add_files');
            $isSaved = $authors->save();
            if ($isSaved) {
                $users = $authors->user;
                $users->first_name = $request->get('first_name');
                $users->last_name = $request->get('last_name');
                $users->gender = $request->get('gender');
                $users->status = $request->get('status');
                $users->birth_date = $request->get('birth_date');
                $users->Country_id = $request->get('Country_id');

                if (request()->hasFile('image')) {
                    $image = $request->file('image');
                    $imageName = time() . 'image.' . $image->getClientOriginalExtension();
                    $image->move('storage/images/author', $imageName);
                    $authors->image = $imageName;
                    }

                $users->actor()->associate($authors);

                $isSaved = $users->save();
                return ['redirect'=>route('authors.index')];

                // if($isSaved){
                    return response()->json(['icon' => 'success', 'title' => 'The Author has been added successfully'], 200);
                // }
                    } else {
                        return response()->json(['icon' => 'error', 'title' => 'Failed to add Author'], 400);
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
        $authors = Author::destroy($id);
        return response()->json(['icon' => 'success' , 'title' => 'The city has been deleted successfully'] , $authors ? 200 : 400);
    }
}
