<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class CategoryController extends Controller
{
    public function single($id) {
        $category = Category::findOrFail($id)->with('articles')->get()->first();
        $category = Category::with('articles')->find($id);

        return view('articles.category',compact('category','articles'));

    }
}
