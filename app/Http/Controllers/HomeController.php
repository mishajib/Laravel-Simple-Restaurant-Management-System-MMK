<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use App\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        $categories = Category::all();
        $items = Item::all();
        return view('welcome', compact('sliders', 'categories', 'items'));
    }
}
