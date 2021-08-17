@extends('common.layouts.main')

@section('title', 'Edit day product')

@section('content')

    <div class="container">

        <form method="POST" action="{{ route('day-products.update', ['product' => $product]) }}">

            @method('put')
            @csrf

            <div class="card">
                <div class="card-header">
                    <span>Edit day product</span>
                </div>
                <div class="card-body">
                    @include('day-products.form')
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="{{ route('days.show', ['day' => $product->meal->day]) }}" type="button" class="btn btn-secondary">Cancel</a>
                </div>
            </div>

        </form>

    </div>

@endsection
