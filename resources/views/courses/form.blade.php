<h1>{{ $mode }}</h1>


@if (count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        <ul>
            <li>
                @foreach ($errors->all() as $error)
                    {{$error}}
                @endforeach
            </li>
        </ul>
    </div>
@endif

<div class="form-floating mb-3">
    <input type="text" name="name" value="{{ isset($course->name) ? $course->name : '' }}" class="form-control" placeholder="¿Example?">
    <label class="form-label">Nombre del Curso</label>
</div>
<div class="form-floating mb-3">
    <input type="text" name="description" value="{{ isset($course->description) ? $course->description : '' }}" class="form-control" placeholder="¿Example?">
    <label class="form-label">Descripción</label>
</div>
<div class="form-floating mb-3">
    <input type="text" name="price" value="{{ isset($course->price) ? $course->price : '' }}" class="form-control" placeholder="Price">
    <label class="form-label">Precio</label>
</div>

@if (isset($course->image))
    <img src="{{ asset($course->image)}}" width="100" alt="">
@endif
<div class="form-floating mb-3">
    <input type="file" name="image" value="{{ isset($course->image) ? $course->image : '' }}" id="image" class="form-control" placeholder=".png, .jpg, .jpeg">
    <label class="form-label">Imagen</label>
</div>
<input type="submit" class="btn btn-primary" value="{{ $mode }}">