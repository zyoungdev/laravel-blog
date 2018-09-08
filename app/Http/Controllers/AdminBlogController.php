<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\ArticleRequest;
use App\Article;
use App\Multimed;
use App\Tag;
use Carbon\Carbon;

use Parsedown;

class AdminBlogController extends Controller
{
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
    return view('admin.blog.articles')->with([
      'articles' => Article::orderBy('published_at', 'desc')->get()
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view("admin.blog.articleCreate")->with([
      'date'   => Carbon::createFromFormat('Y-m-d', date('Y-m-d')),
      'tags'   => Tag::pluck('name', 'id'),
      'images' => $this->getImages()
    ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(ArticleRequest $request)
  {
    $request->body = htmlspecialchars($request->body);
    $article       = $this->createArticle($request);

    return redirect('/admin/articles/' . $article->uri . '/edit');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(Article $article)
  {
    if ( $article->is_markdown )
    {
      $markdown      = new Parsedown();
      $article->body = $markdown->text( $article->body );
    }

    return view('blog.article')->with([
      'article'   => $article,
      'thumbnail' => $article->images
                             ->where('image_use_type', 'thumbnail')
                             ->first(),
      'header'    => $article->images
                             ->where('image_use_type', 'header')
                             ->first(),
      'tags'      => Tag::pluck('name', 'id'),
      'activeTag' => ''
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(Article $article)
  {
    $article->body = htmlspecialchars($article->body);

    return view('admin.blog.articleEdit')->with([
      'article' => $article,
      'date'    => $article->published_at->format('Y-m-d'),
      'tags'    => Tag::pluck('name', 'id'),
      'images'  => $this->getImages()
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(ArticleRequest $request, Article $article)
  {
    $validInput = $this->validateUpdate($request);

    $article->update($validInput['article']);

    $this->syncTags($article, $validInput['tags']);

    // Create array of the thumbnail and header ids, sync with article
    $images = [$request->input('thumbnail_image'), $request->input('header_image')];
    $article->images()->sync($images);

    return redirect("/admin/articles/$request->uri/edit");
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Request $request, Article $article)
  {
    $article->delete();

    return redirect('/admin/articles');
  }






  /**
   * Check if Tags exist and 'is_public' exists
   * @param  ArticleRequest $r 
   * @return Request       Validated request variables
   */
  private function validateUpdate(ArticleRequest $r)
  {
    $a = $r->all();
    $t = $this->getTagListIds($r->input('tag_list'));

    if (!isset($a['is_public']))
      $a['is_public'] = 0;

    if (!isset($a['is_markdown']))
      $a['is_markdown'] = 0;

    return [
      'article' => $a,
      'tags' => $t
    ];
  }

  /**
   * Create a new Article
   * Sync the Tags with the Article
   * 
   * @param  ArticleRequest $r
   */
  private function createArticle(ArticleRequest $r)
  {
    $article = Article::create($r->all());

    // Get array of tag ids, sync with article
    $t = $this->getTagListIds($r->input('tag_list'));
    $this->syncTags($article, $t);

    // Create array of the thumbnail and header ids, sync with article
    $images = [$r->input('thumbnail_image'), $r->input('header_image')];
    $article->images()->sync($images);

    return $article;
  }

  /**
   * Sync tags in database
   * @param  Article $a 
   * @param  array   $t 
   */
  private function syncTags(Article $a, array $t)
  {
    $a->tags()->sync($t);
  }

  /**
   * Check if given a Tag not in database
   * Persist new Tag in database
   * 
   * @param  array $tagNums mixed array
   * @return array      array of IDs
   */
  private function getTagListIds(array $tagNums)
  {
    foreach ($tagNums as $key => $t)
    {
      if (!is_numeric($t))
      {
        unset($tagNums[$key]);

        $tag = Tag::create([
          'name' => $t
        ]);
        $tagNums[] = strval($tag->id);
      }
    }
    return $tagNums;
  }

  /**
   * Get list of all images from DB
   * @return array key->value array of images by type
   */
  private function getImages()
  {
    return [
      'thumbnail' => Multimed::where('image_use_type', 'thumbnail')->pluck('title', 'id'),
      'header'    => Multimed::where('image_use_type', 'header')->pluck('title', 'id'),
      'general'   => Multimed::where('image_use_type', 'general')->pluck('title', 'id')
    ];
  }

  /**
   * Get the article thumbnail and header images
   * @param  Article $a 
   * @return Article   return Article with images attached
   */
  private function getArticleImages(Article $a)
  {
    $images = $a->images;

    if ($images[0]->image_use_type == 'header')
    {
      $a['header']    = $images[0];
      $a['thumbnail'] = $images[1];
    }
    else
    {
      $a['header']    = $images[1];
      $a['thumbnail'] = $images[0];
    }

    return $a;
  }
}
