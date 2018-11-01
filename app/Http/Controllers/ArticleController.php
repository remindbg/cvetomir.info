<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Category;
class ArticleController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function single($id,$slug)
    {
        $article = Article::findOrFail($id);
        $article->views++;
        $article->save();
        return view('articles.single',compact('article'));
    }


}
