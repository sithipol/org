@extends('layouts.app')

@section('head')
@vite('resources/js/survey/template-create.js')
@endsection
@section('content')

<div class="row justify-content-center">

    <div class="col-md-8">

        <div class="card">
            <div class="card-header">{{ __('Survey Template') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('survey.template') }}">
                    @csrf
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label">{{ __('Status Survey') }}</label>
                        <div class="col-md-6">
                            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror"
                                required>
                                <option value="" selected>--choose--</option>
                                <option value="1">Active</option>
                                <option value="2">Not Active</option>
                            </select>
                            @error('status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label">{{ __('Survey Type') }}</label>
                        <div class="col-md-6">
                            <select name="survey_type_id" id="survey_type_id"
                                class="form-control @error('survey_type_id') is-invalid @enderror" required>
                                <option value="" selected>--choose--</option>
                                @foreach ($survey_type as $key =>$val)
                                <option value="{{ $val['id'] }}">{{ $val['name'] }}</option>
                                @endforeach
                            </select>
                            @error('survey_type_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3 hide" id="row-add">

                    </div>
                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Save') }}
                            </button>
                            <button type="button" class="btn btn-warning ml-2" onclick="history.back()">
                                {{ __('Back') }}
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
