@extends('layouts.main')

@section('content')
@if(isset($message))
    <p class="relative w-1/6 p-3 mb-5 ml-2 text-white border-4 bg-lime-600 border-lime-800">
        {{ $message }}
        <a href="/content/{{ $course_slug }}"
            class="absolute flex items-center justify-center w-6 h-6 text-xs rounded-full -top-3 -right-3 bg-rose-700">X</a>
    </p>
@endif
<ul class="grid grid-cols-2 gap-2 m-2 md:grid-cols-4">
    @foreach ($c as $content)
    <li class="p-2 rounded bg-slate-200">
        <div class="pt-2">
            <h1 class="mb-2 text-xl font-bold">{{ $content->title }}</h1>
            <p>Deskripsi : {{ $content->description }}</p>
            <p>Link : {{ $content->link_course }}</p>
            <div class="pt-2">
                <a href="/content/{{ $content->link_course }}"
                    class="block w-1/3 p-2 text-white duration-100 bg-teal-700 rounded hover:bg-teal-900 hover:translate-x-2"> Go to link.. </a>
                <div class="grid grid-cols-1 gap-2 mt-2 md:grid-cols-2">
                    <a href="/content/{{ $course_slug }}/edit/{{ $content->id }}" class="block p-2 text-center text-white duration-100 rounded bg-cyan-700 hover:bg-cyan-900 hover:scale-105">edit</a>
                    <form action="/content/{{ $course_slug }}/delete/{{ $content->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button onclick="return handleDelete()" class="block w-full p-2 text-white duration-100 rounded bg-rose-700 hover:bg-rose-900 hover:scale-105">delete</button>
                    </form>
                </div>
            </div>
        </div>
    </li>
    @endforeach
</ul>
<div class="grid grid-cols-2 gap-2 mx-2 mt-4 text-center">
    <a href="/" class="block p-2 font-bold text-white duration-100 border rounded shadow-md bg-rose-700 hover:bg-rose-900 hover:scale-95">back</a>
    <a href="/content/create/{{ $course_slug }}" class="block p-2 font-bold text-white border rounded shadow-md text-whiteduration-100 bg-emerald-700 hover:bg-emerald-900 hover:scale-95">add new content</a>
</div>
<script>
    const handleDelete = () => {
        return confirm('Are you want to delete this content?')
    }
</script>
@endsection