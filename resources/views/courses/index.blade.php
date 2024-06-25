@extends('layout.app')
@section('content')


    <div class="container">
    
        @if (Session::has('mensaje'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{Session::get('mensaje');}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        
        <a href="{{ url('course/create') }}" class="btn btn-primary">Crear nuevo Curso</a>
        <br>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Precio</th>
                    <th scope="col" style="width: 10rem;">Acciones</th>
                </tr>
            </thead>
            <tbody>
        
                @foreach ($courses as $course)
        
                <tr>
                    <th scope="row">{{$course->id}}</th>
                    <td>
                        <img src="{{ asset($course->image) }}" width="100" alt="">
                    </td>
                    <td>{{$course->name}}</td>
                    <td>{{$course->description}}</td>
                    <td>{{$course->price}}</td>
                    <td>
                        <a href="{{ url('course/' . $course->id . '/edit') }}" class="btn btn-warning">
                            Edit
                        </a>
                        |
                        <form action="{{ url('course/' . $course->id) }}" method="post" class="d-inline">
                            @csrf
                            {{ method_field('DELETE')}}
                            <input type="submit" onclick="return confirm('¿Quieres borrar?')" value="Delete"
                                class="btn btn-danger">
                        </form>
                    </td>
                </tr>
        
                @endforeach
        
            </tbody>
        </table>
        </div>
       

@endsection
