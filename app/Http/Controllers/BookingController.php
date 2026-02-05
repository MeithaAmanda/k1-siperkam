<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    
    public function index()
    {
        $bookings = Booking::all();
        return view('bookings.index', compact('bookings'));
    }

    
    public function create()
    {
        return view('bookings.create');
    }

    
    public function store(Request $request)
    {
        
    }

    
    public function edit(Booking $booking)
    {
        return view('bookings.edit', compact('booking'));
    }

    
    public function update(Request $request, Booking $booking)
    {
        
    }

    
    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->route('bookings.index')->with('success', 'Data berhasil dihapus');
    }
}