<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Home page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        $currentUser = Auth::id();

        return view('welcome', [
            'currentUser' => $currentUser
        ]);
    }
}
