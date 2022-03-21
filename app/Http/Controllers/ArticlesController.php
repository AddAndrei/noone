<?php


namespace App\Http\Controllers;


use App\Services\ArticleService;
use App\Services\LikesService;
use App\Services\TagService;
use Illuminate\Support\Facades\DB;
class ArticlesController extends Controller
{
    private $articleService;
    private $tagService;
    private $likeService;
    public function __construct(ArticleService $articleService, TagService $tagService, LikesService $likesService)
    {
        $this->articleService = $articleService;
        $this->tagService = $tagService;
        $this->likeService = $likesService;
    }

    public function index()
    {
        $tags = DB::table('article_tags')->get();

        return view('articles.index', [
            'tags'      => $tags,
            'articles'  => $this->articleService->getArticlesWithPagination(6)
        ]);
    }


    public function article($slug)
    {
        $article = $this->articleService->getByField('articles.slug', $slug);
        $tags = $this->tagService->getTagsForArticle($article->toArray()[0]->id);
        $likes = $this->likeService->likesCount($article->toArray()[0]->id);
        return view('articles.article', [
            'article' => $article,
            'tags'    => $tags,
            'likes'   => $likes
        ]);
    }

}
