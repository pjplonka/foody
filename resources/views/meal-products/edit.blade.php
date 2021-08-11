@extends('common.layouts.main')

@section('title', 'Edit meal product')

@section('content')

    <div class="container">

        <form method="POST" action="{{ route('meal-products.update', ['mealProduct' => $mealProduct]) }}">

            @method('put')
            @csrf

            <div class="card">
                <div class="card-header">
                    <span>Edit meal product</span>
                </div>
                <div class="card-body">
                    @include('meal-products.form')
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="{{ route('meals.edit', ['meal' => $mealProduct->meal]) }}" type="button" class="btn btn-secondary">Cancel</a>
                </div>
            </div>

        </form>

    </div>

@endsection
