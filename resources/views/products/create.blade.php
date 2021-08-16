@extends('common.layouts.main')

@section('title', 'Create product')

@section('content')

    <div class="container">

        <form method="POST" action="{{ route('products.store') }}">

            @csrf

            <x-card title="Create new product">
                <slot>
                    @include('products.form')
                </slot>
                <x-slot name="footer">
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="{{ route('products.index') }}" type="button" class="btn btn-secondary">Cancel</a>
                </x-slot>
            </x-card>

        </form>

    </div>

@endsection
