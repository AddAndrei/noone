<?php

namespace App\Http\Controllers;

use App\Services\ViewsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ViewsController extends Controller
{
    private $viewsService;

    public function __construct(ViewsService $viewsService)
    {
        $this->viewsService = $viewsService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = [
            'userIP'  => $request->ip(),
            'article_id' => (int)$request->post('articleID')
        ];
        $response = [];

        if ($this->viewsService->store($data)) {
            $response = [
                'views'     => $this->viewsService->show((int)$request->post('articleID')),
                'success'   => 'ok'
            ];
            return response($response, 200);
        }
        return response('', 404);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
