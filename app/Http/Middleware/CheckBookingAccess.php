<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Confirmbooking;

class CheckBookingAccess
{
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();

        $targetUserId = $request->route('id');

        if ($user->role == 'user') {
            $booking = Booking::where('user_id', $user->id)
                ->where('status', 1)
                ->whereHas('designer', function ($query) use ($targetUserId) {
                    $query->where('user_id', $targetUserId);
                })
                ->first();

            $confirmbooking = Confirmbooking::where('user_id', $user->id)
                ->whereHas('designer', function ($query) use ($targetUserId) {
                    $query->where('user_id', $targetUserId);
                })
                ->first();

            if (!$booking && !$confirmbooking) {
                return abort(403, 'Unauthorized access to this designer.');
            }
        } elseif ($user->role == 'designer') {
            $booking = Booking::where('designer_id', session()->get('designer_id'))
                ->where('status', 1)
                ->where('user_id', $targetUserId)
                ->first();

            $confirmbooking = Confirmbooking::where('designer_id', session()->get('designer_id'))
                ->where('user_id', $targetUserId)
                ->first();

            if (!$booking && !$confirmbooking) {
                return abort(403, 'Unauthorized access to this user.');
            }
        } else {
            return abort(403, 'Unauthorized access.');
        }

        return $next($request);
    }
}
