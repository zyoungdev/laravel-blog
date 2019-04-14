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
    $articles = Article::latest('published_at')
                       ->published()
                       ->isPublic()
                       ->simplePaginate($this->paginateLimit);

    $articles = $this->articleExcerpt( $articles );

    return view('blog.articleList')->with([
      'articles'  => $articles,
      'tags'      => Tag::pluck('name'),
      'activeTag' => "All"
    ]);
  }

  public function showTag(Tag $tag)
  {
    $articles = $tag->articles()
                    ->orderBy('published_at', 'desc')
                    ->simplePaginate($this->paginateLimit);

    $articles = $this->articleExcerpt( $articles );

    return view('blog.articleList')->with([
      'articles'  => $articles,
      'tags'      => Tag::pluck('name'),
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

  private function articleExcerpt( $articles )
  {
    $excerpt_len = 300;

    foreach ( $articles as $article )
    {
      if ( $article->is_markdown )
      {
        $markdown      = new Parsedown();
        $article->body = html_entity_decode( strip_tags( $markdown->text( str_limit( $article->body, $excerpt_len ) ) ) );
      }
      else
      {
        $article->body = strip_tags( str_limit( $article->body, $excerpt_len ) );
      }
    }

    return $articles;
  }

}
