@extends('common.layouts.main')

@section('title', 'Days list')

@section('content')

    <div class="container">

        <div class="card">
            <div class="card-header">
                <span>Days list</span>
                <a class="float-right" href="{{ route('days.create') }}">Add new day</a>
            </div>
            <div class="card-body">
                <table class="table table-borderless custom-table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Date</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($days as $day)
                        <tr>
                            <th scope="row">{{ $day->id }}</th>
                            <td>{{ $day->date->format('d-m-Y') }}</td>
                            <td class="actions">
                                <a href="{{ route('days.edit', ['day' => $day]) }}" class="mr-2"><i
                                        class="bi-pencil icon"></i></a>
                                <a href="{{ route('days.show', ['day' => $day]) }}" class="mr-2"><i
                                        class="bi-bounding-box-circles icon"></i></a>
                                <form method="post" style="display: inline"
                                      action="{{ route('days.destroy', ['day' => $day]) }}">
                                    @csrf
                                    @method('delete')
                                    <button class="delete-prompt" type="submit"
                                            style="border:none; background: none; cursor:pointer;"><i
                                            class="bi-trash icon"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

@endsection
