@inject('calc', 'App\Services\PercentageCalculator')

@extends('common.layouts.main')

@section('title', 'Day')

@section('content')

    <div class="container">

        <x-card title="Meals and products for day {{ $day->date->format('d-m-Y') }}">
            <x-slot name="headerWidgets">
                <a class="btn btn-primary mr-3" href="{{ route('day-meals.create', ['day' => $day]) }}">Add meal</a>
            </x-slot>
            <slot>
                @include('dashboard.dashboard-table', ['day' => $day])
            </slot>
        </x-card>

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
