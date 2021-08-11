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
                    Protein per day: {{ $myGoal->protein }}g ({{ $myGoal->stats()['proteinInPercentage'] }}%)<br>
                    Carbs per day: {{ $myGoal->carbohydrates }}g ({{ $myGoal->stats()['carbsInPercentage'] }}%)<br>
                    Fat per day: {{ $myGoal->fat }}g ({{ $myGoal->stats()['fatInPercentage'] }}%)<br>
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
