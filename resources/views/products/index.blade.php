@extends('common.layouts.main')

@section('title', 'Products list')

@section('content')

    <div class="container">

        <x-card title="Products list">
            <x-slot name="headerWidgets">
                <a class="btn btn-primary" href="{{ route('products.create') }}">Add new product</a>
            </x-slot>
            <slot>
                @include('products.products-table', ['products' => $products])
            </slot>
        </x-card>

    </div>

@endsection
