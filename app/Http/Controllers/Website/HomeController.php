<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $sliders =Slider::all();
        $articles =Article::all();
        $categories =Category::all();
        $comments =Comment::all();
        return view('frond.index', compact('sliders' , 'articles' , 'categories' , 'comments'));
    }

    public function all($id){
        $articles = Article::where('category_id', $id)->orderBy('id' ,'desc')->Paginate(5);
        return response()->view('news.all-news' , compact('articles'));

    }
    public function showDet($id){
        $articles = Article::findOrFail($id);  
        return view('frond.newsdetailes' , compact('id' ,'articles'));
        
    }
}
