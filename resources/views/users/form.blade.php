@include('common.form.input-text', [
    'id' => 'name',
    'label' => 'Name',
    'hint' => 'User name.',
    'value' => old('name') ?: $user->name
])

@include('common.form.input-text', [
    'id' => 'email',
    'label' => 'E-mail address',
    'hint' => 'User e-mail address.',
    'value' => old('email') ?: $user->email
])

@include('common.form.input-text', [
    'id' => 'password',
    'label' => 'Password',
    'hint' => 'User password',
    'value' => old('password') ?: $user->password
])

@include('common.form.select', [
    'id' => 'parent_id',
    'label' => 'Parent',
    'value' => old('parent_id') ?: $user->name,
    'default' => 'Select parent',
    'hint' => 'Parent name.',
    'options' => $users->map(function ($user) {
        return ['value' => $user->id, 'label' => $user->name];
    })
])
