@extends('common.layouts.main')

@section('title', 'Add product to meal')

@section('content')

    <div class="container">

        <form method="POST" action="{{ route('meal-products.store', ['meal' => $meal]) }}">

            @csrf

            <div class="card">
                <div class="card-header">
                    <span>Add product to <b>{{ $meal->name }}</b></span>
                </div>
                <div class="card-body">
                    @include('meal-products.form')
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="{{ route('meals.edit', ['meal' => $meal]) }}" type="button" class="btn btn-secondary">Cancel</a>
                </div>
            </div>

        </form>

    </div>

@endsection
