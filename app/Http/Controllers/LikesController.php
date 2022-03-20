<?php

namespace App\Http\Controllers;

use App\Services\LikesService;
use Illuminate\Http\Request;

class LikesController extends Controller
{
    private $likesService;
    //
    public function __construct(LikesService $likesService)
    {
        $this->likesService = $likesService;
    }

    public function store(Request $request)
    {
        $data = [
            'userIP'        => $request->ip(),
            'article_id'    => $request->post('articleID')
        ];

        return response($this->likesService->store($data));
    }
}
