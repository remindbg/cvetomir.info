<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use App\Category;
use Illuminate\Support\Facades\Storage;
class ArticleController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::with('category')->OrderBy('created_at','desc')->get();
        return View('admin.articles.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.articles.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'title' => 'required',
            'slug' => 'required',
            'body' => 'required',
            'category' => 'required',
            'image.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ));

        $article = new Article();
        $article->title = $request->title;
        $article->slug = $request->slug;
        $article->body = $request->body;
        $article->category_id = $request->category;
        if($request->image) {
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images/articles'), $imageName);
            $article->image = $imageName;
        }
        else {
            $article->image = null;
        }

        $article->tags = $request['tags'];
        if($request->has('active')) {
            $article->active = true;

        } else {
            $article->active = false;
        }
        $article->save();
        $category_id = Category::find($request->category);
        $article->category()->attach($category_id);
        return redirect()->route('articles.index')->with('message', 'Успешно Създадена Публикация');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::with('category')->get()->find($id);
        $categories = Category::all();
        return view('admin.articles.edit',compact('article','categories'));
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
        $this->validate($request, array(
            'title' => 'required',
            'slug' => 'required',
            'body' => 'required',
            'category' => 'required',
            'image.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ));
        $article = Article::find($id);
        $article->title = $request->title;
        $article->slug = $request->slug;
        $article->body = $request->body;
        $article->category_id = $request->category;

        $article->tags = $request['tags'];
        if($request->has('active')) {
            $article->active = true;
        } else {
            $article->active = false;
        }
        $article->save();
        return redirect()->route('articles.index')->with('message', 'Успешно Редактирана Публикация');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
        return redirect()->route('articles.index')->with('message', 'Успешно Изтриване');

    }

    public function uploadImage()
    {
       // dd(request()->file('file'));
        $imgpath = request()->file('file')->store('uploads',  'public');
        $realfile = request()->file('file');
        // todo fix the paths
        request()->file('file')->move(public_path('uploads'), $imgpath);



        return json_encode(['location' => $imgpath]);
    }
}
