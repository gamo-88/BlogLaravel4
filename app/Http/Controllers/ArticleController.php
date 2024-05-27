<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Commentaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class ArticleController extends Controller
{
   public function showFormArticle(){
    return view("article.create");
   }

   public function storeArticle(Request $request){
    $validator = Validator::make($request->all(), [
        'nom' => 'required|min:5|max:100',
        'desc' => 'required|min:20',
        'image' => [
            'required',
            File::image()
                ->min("1kb")
                ->max('2mb')
        ],
    ]);

    if ($validator->fails()) {
        return redirect()
                    ->route("article.create")
                    ->withErrors($validator)
                    ->withInput();
    }else{
        $file = $request->file('image');
        $name = time().$file->getClientOriginalName();

        $request->file('image')->storeAs(
            'imageArticle',
            $name,
            'public'
        );

        Article::create([
            'nomArticle'=>$request->nom,
            'imageArticle'=>$name,
            'descArticle'=>$request->desc,
            'user_id'=>Auth::user()->id,
        ]);

        return back()->with('session','Article creer avec succes' );
    }
   }

   public function detailArticle(string $id){
    $article=Article::findOrFail($id);
    $commentaires = Commentaire::where('article_id', '=', $id)->orderBy('id', 'desc')->get();
    
    return view("article.detail", compact('article', 'commentaires'));
   }

   public function commentArticle(string $id, Request $request){
    Commentaire::create([
        'descCommentaires'=>$request->comment,
        'user_id'=>Auth::user()->id,
        'article_id'=>$id,
    ]);

    return back();
   }
}
