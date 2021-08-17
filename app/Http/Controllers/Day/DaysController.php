<?php

namespace App\Http\Controllers\Day;

use App\Http\Controllers\Controller;
use App\Models\Day;
use App\Models\MyGoal;
use Illuminate\Http\Request;

class DaysController extends Controller
{
    public function index()
    {
        return view('days.index', [
            'days' => Day::query()->orderBy('date', 'desc')->get()
        ]);
    }

    public function show(Day $day)
    {
        return view('days.show', [
            'day' => $day,
            'myGoal' => MyGoal::get()
        ]);
    }

    public function create()
    {
        return view('days.create', [
            'day' => new Day(),
        ]);
    }

    public function store(Request $request)
    {
        $payload = $request->validate([
            'date' => 'required|string',
        ]);

        Day::create($payload);

        return redirect('/days')->with('success', 'Success.');
    }

    public function edit(Day $day)
    {
        return view('days.edit', [
            'day' => $day,
        ]);
    }

    public function update(Request $request, Day $day)
    {
        $payload = $request->validate([
            'date' => 'required|string',
        ]);

        $day->update($payload);

        return redirect('/days')->with('success', 'Success.');
    }

    public function destroy(Day $day)
    {
        $day->delete();

        return redirect(route('days.index'))->with('success', 'Success.');
    }
}
