<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;

class FileManagerController extends AppBaseController
{

    /**
     * Display a listing of the FileManager.
     */
    public function index(Request $request)
    {

        return view('file_manager.index');

    }

}
