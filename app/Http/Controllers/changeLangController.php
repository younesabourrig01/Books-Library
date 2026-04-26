<?php

namespace App\Http\Controllers;
class changeLangController extends Controller
{
    public function switch($locale)
    {
        if (!in_array($locale, ['en', 'fr'])) {
            abort(400);
        }

        session(['locale' => $locale]);

        return back();
    }
}
