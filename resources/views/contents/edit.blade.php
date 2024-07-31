@extends('layouts.main')

@section('content')
<form action="/content/{{ $course_slug }}/{{ $content->id }}" method="POST" class="w-1/2 p-4 mx-2 rounded-md bg-slate-200">
    <h1 class="mb-4 text-2xl font-bold text-emerald-700">Edit Your Content Here</h1>
    @csrf
    @method('PUT')
    <div class="grid h-10 grid-cols-1 mb-2 md:grid-cols-2">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="p-2 bg-transparent border-b-2 border-white focus:outline-indigo-600" value="{{ $content->title }}">
    </div>
    <div class="grid h-10 grid-cols-1 mb-2 md:grid-cols-2">
        <label for="description">Description</label>
        <input type="text" name="description" id="description" class="p-2 bg-transparent border-b-2 border-white focus:outline-indigo-600" value="{{ $content->description }}">
    </div>
    <div class="grid h-10 grid-cols-1 mb-2 md:grid-cols-2">
        <label for="link_course">Link</label>
        <input type="text" name="link_course" id="link_course" class="p-2 bg-transparent border-b-2 border-white focus:outline-indigo-600" value="{{ $content->link_course }}">
    </div>
    <div class="grid grid-cols-1 gap-2 my-2 md:grid-cols-2">
        <a href="/content/{{ $course_slug }}"
            class="block py-2 text-center text-white duration-100 rounded bg-rose-700 hover:bg-rose-900 hover:scale-95">back</a>
        <button type="submit"
            class="block py-2 text-center text-white duration-100 rounded bg-cyan-700 hover:bg-cyan-900 hover:scale-95">save</button>
    </div>
</form>
@endsection