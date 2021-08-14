<?php

namespace App\Http\Controllers;

use App\Models\MyGoal;
use Illuminate\Http\Request;

class MyGoalController extends Controller
{
    public function index()
    {
        return view('my-goals.index', [
            'myGoal' => MyGoal::get()
        ]);
    }

    public function edit(MyGoal $myGoal)
    {
        return view('my-goals.edit', [
            'myGoal' => $myGoal,
        ]);
    }

    public function update(Request $request, MyGoal $myGoal)
    {
        $payload = $request->validate([
            'protein' => 'required|numeric',
            'carbohydrates' => 'required|numeric',
            'fat' => 'required|numeric',
            'sugar' => 'required|numeric',
            'fiber' => 'required|numeric',
            'water' => 'required|numeric',
        ]);

        $myGoal->update($payload);

        return redirect('/my-goals')->with('success', 'Success.');
    }
}
