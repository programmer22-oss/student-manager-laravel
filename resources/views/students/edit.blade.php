@extends('layouts.app')

@section('content')

<h3>Edit Student</h3>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


<form method="POST" action="/students/{{ $student->id }}">
    @csrf

    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" value="{{ $student->name }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" value="{{ $student->email }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Course</label>
        <input type="text" name="course" value="{{ $student->course }}" class="form-control">
    </div>

    <button class="btn btn-success">Update</button>

</form>

@endsection