<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\News;
use Illuminate\Support\Facades\Schema;

class HomeController extends Controller
{
    public function index()
    {
        $galleries = Schema::hasTable('galleries')
            ? Gallery::latest()->take(6)->get()
            : collect();

        $news = Schema::hasTable('news')
            ? News::latest()->take(5)->get()
            : collect();

        return view('welcome', [
            'galleries' => $galleries,
            'featuredNews' => $news->first(),
            'news' => $news->skip(1),
        ]);
    }
}
