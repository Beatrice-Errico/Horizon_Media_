<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class ArticleController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
            new Middleware('auth', except: ['index', 'show', 'byCategory', 'byUser','articleSearch'] )
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->get();
        return view('article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('article.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|unique:articles|min:5',
        'subtitle' => 'required|min:5',
        'body' => 'required|min:10',
        'image' => 'required|mimes:jpg,jpeg,png|max:2048',
        'category_id' => 'required',
        // 'user_id'=>'required|exists:categories,id',
    ]);



         $article = Article::create([
         'title' => $request->title,
         'subtitle' => $request->subtitle,
         'body' => $request->body,
         'image' => $request->file('image')->store('images', 'public'),
         'category_id' => $request->category_id,
         'user_id' => Auth::user()->id,
         'slug' => Str::slug( $request->title ),
     ]);


    $tags=explode(',', $request->tags);
    foreach($tags as $i => $tag){
        $tags[$i]=trim($tag);
    }
    foreach($tags as $tag){
        $newTag = Tag::updateOrCreate([
            'name' => strtolower($tag)
        ]);

        $article->tags()->attach($newTag);
    }

    return redirect(route('home'))->with('message', 'Articolo Creato');
       
       
}

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
         $tagIds = $article->tags->pluck('id');

    $relatedArticles = \App\Models\Article::whereHas('tags', function ($query) use ($tagIds) {
        $query->whereIn('tags.id', $tagIds);
    })
            ->where('id', '!=', $article->id)
            ->distinct()
            ->latest()
            ->take(3)
            ->get();

            return view('article.show', compact('article', 'relatedArticles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {$categories = Category::all();
      if(Auth::user()->id == $article->user_id){
            return view('article.edit', compact('article', 'categories'));
        }

        return redirect()->route('home')->with('alert', 'Non sei autorizzato');
    }  
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
      
{
    $request->validate([
        'title' => 'required|min:5|unique:articles,title,' . $article->id,
        'subtitle' => 'required|min:5',
        'body' => 'required|min:10',
        'image' => 'image',
        'category' => 'required',
        'tags' => 'required',

    ]);

    $article->update([
        'title' => $request->title,
        'subtitle' => $request->subtitle,
        'body' => $request->body,
        'category_id' => $request->category,
        'slug'=> Str::slug($request->title),
    ]);

    if ($request->image) {
        Storage::delete($article->image);
        $article->update([
            'image' => $request->file('image')->store('images', 'public')
        ]);
    }

    $tags = explode(',', $request->tags);

    foreach ($tags as $i => $tag) {
        $tags[$i] = trim($tag);
    }

    $newTags = [];

    foreach ($tags as $tag) {
        $newTag = Tag::updateOrCreate([
            'name' => strtolower($tag)
        ]);
        $newTags[] = $newTag->id;
    }

    $article->tags()->sync($newTags);

    return redirect(route('writer.dashboard'))->with('message', 'Articolo modificato con successo');
}
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        foreach($article->tags as $tag){
            $article->tags()->detach($tag);
        }
        $article->delete();
        return redirect()->back()->with('message', 'Articolo eliminato con successo');
    }
    public function byCategory(Category $category)
    {
         $articles = $category->articles()->where('is_accepted', true)->orderBy('created_at', 'desc')->get();
         return view('article.by-category', compact('category','articles'));
    }

    public function byUser(User $user)
    {
        $articles = $user->articles()->where('is_accepted', true)->orderBy('created_at', 'desc')->get();
        return view('article.by-user', compact('user', 'articles'));
    }


    public function articleSearch(Request $request){
        $query = $request->input('query');
        $articles = Article::search($query)->where('is_accepted', true)->orderBy('created_at', 'desc')->get();
        return view('article.search-index', compact('articles', 'query'));
    }
    
   
      

}

