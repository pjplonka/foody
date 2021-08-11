@include('common.form.input-text', [
    'id' => 'protein',
    'label' => 'Protein',
    'hint' => 'Protein per day.',
    'value' => old('protein') ?: $myGoal->protein
])

@include('common.form.input-text', [
    'id' => 'carbohydrates',
    'label' => 'Carbs',
    'hint' => 'Carbs per day.',
    'value' => old('carbohydrates') ?: $myGoal->carbohydrates
])

@include('common.form.input-text', [
    'id' => 'fat',
    'label' => 'Fat',
    'hint' => 'Fat per day.',
    'value' => old('fat') ?: $myGoal->fat
])

@include('common.form.input-text', [
    'id' => 'water',
    'label' => 'Water',
    'hint' => 'Water per day in ml.',
    'value' => old('water') ?: $myGoal->water
])
