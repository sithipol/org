@extends('layouts.app')

@section('content')

<div class="row justify-content-center">

    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('แบบสำรวจ') }}</div>

            <div class="card-body">
                <form action="{{ route('survey.create') }}" method="POST">
                    @csrf
                    @foreach ($survey_template as $key =>$val )
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <h3>{{ $key+1 }} .{{ $val['name'] }} </h3>
                        </div>
                        @if ($val['survey_type_id'] == 3)
                        <div class="col-md-6">
                            <textarea class="form-control" name="choice[{{ $val['id'] }}][]"
                                id="choice[{{ $val['id'] }}][]" required></textarea>
                        </div>
                        @else
                        @foreach ($val->surveyChoice as $index =>$value )
                        <div class="col-md-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="choice[{{ $val['id'] }}][]"
                                    name="choice[{{ $val['id'] }}][]" value="{{ $value['id'] }}" />
                                <label for="choice[{{ $val['id'] }}][]" class="form-check-label">{{
                                    $value['name']}}</label>
                            </div>
                        </div>
                        @endforeach
                        @endif


                    </div>
                    @endforeach

            </div>
            <div class="row mb-3">
                <div class="col-md-12 text-md-center">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Save') }}
                    </button>
                </div>
            </div>
            </form>
        </div>
    </div>

    @endsection
