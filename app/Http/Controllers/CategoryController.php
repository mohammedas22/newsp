<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->Paginate(5);
        return response()->view('cms.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('cms.categories.create');
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
            'name' => 'required|string|min:3|max:40',
            'description' => 'required|string',
        ]);
        if (!$validator->fails()) {
            $categories = new Category();
            $categories->name = $request->get('name');
            $categories->description = $request->get('description');
            $categories->status = $request->get('status');
            $isSaved = $categories->save();
            if ($isSaved) {
                return response()->json(['icon' => 'success', 'title' => 'The Category has been added successfully'], 200);
            } else {
                return response()->json(['icon' => 'error', 'title' => 'Failed to add Category'], 400);
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
        $categories = Category::findOrFail($id);
        return response()->view('cms.categories.edit' , compact('categories'));
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
            'name' => 'required|string|min:3|max:40',
            'description' => 'required|string',
        ]);
        if (!$validator->fails()) {
            $categories = Category::findOrFail($id);
            $categories->name = $request->get('name');
            $categories->description = $request->get('description');
            $categories->status = $request->get('status');
            $isSaved = $categories->save();
            return['redirect' =>route('categories.index')];
            if ($isSaved) {
                return response()->json(['icon' => 'success', 'title' => 'The Category has been added successfully'], 200);
            } else {
                return response()->json(['icon' => 'error', 'title' => 'Failed to add Category'], 400);
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
        $categories = Category::destroy($id);
        return response()->json(['icon' => 'success' , 'title' => 'The Category has been deleted successfully'] , $categories ? 200 : 400);
    }
}
