<?php


namespace App\Http\Controllers;


use App\Services\ArticleService;

class MainController extends Controller
{

    private $articleService;

    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }


    public function index()
    {
        return view('main.index', [
            'articles' => $this->articleService->getArticles()
        ]);
    }
}
