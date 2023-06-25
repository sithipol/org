@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
        <div class="card">
            <div class="card-header">{{ __('User') }}</div>
            <div class="text-md-end p-2">
                <a class="btn btn-success" href="{{ route('survey.template') }}">Add</a>
            </div>

            <div class="card-body">
                <table class="table table-borded">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Survey Name</th>
                            <th>Survey Type</th>
                            <th>Status Survey</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($survey_template as $key => $val )
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $val->name }}</td>
                            <td>{{ $val->surveyType->name }}</td>
                            <td>{{ $val->status = 1? "Active" : "Not Active" }}</td>
                            <td><button class="btn btn-warning btn-sm m-1">Edit</button><button
                                    class="btn btn-danger btn-sm m-1">Delete</button></td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>

            </div>
        </div>
    </div>
</div>

@endsection
