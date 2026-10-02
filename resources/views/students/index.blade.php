<!DOCTYPE html>
<html><head><title>Student Management System</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head><body class="p-4">
<div class="container">
<h1 class="text-center mb-4">Student Management System</h1>
<h3>All Students <a href="/students/create" class="btn btn-success btn-sm float-end">+ Add Student</a></h3>
@if(session("success")) <div class="alert alert-success">{{ session("success") }}</div> @endif
<table class="table table-bordered table-striped mt-3">
<tr><th>ID</th><th>Name</th><th>Roll No</th><th>Class</th><th>Email</th><th>Action</th></tr>
@forelse($students as $s)
<tr><td>{{ $s->id }}</td><td>{{ $s->name }}</td><td>{{ $s->roll_no }}</td><td>{{ $s->class }}</td><td>{{ $s->email }}</td>
<td>
<form method="POST" action="/students/{{ $s->id }}" onsubmit="return confirm('Delete?\)">
@csrf @method("DELETE")
<button class="btn btn-danger btn-sm">Delete</button>
</form>
</td></tr>
@empty
<tr><td colspan="6" class="text-center">No students yet</td></tr>
@endforelse
</table>
</div></body></html>
