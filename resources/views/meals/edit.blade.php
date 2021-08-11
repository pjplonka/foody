@extends('common.layouts.main')

@section('title', 'Edit meal')

@section('content')

    <div class="container">

        <form method="POST" action="{{ route('meals.update', ['meal' => $meal->id]) }}">

            @method('put')
            @csrf

            <div class="card">
                <div class="card-header">
                    <span>Edit meal</span>
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

        <div class="card">
            <div class="card-header">
                <span>Meals products</span>
                <a class="float-right" href="{{ route('meal-products.create', ['meal' => $meal->id]) }}">Add product</a>
            </div>
            <div class="card-body">
                <table class="table table-borderless custom-table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Weight</th>
                        <th scope="col">Calories</th>
                        <th scope="col">Protein</th>
                        <th scope="col">Carbohydrates</th>
                        <th scope="col">Fat</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($meal->products as $mealProduct)
                        <tr>
                            <th scope="row">{{ $mealProduct->id }}</th>
                            <td>{{ $mealProduct->product->name }}</td>
                            <td>{{ $mealProduct->weight }}</td>
                            <td>{{ $mealProduct->calories() }}</td>
                            <td>{{ $mealProduct->protein() }}</td>
                            <td>{{ $mealProduct->carbohydrates() }}</td>
                            <td>{{ $mealProduct->fat() }}</td>
                            <td class="actions">
                                <a href="{{ route('meal-products.edit', ['mealProduct' => $mealProduct->id]) }}" class="mr-2">
                                    <i class="bi-pencil icon"></i>
                                </a>
                                <form method="post" style="display: inline"
                                      action="{{ route('meal-products.destroy', ['mealProduct' => $mealProduct->id]) }}">
                                    @csrf
                                    @method('delete')
                                    <button class="delete-prompt" type="submit"
                                            style="border:none; background: none; cursor:pointer;"><i
                                            class="bi-trash icon"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th scope="col">#</th>
                            <th></th>
                            <th>{{ $meal->products->sum(function($product) { return $product->weight; }) }}</th>
                            <th>{{ $meal->products->sum(function($product) { return $product->calories(); }) }}</th>
                            <th>{{ $meal->products->sum(function($product) { return $product->protein(); }) }}</th>
                            <th>{{ $meal->products->sum(function($product) { return $product->carbohydrates(); }) }}</th>
                            <th>{{ $meal->products->sum(function($product) { return $product->fat(); }) }}</th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

    </div>

@endsection
