<?php


namespace App\Http\Controllers;


use App\Services\ArticleService;
use App\Services\TagService;
use Illuminate\Support\Facades\DB;
class ArticlesController extends Controller
{
    private $articleService;
    private $tagService;
    public function __construct(ArticleService $articleService, TagService $tagService)
    {
        $this->articleService = $articleService;
        $this->tagService = $tagService;
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

        return view('articles.article', [
            'article' => $article,
            'tags'    => $tags
        ]);
    }

}
