@inject('calc', 'App\Services\PercentageCalculator')

@extends('common.layouts.main')

@section('title', 'My goal')

@section('content')

    <div class="container">

        <div class="card">
            <div class="card-header">
                <span>My goal</span>
                <a class="float-right" href="{{ route('my-goals.edit', ['my_goal' => $myGoal]) }}">Edit</a>
            </div>
            <div class="card-body">

                <div>
                    Protein per day: {{ $myGoal->protein }}g
                    ({{ $calc->rounded($myGoal->caloriesPerDay(), $myGoal->proteinCaloriesPerDay()) }}%)
                    <br>
                    Carbs per day:
                    {{ $myGoal->carbohydrates }}g
                    ({{ $calc->rounded($myGoal->caloriesPerDay(), $myGoal->carbsCaloriesPerDay()) }}%)
                    - including max. {{ $myGoal->sugar }}g of sugar
                    <br>
                    Fiber per day: {{ $myGoal->fiber }}g
                    ({{ $calc->rounded($myGoal->caloriesPerDay(), $myGoal->fiberCaloriesPerDay()) }}%)
                    <br>
                    Fat per day: {{ $myGoal->fat }}g
                    ({{ $calc->rounded($myGoal->caloriesPerDay(), $myGoal->fatCaloriesPerDay()) }}%)
                    <br>
                    -- <br>
                    Calories per day: {{ $myGoal->caloriesPerDay() }}<br>
                </div>

                <div style="margin-top:20px">
                    Water per day: {{ $myGoal->water }}ml
                </div>

            </div>
        </div>

    </div>

@endsection
