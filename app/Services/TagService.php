<?php


namespace App\Services;
use Illuminate\Support\Facades\DB;

class TagService
{
    public function getTagsForArticle($articleId)
    {
        return DB::table('articles_tags')
            ->select(['article_tags.title'])
            ->join('article_tags', 'articles_tags.tag_id', '=', 'article_tags.id', 'right')
            ->where('articles_tags.article_id', $articleId)
            ->get();
    }
}
