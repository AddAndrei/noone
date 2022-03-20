<?php


namespace App\Services;


use App\Interfaces\StoreInterface;
use App\Jobs\UserCommentJob;

class CommentsService implements StoreInterface
{


    public function store($request)
    {

        sleep(600);
        dispatch(new UserCommentJob($request->all()));

    }
}
