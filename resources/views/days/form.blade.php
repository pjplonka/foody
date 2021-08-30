@include('common.form.input-text', [
    'type' => 'date',
    'id' => 'date',
    'label' => 'Date',
    'value' => old('date') ?: ($day->date ? $day->date->format('Y-m-d') : \Carbon\Carbon::now()->format('Y-m-d'))
])
