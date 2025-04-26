<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Auth::user()->bookings()->with('hotel')->get();
        return view('bookings.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $hotel = Hotel::findOrFail($request->hotel_id);
        return view('bookings.create', compact('hotel'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'hotel_id' => 'required|exists:hotels,id',
            'check_in_date' => 'required|date_format:Y-m-d|after_or_equal:today',
            'check_out_date' => 'required|date_format:Y-m-d|after:check_in_date',
            'guests' => 'required|integer|min:1',
            'special_requests' => 'nullable|string',
        ]);

        try {
            $booking = new Booking([
                'hotel_id' => $validated['hotel_id'],
                'check_in_date' => $validated['check_in_date'],
                'check_out_date' => $validated['check_out_date'],
                'guests' => $validated['guests'],
                'special_requests' => $validated['special_requests'] ?? null,
            ]);
            
            $booking->user_id = Auth::id();
            $booking->status = 'pending';
            $booking->save();

            return redirect()->route('bookings.show', $booking->id)->with('success', '予約が完了しました。');
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => '予約の保存中にエラーが発生しました。' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $booking = Booking::with('hotel')->findOrFail($id);
        
        // Check if the booking belongs to the authenticated user
        if ($booking->user_id !== Auth::id()) {
            abort(403, '権限がありません。');
        }
        
        return view('bookings.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $booking = Booking::findOrFail($id);
        
        // Check if the booking belongs to the authenticated user
        if ($booking->user_id !== Auth::id()) {
            abort(403, '権限がありません。');
        }
        
        $hotel = $booking->hotel;
        return view('bookings.edit', compact('booking', 'hotel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $booking = Booking::findOrFail($id);
        
        // Check if the booking belongs to the authenticated user
        if ($booking->user_id !== Auth::id()) {
            abort(403, '権限がありません。');
        }
        
        $validated = $request->validate([
            'check_in_date' => 'required|date_format:Y-m-d|after_or_equal:today',
            'check_out_date' => 'required|date_format:Y-m-d|after:check_in_date',
            'guests' => 'required|integer|min:1',
            'special_requests' => 'nullable|string',
        ]);
        
        try {
            $booking->update([
                'check_in_date' => $validated['check_in_date'],
                'check_out_date' => $validated['check_out_date'],
                'guests' => $validated['guests'],
                'special_requests' => $validated['special_requests'] ?? null,
            ]);
            
            return redirect()->route('bookings.show', $booking->id)->with('success', '予約が更新されました。');
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => '予約の更新中にエラーが発生しました。' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $booking = Booking::findOrFail($id);
        
        // Check if the booking belongs to the authenticated user
        if ($booking->user_id !== Auth::id()) {
            abort(403, '権限がありません。');
        }
        
        $booking->status = 'cancelled';
        $booking->save();
        
        return redirect()->route('bookings.index')->with('success', '予約がキャンセルされました。');
    }
}
