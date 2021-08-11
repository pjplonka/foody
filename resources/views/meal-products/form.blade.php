@include('common.form.select', [
    'id' => 'product_id',
    'label' => 'Product',
    'value' => old('product_id') ?: $mealProduct->product_id,
    'default' => 'Select product',
    'hint' => 'Product name.',
    'options' => $products->map(function ($product) {
        return ['value' => $product->id, 'label' => $product->name];
    })
])

@include('common.form.input-text', [
    'id' => 'weight',
    'label' => 'Weight',
    'value' => old('weight') ?: $mealProduct->weight
])
