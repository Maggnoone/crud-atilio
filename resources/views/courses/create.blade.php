

@extends('layout.app-master')

@section('content')

<form action="{{ url('/course') }}" method="post" enctype="multipart/form-data">
    @csrf

    @include('courses.form', ['mode' => 'Crear nuevo Curso'])

    <a href="{{ url('course/') }}" class="btn btn-danger">
        Go Back
    </a>

</form>

@endsection
