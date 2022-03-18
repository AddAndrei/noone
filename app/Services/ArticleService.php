<?php


namespace App\Services;

use App\Interfaces\AddInterface;
use Illuminate\Support\Facades\DB;

class ArticleService implements AddInterface
{
    private $fields = [
        'articles.preview',
        'articles.title',
        'articles.anonce',
        'articles.slug',
    ];


    public function getArticles()
    {
        $this->addFields(['likes.likeIs', DB::raw("COUNT(views.article_id) as vc")]);

        return DB::table('articles')
            ->select($this->fields)
            ->join('likes', 'articles.id', '=', 'likes.article_id', 'left outer')
            ->join('views', 'views.article_id', '=', 'articles.id', 'right')
            ->groupBy('articles.id')
            ->orderBy('articles.created_at', 'DESC')
            ->limit(6)
            ->get();
    }

    public function addFields($fieldsArray)
    {
        $this->fields = array_merge($this->fields, $fieldsArray);
    }
}
