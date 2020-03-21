<?php

namespace App\Http\Controllers\Admin;

use App\Notifications\ReservationConfirmed;
use App\Notifications\ReservationRejected;
use App\Reservation;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Notification;

class ReservationController extends Controller
{
    public function index() {
        $reservations = Reservation::all();
        return view('admin.reservation.index', compact('reservations'));
    }

    public function status($id) {
        $reservation = Reservation::find($id);
        $reservation->status = true;
        $reservation->save();
        Notification::route('mail', $reservation->email)
            ->notify(new ReservationConfirmed());
        return back()->with('successMsg', 'Reservation Request Confirmed Successfully');
    }

    public function inverseStatus($id) {
        $reservation = Reservation::find($id);
        $reservation->status = false;
        $reservation->save();
        Notification::route('mail', $reservation->email)
            ->notify(new ReservationRejected());
        return back()->with('successMsg', 'Reservation Request Rejected Successfully');
    }

    public function destroy($id) {
        Reservation::findOrFail($id)->delete();
        return back()->with('successMsg', 'Reservation Successfully Deleted');
    }
}
