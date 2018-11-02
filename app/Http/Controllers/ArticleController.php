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
        if($article->active == true) {
            $article->views++;
            $article->save();
            return view('articles.single',compact('article'));
        }
        else {
            abort(404, 'Статията не е открита');
        }

    }


}
