@inject('calc', 'App\Services\PercentageCalculator')

@extends('common.layouts.main')

@section('title', 'Dashboard')

@section('content')

    <div class="container-fluid">

        @if ($day)
            <x-card title="Meals and products for today">
                <x-slot name="headerWidgets">
                    <a class="btn btn-primary mr-3" href="{{ route('day-meals.create', ['day' => $day]) }}">Add meal</a>
                    <a class="btn btn-primary" href="{{ route('day-products.create', ['day' => $day]) }}">
                        Add product
                    </a>
                </x-slot>
                <slot>
                    @include('dashboard.dashboard-table', ['day' => $day])
                </slot>
            </x-card>
        @endif

        <div class="card">
            <div class="card-header">
                <span>Water for day today</span>
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
