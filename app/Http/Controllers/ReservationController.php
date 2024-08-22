<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;


class ReservationController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'date_and_time' => 'required',
        ]);

        Reservation::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'date' => $request->date_and_time,
            'message' => $request->message,
            'status' => false,
        ]);

        toast('Reservation request sent successfully.<br> We will confirm to you shortly', 'success', 'top-right');

        return back();
    }

}
