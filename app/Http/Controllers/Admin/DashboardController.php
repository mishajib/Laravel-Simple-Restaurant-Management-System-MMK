<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Item;
use App\Models\Reservation;
use App\Models\Slider;

class DashboardController extends Controller
{
    public function __invoke() {
        $data['categoryCount'] = Category::count();
        $data['itemCount'] = Item::count();
        $data['sliderCount'] = Slider::count();
        $data['reservations'] = Reservation::where('status', false)->get();
        $data['contactCount'] = Contact::count();

        return view('admin.dashboard')->with($data);
    }
}
