<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KultumController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

    }

    public function add(Request $request)
    {
        # code...
    }

    public function store(Request $request)
    {
        # code...
    }

    public function update()
    {
        # code...
    }

    public function updateStore(Request $request)
    {
        # code...
    }

    public function delete(Request $request)
    {
        # code...
    }
}
