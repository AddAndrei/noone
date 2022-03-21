<?php


namespace App\Services;

use App\Interfaces\ShowInterface;
use App\Interfaces\StoreInterface;
use App\Jobs\ViewsJob;
use Illuminate\Support\Facades\DB;

class ViewsService implements StoreInterface, ShowInterface
{
    private $table = "views";

    public function checkByIP($ip, $artID)
    {
        return DB::table($this->table)->where([['userIP', $ip], ['article_id', $artID]])->exists();
    }


    public function store($data)
    {
        if (! $this->checkByIP($data['userIP'], $data['article_id']) ) {
            dispatch(new ViewsJob($data));
            return [
                'views' => $this->show($data['article_id']) + 1,// пока там очередь выполнится ....
                'success' => 200
            ];
        }
        return ['error'];
    }

    public function show($ID)
    {
        return DB::table($this->table)->where('article_id', $ID)->count();
    }
}
