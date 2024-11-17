<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class RedirectController extends Controller
{
    public function index()
    {
        // Redirect to /id without trailing slash
        return redirect()->to('/id');
    }
}
