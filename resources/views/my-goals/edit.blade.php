@extends('common.layouts.main')

@section('title', 'Edit My Goal')

@section('content')

    <div class="container">

        <form method="POST" action="{{ route('my-goals.update', ['my_goal' => $myGoal]) }}">

            @method('put')
            @csrf

            <div class="card">
                <div class="card-header">
                    <span>Edit My Goal</span>
                </div>
                <div class="card-body">
                    @include('my-goals.form')
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="{{ route('my-goals.index') }}" type="button" class="btn btn-secondary">Cancel</a>
                </div>
            </div>

        </form>

    </div>

@endsection
