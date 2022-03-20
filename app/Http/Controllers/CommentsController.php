<?php


namespace App\Http\Controllers;


use App\Services\CommentsService;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    private $commentsService;

    public function __construct(CommentsService $commentsService)
    {
        $this->commentsService = $commentsService;
    }

    public function store(Request $request)
    {
        $valid = $request->validate([
            'subject' => 'required|max:255',
            'body'    => 'required'
        ]);
        if ($valid) {
            $this->commentsService->store($request);
            return response(['success' => 200])->json();
        }


    }

}
