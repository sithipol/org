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

            <div class="card-body">
                <table class="table table-borded">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Survey Template Name</th>
                            <th>Answer</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($survey as $key => $val )
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $val->surveyTemplate->name }}</td>
                            <td>
                                <ul>@foreach ($val->surveyAnswer as $index =>$value )
                                    {{-- {{ dd($val[]) }} --}}
                                    @foreach ($value as $keyA =>$valA )
                                    {{ $value }}
                                    {{-- @if ($val['survey_template_id'] == $valA['survey_template_id'] )
                                    <li>{{ $value->surveyChoiceName }}</li>
                                    @endif --}}

                                    @endforeach

                                    @endforeach
                                </ul>
                            </td>
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
