<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('id', 'desc')->Paginate(5);
        return response()->view('cms.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();
        $categories = Category::all();
        return response()->view('cms.articles.create',compact('authors','categories'));
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
            'title' => 'required|string|min:3|max:40',
            'short_description' => 'required|string',
        ]);
        if (!$validator->fails()) {
            $articles = new Article();
            $articles->title = $request->get('title');
            $articles->short_description = $request->get('short_description');
            $articles->full_description = $request->get('full_description');
            $articles->images = $request->get('images');
            $articles->seen_count = $request->get('seen_count');
            $articles->add_files = $request->get('add_files');
            $isSaved = $articles->save();
            if ($isSaved) {
                return response()->json(['icon' => 'success', 'title' => 'The Article has been added successfully'], 200);
            } else {
                return response()->json(['icon' => 'error', 'title' => 'Failed to add Article'], 400);
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
        $articles = Article::findOrFail($id);
        return response()->view('cms.articles.edit' , compact('articles'));
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
            'title' => 'required|string|min:3|max:40',
            'short_description' => 'required|string',
        ]);
        if (!$validator->fails()) {
            $articles = Article::findOrFail($id);
            $articles->title = $request->get('title');
            $articles->short_description = $request->get('short_description');
            $articles->full_description = $request->get('full_description');
            $articles->images = $request->get('images');
            $articles->seen_count = $request->get('seen_count');
            $articles->add_files = $request->get('add_files');
            $isSaved = $articles->save();
            if ($isSaved) {
                return response()->json(['icon' => 'success', 'title' => 'The Article has been added successfully'], 200);
            } else {
                return response()->json(['icon' => 'error', 'title' => 'Failed to add Article'], 400);
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
        $articles = Article::destroy($id);
        return response()->json(['icon' => 'success' , 'title' => 'The city has been deleted successfully'] , $articles ? 200 : 400);
    }
}
