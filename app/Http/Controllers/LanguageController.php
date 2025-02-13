<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    //
    public function swap($locale)
    {
        // Qo‘llab-quvvatlanadigan tillar ro‘yxati
        $availLocale = ['en', 'ru', 'uz'];

        // Foydalanuvchi tanlagan til qo‘llab-quvvatlansa, sessiyaga yozamiz
        if (in_array($locale, $availLocale)) {
            session()->put('locale', $locale);
            app()->setLocale($locale);
        }
//        dd(session('locale'));
        return redirect()->back();
    }

}
