<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Schedule;
use App\Models\Timetable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Timetable::where('user_id', auth()->user()->id)
            ->with('schedules')
            ->get()
            ->flatMap(function ($timetable) {
                return $timetable->schedules
                    ->groupBy('day')
                    ->map(function ($schedules) {
                        return $schedules->sortBy('start_at')->all();
                    });
            });

        return Inertia::render('Schedule/Index')->with([
           'data'=>$data
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        dd('fdf');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'course' => ['required', 'string', 'min:2'],
            'day' => ['required', 'string', 'min:4'],
            'start_at' => ['required', 'date_format:H:i'],
            'end_at' => ['required', 'date_format:H:i','after:start_at'],
        ]);
        
        $user = Auth::user();
        // Vérifie si l'utilisateur a déjà une timetable
        $timetable = Timetable::where('user_id', $user->id)->first();
        
        if (!$timetable) {
            // Si l'utilisateur n'a pas encore de timetable, créez-en une
            $timetable = Timetable::create(['user_id' => $user->id]);
        }
        $data['timetable_id'] = $timetable->id;
        Schedule::create($data);
        return redirect()->route("schedule.index")->with([
            "success"=>"Bravo , Votre matière a été ajouté !"
        ]);;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}