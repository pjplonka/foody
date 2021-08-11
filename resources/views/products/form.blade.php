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
    'id' => 'fat',
    'label' => 'Fat',
    'value' => old('fat') ?: $product->fat
])
