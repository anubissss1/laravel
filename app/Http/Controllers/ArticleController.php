<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->isModerator()){
            $articles = Article::all();
        } else {
            $articles = Article::where('user_id',$user->id)->get();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create',Article::class);
        return view('articles.create');
    }

    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create',Article::class);

        $data = $request->validate(['title'=>'required|max:255','content'=>'required|min:10']);
        $data['user_id'] = Auth::id();
        Article::create($data);
        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $this->authorize('update',$article);
        return view('articles.edit',compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article){
        $data->authorize('update',$article);

        $data = $request->validate(['title'=>'required|max:255','content'=>'required|min:10']);
        $article->update($data);
        return redirect()->route('articles.index');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $this->authorize('delete',$article);
        $article->delete();
        return back();
    }
}
