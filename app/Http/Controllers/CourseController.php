<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(){
        return view('courses.index', [
            'courses' => Course::all()
        ]);
    }

    public function showContents(Course $course){
        return view('contents.index', [
            'c' => $course->contents()->get(),
            'course_slug' => $course->slug
        ]);
    }

    public function create(){
        return view('courses.create');
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'duration' => 'required|integer',
        ]);

        Course::create([
            'title'=> $request->title,
            'description' => $request->description,
            'duration' =>$request->duration
        ]);

        return view('courses.index', [
            'courses' => Course::all(),
            'message' => 'Course added succesfully'
        ]);
    }

    public function edit(Course $course){
        return view('courses.edit', [
            'course' => $course
        ]);
    }

    public function update(Request $request, Course $course){
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'duration' => 'required|integer',
        ]);

        $course->update([
            'title' => $request->title,
            'description' => $request->description,
            'duration' => $request->duration
        ]);

        return view('courses.index', [
            'courses' => Course::all(),
            'message' => 'Course updated succesfully'
        ]);
    }

    public function destroy(Course $course){
        $course->delete();

        return view('courses.index', [
            'courses' => Course::all(),
            'message' => 'Course deleted succesfully'
        ]);
    }
}
