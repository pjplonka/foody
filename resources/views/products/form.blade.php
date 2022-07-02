@include('common.form.input-text', [
    'id' => 'name',
    'label' => 'Name',
    'hint' => 'Product name.',
    'value' => old('name') ?: $product->name
])

@include('common.form.input-text', [
    'id' => 'calories',
    'label' => 'Calories',
    'value' => old('calories') ?: $product->calories
])

@include('common.form.input-text', [
    'id' => 'protein',
    'label' => 'Protein',
    'value' => old('protein') ?: $product->protein
])

@include('common.form.input-text', [
    'id' => 'fat',
    'label' => 'Fat',
    'value' => old('fat') ?: $product->fat
])

@include('common.form.input-text', [
    'id' => 'saturated_fat',
    'label' => 'Saturated fat',
    'value' => old('saturated_fat') ?: $product->saturated_fat,
    'hint' => 'Included in Fat'
])

@include('common.form.input-text', [
    'id' => 'carbohydrates',
    'label' => 'Carbs',
    'value' => old('carbohydrates') ?: $product->carbohydrates
])

@include('common.form.input-text', [
    'id' => 'sugar',
    'label' => 'Sugar',
    'value' => old('sugar') ?: $product->sugar,
    'hint' => 'Included in Carbs'
])

@include('common.form.input-text', [
    'id' => 'fiber',
    'label' => 'Fiber',
    'value' => old('fiber') ?: $product->fiber,
    'hint' => 'Included in Carbs'
])

@include('common.form.input-text', [
    'id' => 'sodium',
    'label' => 'Sodium',
    'value' => old('sodium') ?: $product->sodium,
])

