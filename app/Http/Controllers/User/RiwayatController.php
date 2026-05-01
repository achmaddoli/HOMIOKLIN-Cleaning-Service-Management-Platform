<?php

namespace App\Http\Controllers\User;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RiwayatController extends Controller
{
    public function index()
    {
        $bookings = Booking::where('customer_id', Auth::id())->get();
        return view('user.riwayat', compact('bookings'));
    }
}
