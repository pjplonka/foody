@include('common.form.input-text', [
    'id' => 'name',
    'label' => 'Name',
    'hint' => 'Meal name.',
    'value' => old('name') ?: $meal->name
])
