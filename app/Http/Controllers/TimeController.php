<?php

namespace App\Http\Controllers;

use App\Models\Time;
use App\Models\Designer;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimeController extends Controller
{
    public function create()
    {
        $checkDesigner = Designer::where('user_id', Auth::id())->count();
        $time_check = Time::where('designer_id', session()->get('designer_id'))->count();
        $numberBookings = Booking::where('designer_id',session()->get('designer_id'))->count();

        // session()->put('designer_id', $checkDesigner->id);
        // return $checkDesigner->id;
        // return session()->get('designer_id');
        return view('admin.add_time', compact('checkDesigner', 'time_check','numberBookings'));
    }
    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'date' => 'required|date',
        ]);

        $time = Time::create([
            'designer_id' => session()->get('designer_id'),
            'time_in' => $request->start_time,
            'time_out' => $request->end_time,
            'date' => $request->date,
        ]);

        return redirect()->route('show_time')->with('success', 'Timing added successfully.');
    }

    public function show()
    {
        $time_check = Time::where('designer_id', session()->get('designer_id'))->count();
        $checkDesigner = Designer::where('user_id', Auth::id())->count();
        $time = Time::where('designer_id', session()->get('designer_id'))->orderBy('id','DESC')->get();
        $numberBookings = Booking::where('designer_id',session()->get('designer_id'))->count();
        return view('admin.show_time', compact('time', 'checkDesigner', 'time_check','numberBookings'));
    }

    public function edit($id)
    {
        $numberBookings = Booking::where('designer_id',session()->get('designer_id'))->count();
        $time_check = Time::where('designer_id', '=', session()->get('designer_id'));
        $checkDesigner = Designer::where('user_id', Auth::id())->first();
        $time = Time::find($id);
        return view('admin.edit_time', compact('time', 'checkDesigner', 'time_check','numberBookings'));
    }
    public function update(Request $request, $id)
    {
        $time = Time::find($id);

        $time->update([
            'time_in' => $request->time_in,
            'time_out' => $request->time_out,
            'date' => $request->date,
        ]);
        return redirect()->route('show_time')->with('success', 'Time Updated Successfully');
    }

    public function destroy(string $id)
    {
        Time::find($id)->delete();
        // Time::destroy(array('id', $id));
        return redirect('show_time')->with('success', 'Time Deleted Successfully');
    }
}
