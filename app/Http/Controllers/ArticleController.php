<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Article;
class ArticleController extends Controller
{
    public function articles ()
    {
      //  $articles = Article::all('name');
     //  $articles = Article::where('name' , 'data science')->get();
       $articles = Article::where('user_id' , auth()->user()->id)->paginate(10);
        return response()->json(['status' => 'success', 'data' => $articles]);
     
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required | max:25',
            'description' => 'required',
        ]);
        
        $article = new Article();

        $article->name = $request->name;
        $article->description = $request->description;
        $article->user_id = auth()->user()->id;
        
        $article->save();

      return response()->json(['status' => 'success', 'data' => $article]);
      
    }

    public function details($id)
    {
      //  $article = Article::where('id' , $id)->first();
      // $article = Article::where('id' , $id)->get(); // like find
      //  $article = Article::find($id);
       $article = Article::where('user_id' , auth()->user()->id)->findOrFail($id);
        return response()->json(['status' => 'success', 'data' => $article]);
      
    }

    public function delete($id)
    {
        $article= Article::where('user_id' , auth()->user()->id)->where('id', $id)->delete();

        return response()->json(['status' => 'article deleted succesufuly', 'data' => $article]);
    }

    public function update(Request $request, $id)
    {
        
        $article = Article::findOrFail($id);
        $article->name = $request->name;
        $article->description = $request->description;
        $article->save();

        return response()->json(['status' => 'success', 'data' => $article]);
        
    }


}
