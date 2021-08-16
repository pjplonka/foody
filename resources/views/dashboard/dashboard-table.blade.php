<table class="table table-borderless custom-table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Protein</th>
        <th scope="col">Carbohydrates [sugar]</th>
        <th scope="col">Fat</th>
        <th scope="col">Fiber</th>
        <th scope="col">Calories</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($day->meals as $meal)
        <tr>
            <th scope="row">{{ $meal->id }}</th>
            <td>{{ $meal->name }}</td>
            <td>
                {{ $meal->protein() }}
            </td>
            <td>
                {{ $meal->carbohydrates() }} [{{ $meal->sugar() }}]
            </td>
            <td>
                {{ $meal->fat() }}
            </td>
            <td>
                {{ $meal->fiber() }}
            </td>
            <td>
                {{ $meal->calories() }}
            </td>
            <td class="actions">
                <form method="post" style="display: inline"
                      action="{{ route('day-meals.destroy', ['day' => $day, 'mealId' => $meal->id]) }}">
                    @csrf
                    @method('delete')
                    <button class="delete-prompt" type="submit"
                            style="border:none; background: none; cursor:pointer;"><i
                            class="bi-trash icon"></i></button>
                </form>
            </td>
        </tr>
    @endforeach
    @foreach ($day->products as $product)
        <tr>
            <th scope="row">{{ $product->id }}</th>
            <td>{{ $product->name }} <small>({{ $product->pivot->weight }}g)</small></td>
            <td>
                {{ $product->pivot->protein() }}
            </td>
            <td>
                {{ $product->pivot->carbohydrates() }} [{{ $product->pivot->sugar() }}]
            </td>
            <td>
                {{ $product->pivot->fat() }}
            </td>
            <td>
                {{ $product->pivot->fiber() }}
            </td>
            <td>
                {{ $product->pivot->calories() }}
            </td>
            <td class="actions">
                <a href="{{ route('day-products.edit', ['dayProduct' => $product->pivot]) }}" class="mr-2"><i
                        class="bi-pencil icon"></i></a>
                <form method="post" style="display: inline"
                      action="{{ route('day-products.destroy', ['day' => $day, 'productId' => $product->id]) }}">
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
        <th>{{ $day->protein() }}</th>
        <th>{{ $day->carbohydrates() }} [{{ $day->sugar() }}]</th>
        <th>{{ $day->fat() }}</th>
        <th>{{ $day->fiber() }}</th>
        <th>{{ $day->calories() }}</th>
        <th></th>
    </tr>
    <tr>
        <th scope="col">#</th>
        <td></td>
        <td>{{ $myGoal->protein }} ({{ $calc->rounded($myGoal->protein, $day->protein()) }}%)</td>
        <td>{{ $myGoal->carbohydrates }} ({{ $calc->rounded($myGoal->carbohydrates, $day->carbohydrates()) }}%)</td>
        <td>{{ $myGoal->fat }} ({{ $calc->rounded($myGoal->fat, $day->fat()) }}%)</td>
        <td>{{ $myGoal->fiber }} ({{ $calc->rounded($myGoal->fiber, $day->fiber()) }}%)</td>
        <td>{{ $myGoal->caloriesPerDay() }} ({{ $calc->rounded($myGoal->caloriesPerDay(), $day->calories()) }}%)</td>
        <td></td>
    </tr>
    </tfoot>
</table>
