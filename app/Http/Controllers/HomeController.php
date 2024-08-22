<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Item;
use App\Models\Slider;

class HomeController extends Controller
{
    public function __invoke()
    {
        $sliders = Slider::all();
        $categories = Category::all();
        $items = Item::all();
        return view('home', compact('sliders', 'categories', 'items'));
    }
}
