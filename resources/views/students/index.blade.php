@extends('layouts.app')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Students List</h3>

        {{-- Add Student button (login असलेला कोणीही पाहू शकतो) --}}
        <a href="{{ url('/students/create') }}" class="btn btn-primary">
            + Add Student
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Course</th>
                <th width="200">Action</th>
            </tr>
        </thead>
        <tbody>

        @forelse($students as $student)
            <tr>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->course }}</td>

                <td>
                    @if(auth()->check() && auth()->user()->role === 'admin')
                        <a href="/students/{{ $student->id }}/edit"
                           class="btn btn-warning btn-sm">Edit</a>

                        <a href="/students/{{ $student->id }}/delete"
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Are you sure?')">Delete</a>
                    @else
                        <span class="badge bg-secondary">View Only</span>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center text-muted">
                    No students found
                </td>
            </tr>
        @endforelse

        </tbody>
    </table>

</div>

@endsection
