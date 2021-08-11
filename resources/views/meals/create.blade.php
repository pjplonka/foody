@extends('common.layouts.main')

@section('title', 'Create meal')

@section('content')

    <div class="container">

        <form method="POST" action="{{ route('meals.store') }}">

            @csrf

            <div class="card">
                <div class="card-header">
                    <span>Create new meal</span>
                </div>
                <div class="card-body">
                    @include('meals.form')
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="{{ route('meals.index') }}" type="button" class="btn btn-secondary">Cancel</a>
                </div>
            </div>

        </form>

    </div>

@endsection
