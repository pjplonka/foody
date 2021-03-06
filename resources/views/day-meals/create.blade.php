@extends('common.layouts.main')

@section('title', 'Add meal to day')

@section('content')

    <div class="container">

        <form method="POST" action="{{ route('day-meals.store', ['day' => $day]) }}">

            @csrf

            <div class="card">
                <div class="card-header">
                    <span>Add meal to day</span>
                </div>
                <div class="card-body">
                    @include('day-meals.form')
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="{{ route('days.show', ['day' => $day]) }}" type="button" class="btn btn-secondary">Cancel</a>
                </div>
            </div>

        </form>

    </div>

@endsection
