<?php


namespace App\Services;


use App\Interfaces\StoreInterface;
use App\Jobs\UpdateLikeJob;
use Illuminate\Support\Facades\DB;
use App\Jobs\LikesJob;

class LikesService implements StoreInterface
{
    private $table = "likes";

    public function store($data)
    {
        if ( !$this->checkByIP($data['userIP'], $data['article_id']) ) {

            dispatch(new LikesJob($data));

            return [
                'like'  => 'addlike'
            ];

        }else{

            dispatch(new UpdateLikeJob($data));

            return [
                'like'  => 'update'
            ];

        }
    }

    public function likesCount($articleID)
    {
        return DB::table($this->table)->where([['article_id', $articleID], ['likeIs', true]])->count();
    }

    private function checkByIP($ip, $artID)
    {
        return DB::table($this->table)->where([['userIP', $ip], ['article_id', $artID]])->exists();
    }

}
