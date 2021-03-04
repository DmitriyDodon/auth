<?php


namespace App\Http\Controllers;


use Illuminate\Http\RedirectResponse;

class PageController
{
    public function loginMethod()
    {
        return new RedirectResponse('/login');
    }

}
