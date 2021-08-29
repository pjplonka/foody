<style>
    .product-row {
        font-size: 85%;
    }
</style>

<table class="table table-bordered table-hover table-custom">
    <thead style="margin-bottom: 20px;">
    <tr>
        <th scope="col"></th>
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
        <tr style="background-color: #f9f9f9;">
            <td>{{ $meal->name }}</td>
            <td>{{ $meal->protein() }} <small>({{ $calc->rounded($myGoal->protein, $meal->protein()) }}%)</small></td>
            <td>
                {{ $meal->carbohydrates() }} [{{ $meal->sugar() }}]
                <small>
                    ({{ $calc->rounded($myGoal->carbohydrates, $meal->carbohydrates()) }}% [{{ $calc->rounded($myGoal->sugar, $meal->sugar()) }}%])
                </small>
            </td>
            <td>{{ $meal->fat() }} <small>({{ $calc->rounded($myGoal->fat, $meal->fat()) }}%)</small></td>
            <td>{{ $meal->fiber() }} <small>({{ $calc->rounded($myGoal->fiber, $meal->fiber()) }}%)</small></td>
            <td>{{ $meal->calories() }} <small>({{ $calc->rounded($myGoal->caloriesPerDay(), $meal->calories()) }}%)</small></td>
            <td class="actions">
                <a href="{{ route('day-meal-products.create', ['day' => $day, 'meal' => $meal]) }}"
                   class="mr-2"><i class="bi-plus-circle icon"></i></a>
                <form method="post" style="display: inline"
                      action="{{ route('day-meals.destroy', ['meal' => $meal]) }}">
                    @csrf
                    @method('delete')
                    <button class="delete-prompt" type="submit"
                            style="border:none; background: none; cursor:pointer;"><i
                            class="bi-trash icon"></i></button>
                </form>
            </td>
        </tr>
        @foreach($meal->products as $product)
            <tr>
                <td class="product-row" style="padding-left:50px;">{{ $product->name() }}
                    <small>({{ $product->weight }}g)</small></td>
                <td class="product-row">{{ $product->protein() }}</td>
                <td class="product-row">{{ $product->carbohydrates() }} [{{ $product->sugar() }}]</td>
                <td class="product-row">{{ $product->fat() }}</td>
                <td class="product-row">{{ $product->fiber() }}</td>
                <td class="product-row">{{ $product->calories() }}</td>
                <td class="actions">
                    <a href="{{ route('day-products.edit', ['product' => $product]) }}" class="mr-2"><i
                            class="bi-pencil icon"></i></a>
                    <form method="post" style="display: inline"
                          action="{{ route('day-products.destroy', ['product' => $product]) }}">
                        @csrf
                        @method('delete')
                        <button class="delete-prompt" type="submit"
                                style="border:none; background: none; cursor:pointer;"><i
                                class="bi-trash icon"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <th>Podsumowanie dnia</th>
        <th>{{ $day->protein() }}</th>
        <th>{{ $day->carbohydrates() }} [{{ $day->sugar() }}]</th>
        <th>{{ $day->fat() }}</th>
        <th>{{ $day->fiber() }}</th>
        <th>{{ $day->calories() }}</th>
        <th></th>
    </tr>
    <tr>
        <th>Dzienny cel (% realizacji celu)</th>
        <th>{{ $myGoal->protein }} <small>({{ $calc->rounded($myGoal->protein, $day->protein()) }}%)</small></th>
        <th>
            {{ $myGoal->carbohydrates }}
            <small>({{ $calc->rounded($myGoal->carbohydrates, $day->carbohydrates()) }}%)</small>
        </th>
        <th>{{ $myGoal->fat }} <small>({{ $calc->rounded($myGoal->fat, $day->fat()) }}%)</small></th>
        <th>{{ $myGoal->fiber }} <small>({{ $calc->rounded($myGoal->fiber, $day->fiber()) }}%)</small></th>
        <th>
            {{ $myGoal->caloriesPerDay() }}
            <small>({{ $calc->rounded($myGoal->caloriesPerDay(), $day->calories()) }}%)</small>
        </th>
        <th></th>
    </tr>
    </tfoot>
</table>
