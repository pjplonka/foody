<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\MyGoal;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'day' => Day::query()->whereDate('date', Carbon::today())->first(),
            'myGoal' => MyGoal::get()
        ]);
    }
}
