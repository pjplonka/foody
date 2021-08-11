@extends('common.layouts.main')

@section('title', 'Edit product')

@section('content')

    <div class="container">

        <form method="POST" action="{{ route('products.update', ['product' => $product->id]) }}">

            @method('put')
            @csrf

            <div class="card">
                <div class="card-header">
                    <span>Edit product</span>
                </div>
                <div class="card-body">
                    @include('products.form')
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="{{ route('products.index') }}" type="button" class="btn btn-secondary">Cancel</a>
                </div>
            </div>

        </form>

    </div>

@endsection
