<?php

namespace App\Exports;

use App\Models\Day;
use Maatwebsite\Excel\Concerns\FromArray;

class DayExport implements FromArray
{
    protected Day $day;

    public function __construct(Day $day)
    {
        $this->day = $day;
    }

    public function array(): array
    {
        $array = [];
        $array[] = [$this->day->date->format('d-m-Y'), '', 'waga (g)', 'kalorie', 'białko', 'węglowodany', '(w tym cukry)', 'tłuszcze', '( w tym nasycone)', 'błonnik', 'sól'];

        foreach ($this->day->meals as $meal) {
            $array[] = ['00:00', $meal->name];

            foreach ($meal->products as $p) {
                $array[] = ['', $p->name(), $p->weight, $p->calories(), $p->protein(), $p->carbohydrates(), $p->sugar(), $p->fat(), $p->saturatedFat(), $p->fiber(), $p->sodium()];
            }

            $array[] = ['', 'PODSUMOWANIE POSIŁKU', '', $meal->calories(), $meal->protein(), $meal->carbohydrates(), $meal->sugar(), $meal->fat(), $meal->saturatedFat(), $meal->fiber(), $meal->sodium()];
        }

        $array[] = ['', 'PODSUMOWANIE DNIA', '', $this->day->calories(), $this->day->protein(), $this->day->carbohydrates(), $this->day->sugar(), $this->day->fat(), $this->day->saturatedFat(), $this->day->fiber(), $this->day->sodium()];

        return $array;
    }
}
