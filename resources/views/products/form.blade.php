@include('common.form.input-text', [
    'id' => 'name',
    'label' => 'Name',
    'hint' => 'Product name.',
    'value' => old('name') ?: $product->name
])

@include('common.form.input-text', [
    'id' => 'protein',
    'label' => 'Protein',
    'value' => old('protein') ?: $product->protein
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
])

@include('common.form.input-text', [
    'id' => 'fat',
    'label' => 'Fat',
    'value' => old('fat') ?: $product->fat
])
