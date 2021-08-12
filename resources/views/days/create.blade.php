@extends('common.layouts.main')

@section('title', 'Create day')

@section('content')

    <div class="container">

        <form method="POST" action="{{ route('days.store') }}">

            @csrf

            <div class="card">
                <div class="card-header">
                    <span>Create new user</span>
                </div>
                <div class="card-body">
                    @include('days.form')
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="{{ route('days.index') }}" type="button" class="btn btn-secondary">Cancel</a>
                </div>
            </div>

        </form>

    </div>

@endsection
