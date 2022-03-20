<?php


namespace App\Services;

use App\Interfaces\ShowInterface;
use App\Interfaces\StoreInterface;
use Illuminate\Support\Facades\DB;
class ViewsService implements StoreInterface, ShowInterface
{
    private $table = "views";

    public function checkByIP($ip)
    {
        return DB::table($this->table)->where('userIP', $ip)->exists();
    }

    public function store($data)
    {
        if (! $this->checkByIP($data['userIP']) ) {
            DB::table($this->table)->insert($data);
            return true;
        }
        return false;
    }

    public function show($ID)
    {
        return DB::table($this->table)->where('article_id', $ID)->count();
    }
}
