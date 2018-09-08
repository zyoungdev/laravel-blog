<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Article;
use App\Tag;
use App\Multimed;

use Parsedown;

class PublicController extends Controller
{
  protected $paginateLimit = 5;

  public function __construct() {
    // $this->middleware('maintenance');
  }

  public function index()
  {
    return view('home.index')->with([
      'tags'   => Tag::all()->pluck('name'),
      'images' => Multimed::where('image_use_type', 'thumbnail')->get()
    ]);
  }

  public function showBlog()
  {
    return view('blog.articleList')->with([
      'articles'  => Article::latest('published_at')
                            ->published()
                            ->isPublic()
                            ->simplePaginate($this->paginateLimit),
      'tags'      => Tag::pluck('name'),
      'activeTag' => "All"
    ]);
  }

  public function showTag(Tag $tag)
  {
    return view('blog.articleList')->with([
      'tags'      => Tag::pluck('name'),
      'articles'  => $tag->articles()
                         ->orderBy('published_at', 'desc')
                         ->simplePaginate($this->paginateLimit),
      'activeTag' => $tag->name
    ]);
  }

  public function showImages()
  {
    return view('home.images')->with([
      'images' => Multimed::all()
    ]);
  }

  public function showArticle(Article $article)
  {
    if ( $article->is_markdown )
    {
      $markdown      = new Parsedown();
      $article->body = $markdown->text( $article->body );
    }

    return view('blog.article')->with([
      'tags'      => Tag::all()->pluck('name'),
      'article'   => $article,
      'activeTag' => '',
      'header'    => $article->images
                             ->where('image_use_type', 'header')
                             ->first(),
      'thumbnail' => $article->images
                             ->where('image_use_type', 'thumbnail')
                             ->first()
    ]);
  }
}
