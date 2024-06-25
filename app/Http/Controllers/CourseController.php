<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses['courses'] = Course::paginate();
        return view('courses.index', $courses);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $faqData = request()->all();
        $courseData = request()->except('_token');

        $fields = [
            'name' => 'required|string|max:555',
            'description' => 'required|string|max:555',
            'price' => 'required|string|max:55',
            'image' => 'required|max:10000|mimes:jpeg,png,jpg'
        ];

        $msg = [
            'required' => 'The :attribute is Required!'
        ];

        $this->validate($request, $fields, $msg);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName(); // Obtener el nombre original del archivo
            $path = "uploads/" . $filename; // Ruta relativa del archivo
            $file->move(public_path('uploads'), $filename); // Mover el archivo a la carpeta "uploads" con el nombre original
            $courseData['image'] = $path;
        } else {
            $error = $request->file('image')->getError();
            return $error;
        }
        
        Course::insert($courseData);
        return redirect('/course')->with('mensaje', 'Curso fue agregado con éxito!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $course = Course::findOrFail($id);

        $courses = Course::all();

        return view('courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $fields = [
            'name' => 'required|string|max:555',
            'description' => 'required|string|max:555',
            'price' => 'required|integer|max:555',
            'image' => 'max:10000|mimes:jpeg,png,jpg'
        ];

        $msg = [
            'required' => 'The :attribute is Required!'
        ];

        $this->validate($request, $fields, $msg);

        $courseData = $request->except(['_token', '_method']);

        // Handle image update if a new image is uploaded
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName(); // Obtener el nombre original del archivo
            $path = "uploads/" . $filename; // Ruta relativa del archivo
            $file->move(public_path('uploads'), $filename); // Mover el archivo a la carpeta "uploads" con el nombre original
            $courseData['image'] = $path;
        }

        Course::where('id', $id)->update($courseData);

        return redirect('/course')->with('mensaje', 'El curso ha sido actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Course::destroy($id);
        return redirect('/course')->with('mensaje', 'Curso fue eliminado!');
    }


}
