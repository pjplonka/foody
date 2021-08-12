@inject('calc', 'App\Services\PercentageCalculator')

@extends('common.layouts.main')

@section('title', 'Day')

@section('content')

    <div class="container">

        <div class="card mb-3">
            <div class="card-header">
                <span>Meals for day {{ $day->date->format('d-m-Y') }}</span>
                <a class="float-right" href="{{ route('day-meals.create', ['day' => $day]) }}">Add new meal</a>
            </div>
            <div class="card-body">
                <table class="table table-borderless custom-table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Protein</th>
                        <th scope="col">Carbohydrates</th>
                        <th scope="col">Fat</th>
                        <th scope="col">Calories</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($day->meals as $meal)
                        <tr>
                            <th scope="row">{{ $meal->id }}</th>
                            <td>{{ $meal->name }}</td>
                            <td>
                                {{ $meal->protein() }}
                            </td>
                            <td>
                                {{ $meal->carbohydrates() }}
                            </td>
                            <td>
                                {{ $meal->fat() }}
                            </td>
                            <td>
                                {{ $meal->calories() }}
                            </td>
                            <td class="actions">
                                <form method="post" style="display: inline"
                                      action="{{ route('day-meals.destroy', ['day' => $day, 'mealId' => $meal->id]) }}">
                                    @csrf
                                    @method('delete')
                                    <button class="delete-prompt" type="submit"
                                            style="border:none; background: none; cursor:pointer;"><i
                                            class="bi-trash icon"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    @php

                    @endphp
                    <tr>
                        <th scope="col">#</th>
                        <th></th>
                        <th>{{ $day->protein() }}</th>
                        <th>{{ $day->carbohydrates() }}</th>
                        <th>{{ $day->fat() }}</th>
                        <th>{{ $day->calories() }}</th>
                        <th></th>
                    </tr>
                    <tr>
                        <th scope="col">#</th>
                        <td></td>
                        <td>{{ $myGoal->protein }} ({{ $calc->rounded($myGoal->protein, $day->protein()) }}%)</td>
                        <td>{{ $myGoal->carbohydrates }} ({{ $calc->rounded($myGoal->carbohydrates, $day->carbohydrates()) }}%)</td>
                        <td>{{ $myGoal->fat }} ({{ $calc->rounded($myGoal->fat, $day->fat()) }}%)</td>
                        <td>{{ $myGoal->caloriesPerDay() }} ({{ $calc->rounded($myGoal->caloriesPerDay(), $day->calories()) }}%)</td>
                        <td></td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <span>Water for day {{ $day->date->format('d-m-Y') }}</span>
            </div>
            <div class="card-body">
                08:00 | 100ml | Done <br>
                09:00 | 100ml | Done <br>
                10:00 | 100ml | Done <br>
                11:00 | 100ml | Done <br>
                12:00 | 100ml | Done <br>
                13:00 | 100ml | Done <br>
                14:00 | 100ml | <br>
            </div>
        </div>

    </div>

@endsection
