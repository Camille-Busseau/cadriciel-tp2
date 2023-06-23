@extends('layouts.app')
@section('title', trans('lang.text_collegeStudents'))
@section('titleH1', trans('lang.text_collegeStudentsL'))
@section('content')
<div class="card mt-3">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>{{trans('lang.text_id')}}</th>
                    <th>{{trans('lang.text_name')}}</th>
                    <th>{{trans('lang.text_email')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                <tr>
                    <td>{{ $student->id}}</td>
                    <td>
                        <a href="{{route('maisonneuve.show', $student->id)}}">{{ $student->name }}</a>
                    </td>
                    <td>{{ $student->studentHasUser?->email}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $students }}
    </div>
</div>
@endsection