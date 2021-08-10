@extends('common.layouts.main')

@section('title', 'Create user')

@section('content')

    <div class="container">

        <form method="POST" action="{{ route('users.store') }}">

            @csrf

            <div class="card">
                <div class="card-header">
                    <span>Create new user</span>
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
