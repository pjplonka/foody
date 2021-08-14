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
                    Protein per day: {{ $myGoal->protein }}g ({{ round((($myGoal->protein * 4) / $myGoal->caloriesPerDay() ) * 100) }}%)<br>
                    Carbs per day:
                    {{ $myGoal->carbohydrates }}g ({{ round((($myGoal->carbohydrates * 4) / $myGoal->caloriesPerDay() ) * 100) }}%)
                    - including max. {{ $myGoal->sugar }}g of sugar
                    <br>
                    Fiber per day: {{ $myGoal->fiber }}g ({{ round((($myGoal->fiber * 4) / $myGoal->caloriesPerDay() ) * 100) }}%)<br>
                    Fat per day: {{ $myGoal->fat }}g ({{ round((($myGoal->fat * 9) / $myGoal->caloriesPerDay() ) * 100) }}%)<br>
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
