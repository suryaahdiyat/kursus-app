@extends('layouts.main')

@section('content')
@if (isset($message))
    <p class="relative w-1/6 p-3 mb-5 ml-2 text-white border-4 bg-lime-600 border-lime-800">
        {{ $message }}
        <a href="/" class="absolute flex items-center justify-center w-6 h-6 text-xs rounded-full -top-3 -right-3 bg-rose-700">X</a>
    </p>

@endif
<ul class="grid grid-cols-2 gap-2 m-2 md:grid-cols-4">
    @foreach ($courses as $course)
        <li class="p-2 rounded bg-slate-200">
            <div class="pt-2">
                <h1 class="mb-2 text-xl font-bold">{{ $course->title }}</h1>
                <p>Deskripsi : {{ $course->description }}</p>
                <p>Durasi : {{ $course->duration }}</p>
                <div class="pt-2">
                    <a href="/content/{{ $course->slug }}" class="block w-1/3 p-2 text-white duration-100 bg-teal-700 rounded hover:bg-teal-900 hover:translate-x-2"> see more...</a>
                    <div class="grid grid-cols-1 gap-2 mt-2 md:grid-cols-2" >
                        <a href="/course/edit/{{ $course->id }}" class="block p-2 text-center text-white duration-100 rounded bg-cyan-700 hover:bg-cyan-900 hover:scale-105">edit</a>
                        <form action="/course/delete/{{ $course->id }}" method="POST">
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
<a href="/course/create" class="block py-2 mx-2 mt-4 font-bold text-center text-white duration-100 border rounded shadow-md bg-emerald-700 hover:bg-emerald-900 hover:scale-95">add new course</a>
<script>
    const handleDelete = () => {
        return confirm('Are you want to delete this course?')
    }
</script>
@endsection