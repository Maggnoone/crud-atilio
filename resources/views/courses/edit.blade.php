@extends('layout.app-master')

@section('content')
<link rel="stylesheet" href="{{asset('assets/css/navbar.css')}}">

<form action="{{ url('course/' . $course->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH') }}

    @include('courses.form', ['mode' => 'Editar Curso'])

    <a href="{{ url('course/') }}" class="btn btn-danger">
        Go Back
    </a>

    

</form>

@endsection
