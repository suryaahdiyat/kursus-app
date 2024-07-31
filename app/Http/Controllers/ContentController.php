<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Course;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function create(Course $course)
    {
        return view('contents.create', [
            'course' => $course
        ]);
    }

    public function store(Request $request, Course $course)
    {
        $request->validate([
            // 'course_id' => 'required|integer',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'link_course' => 'required|string|max:255',
        ]);

        Content::create([
            'course_id' => $course->id,
            'title' => $request->title,
            'description' => $request->description,
            'link_course' => $request->link_course,
        ]);

        return view('contents.index', [
            'c' => $course->contents()->get(),
            'course_slug' => $course->slug,
            'message' => 'Content added succesfully'
        ]);
    }

    public function edit($slug, Content $content)
    {
        return view('contents.edit', [
            'content' => $content,
            'course_slug' => $slug
        ]);
    }

    public function update(Request $request, Course $course, Content $content)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'link_course' => 'required|string|max:255',
        ]);

        $content->update([
            'title' => $request->title,
            'course_id' => $course->id,
            'description' => $request->description,
            'link_course' => $request->link_course,
        ]);

        return view('contents.index', [
            'c' => $course->contents()->get(),
            'course_slug' => $course->slug,
            'message' => 'Content updated succesfully'
        ]);
    }

    public function destroy(Course $course, Content $content)
    {
        $content->delete();

        return view('contents.index', [
            'c' => $course->contents()->get(),
            'course_slug' => $course->slug,
            'message' => 'Content deleted succesfully'
        ]);
    }
}
