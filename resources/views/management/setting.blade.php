@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('User') }}</div>

            <div class="card-body">
                <table class="table table-borded">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Department</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $key => $val )
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $val->name }}</td>
                            <td>{{ $val->email }}</td>
                            <td>
                                <ul>@foreach ($val->userDepartment as $index =>$value )
                                    <li>{{ $value->getDepartment->name }}</li>

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
