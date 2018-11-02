<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class CategoryController extends Controller
{
    public function single($id) {
        $category = Category::findOrFail($id)->with('articles')->get()->first();
       // $articles = $category->articles;
        $articles = Category::find($id)->articles;

        return view('articles.category',compact('category','articles'));

    }
}
