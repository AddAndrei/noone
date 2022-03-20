<?php


namespace App\Services;


use App\Interfaces\StoreInterface;
use Illuminate\Support\Facades\DB;
class LikesService implements StoreInterface
{
    private $table = "likes";

    public function store($data)
    {
        if ( !$this->checkByIP($data['userIP']) ) {
            DB::table($this->table)->insert([
                'userIP'    => $data['userIP'],
                'article_id'=> $data['article_id'],
                'likeIs'    => true
            ]);
            return true;
        }else{
            $likeIs = (bool)DB::table($this->table)->where('userIP', $data['userIP'])->get()->toArray()[0]->likeIs;
            DB::table($this->table)
                ->where('userIP', $data['userIP'])
                ->update([
                'likeIs' => !$likeIs
            ]);
            return (int)!$likeIs;
        }
    }

    private function checkByIP($ip)
    {
        return DB::table($this->table)->where('userIP', $ip)->exists();
    }

}
