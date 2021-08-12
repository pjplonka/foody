@include('common.form.select', [
    'id' => 'meal_id',
    'label' => 'Meal',
    'value' => old('meal_id') ?: null,
    'default' => 'Select meal',
    'hint' => 'Meal name.',
    'options' => $meals->map(function ($meal) {
        return ['value' => $meal->id, 'label' => $meal->name];
    })
])
