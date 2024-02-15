<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Http\Resources\BookingResource;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        return BookingResource::collection(Booking::all());
    }

    public function store(Request $request)
    {
        $booking = Booking::create($request->validated(
            [
                'Pc_Name' => 'required',
                'Pc_Price' => 'required',
                'StartTime' => 'required',
                'EndTime' => 'required',
                'User_Name' => 'required',
                'duration' => 'nullable',
            ]
        ));
        return redirect()->route('booking');
    }

    public function show(Booking $booking)
    {
        return new BookingResource($booking);
    }

    public function update(BookingRequest $request, Booking $booking)
    {
        $booking->update($request->validated());

        return new BookingResource($booking);
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();

        return response()->json();
    }
}
