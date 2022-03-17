<?php


namespace App\Http\Controllers;


class MainController extends Controller
{

    public function __construct()
    {

    }


    public function index()
    {
        return view('main.index');
    }
}
