@extends('common.layouts.main')

@section('title', 'Meals list')

@section('content')

    <div class="container">

        <div class="card">
            <div class="card-header">
                <span>Meals list</span>
                <a class="float-right" href="{{ route('meals.create') }}">Add new meal</a>
            </div>
            <div class="card-body">
                <table class="table table-borderless custom-table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Calories</th>
                        <th scope="col">Protein</th>
                        <th scope="col">Carbohydrates</th>
                        <th scope="col">Fat</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($meals as $meal)
                        <tr>
                            <th scope="row">{{ $meal->id }}</th>
                            <td>{{ $meal->name }}</td>
                            <td>
                                {{ $meal->calories() }}
                                ({{ round(($meal->calories() / $myGoal->caloriesPerDay()) * 100) }}%)
                            </td>
                            <td>
                                {{ $meal->protein() }}
                                ({{ \App\CaloriesCalculator::fatInPercentage($myGoal->caloriesPerDay(), $meal->protein()) }}%)
                            </td>
                            <td>
                                {{ $meal->carbohydrates() }}
                                ({{ \App\CaloriesCalculator::carbsInPercentage($myGoal->caloriesPerDay(), $meal->carbohydrates()) }}%)
                            </td>
                            <td>
                                {{ $meal->fat() }}
                                ({{ \App\CaloriesCalculator::fatInPercentage($myGoal->caloriesPerDay(), $meal->fat()) }}%)
                            </td>
                            <td class="actions">
                                <a href="{{ route('meals.edit', ['meal' => $meal->id]) }}" class="mr-2"><i
                                        class="bi-pencil icon"></i></a>
                                <form method="post" style="display: inline"
                                      action="{{ route('meals.destroy', ['meal' => $meal->id]) }}">
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
                </table>
            </div>
        </div>

    </div>

@endsection
