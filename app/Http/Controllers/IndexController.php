<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Slider;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function home()
    {
        $category = Category::orderBy('id', 'DESC')->get();
        $slider = Slider::orderBy('id', 'DESC')->get();

        return view('pages.home', compact('category', 'slider'));
    }

    public function dichvu()
    {
        $slider = Slider::orderBy('id', 'DESC')->get();

        return view('pages.services',  compact('slider'));
    }

    public function dichvucon($slug)
    {
        $slider = Slider::orderBy('id', 'DESC')->get();

        return view('pages.sub_services', compact($slug, 'slider'));
    }

    public function danhmuc_game($slug)
    {
        $slider = Slider::orderBy('id', 'DESC')->get();

        return view('pages.category',  compact('slider'));
    }

    public function danhmuccon($slug)
    {
        $slider = Slider::orderBy('id', 'DESC')->get();

        return view('pages.sub_category',  compact('slider'));
    }
}
