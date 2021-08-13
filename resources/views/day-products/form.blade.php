@include('common.form.select', [
    'id' => 'product_id',
    'label' => 'Product',
    'value' => old('product_id') ?: null,
    'default' => 'Select product',
    'hint' => 'Product name.',
    'options' => $products->map(function ($product) {
        return ['value' => $product->id, 'label' => $product->name];
    })
])
