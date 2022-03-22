<?php


namespace App\Services;

use App\Interfaces\AddInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

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

        $key = __CLASS__ . __METHOD__;

        $result = Cache::get($key, false);

        if ( !$result ) {
            $result = DB::table('articles')
                ->select($this->fields)
                ->join('likes', 'articles.id', '=', 'likes.article_id', 'left outer')
                ->join('views', 'views.article_id', '=', 'articles.id', 'right')
                ->groupBy('articles.id')
                ->orderBy('articles.created_at', 'DESC')
                ->limit(6)
                ->get();
            Cache::put($key, $result, 60);
        }
        return $result;
    }



    public function addFields($fieldsArray)
    {
        $this->fields = array_merge($this->fields, $fieldsArray);
    }

    public function getArticlesWithPagination($amountArticles)
    {
        $this->addFields(['likes.likeIs', DB::raw("COUNT(views.article_id) as vc")]);
        $key = __CLASS__ . __METHOD__ . $amountArticles;
        $result = Cache::get($key, false);

        if ( !$result ) {
            $result = DB::table('articles')
                ->select($this->fields)
                ->join('likes', 'articles.id', '=', 'likes.article_id', 'left outer')
                ->join('views', 'views.article_id', '=', 'articles.id', 'right')
                ->groupBy('articles.id')
                ->orderBy('articles.created_at', 'DESC')
                ->paginate($amountArticles);
            Cache::put($key, $result, 60);
        }
        return $result;

    }

    public function getByField($field, $value)
    {
        unset($this->fields[array_search('articles.preview', $this->fields)]);
        $this->addFields([
            'likes.likeIs', 'articles.id', 'articles.text' ,DB::raw("COUNT(views.article_id) as vc")

        ]);
        $key = __CLASS__ . __METHOD__;

        $result = Cache::get($key, false);

        if ( !$result ) {
            $result = DB::table('articles')
                ->select($this->fields)
                ->join('likes', 'articles.id', '=', 'likes.article_id', 'left outer')
                ->join('views', 'views.article_id', '=', 'articles.id', 'right')
                ->where($field, $value)
                ->get();
            Cache::put($key, $result, 60);
        }
        return $result;
    }

}
