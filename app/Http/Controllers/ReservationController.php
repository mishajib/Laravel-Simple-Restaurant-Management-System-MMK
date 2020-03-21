<?php

namespace App\Http\Controllers;

use App\Reservation;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class ReservationController extends Controller
{
    public function reserve(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'dateandtime' => 'required',
        ]);

        $reservation = new Reservation();
        $reservation->name = $request->name;
        $reservation->phone = $request->phone;
        $reservation->email = $request->email;
        $reservation->date_and_time = $request->dateandtime;
        $reservation->message = $request->message;
        $reservation->status = false;
        $reservation->save();
        toast('Reservation request sent successfully.<br> We will confirm to you shortly','success','top-right');
        return back();
    }

}
