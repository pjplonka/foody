@extends('common.layouts.main')

@section('title', 'Edit user')

@section('content')

    <div class="container">

        <form method="POST" action="{{ route('users.update', ['user' => $user->id]) }}">

            @method('put')
            @csrf

            <div class="card">
                <div class="card-header">
                    <span>Edit user</span>
                </div>
                <div class="card-body">
                    @include('users.form')
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="{{ route('users.index') }}" type="button" class="btn btn-secondary">Cancel</a>
                </div>
            </div>

        </form>

    </div>

@endsection
