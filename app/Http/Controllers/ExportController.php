<?php

namespace App\Http\Controllers;

use App\Exports\DayExport;
use App\Models\Day;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function day(Day $day)
    {
        $filename = $day->date->format('d-m-Y');

        return Excel::download(new DayExport($day), $filename . '.xlsx');
    }
}
