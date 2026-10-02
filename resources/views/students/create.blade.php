<!DOCTYPE html>
<html><head><title>Student Management System</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head><body class="p-4">
<div class="container" style="max-width:600px">
<h1 class="text-center mb-4">Student Management System</h1>
<h3>Add New Student</h3>
@if($errors->any()) <div class="alert alert-danger">@foreach($errors->all() as $e) {{ $e }}<br> @endforeach</div> @endif
<form method="POST" action="/students">
@csrf
<label>Name</label><input name="name" class="form-control mb-2" value="{{ old("name") }}" required>
<label>Roll No</label><input name="roll_no" class="form-control mb-2" value="{{ old("roll_no") }}" required>
<label>Class</label><input name="class" class="form-control mb-2" value="{{ old("class") }}" required>
<label>Email</label><input name="email" type="email" class="form-control mb-2" value="{{ old("email") }}" required>
<button class="btn btn-primary w-100 mt-2">Save Student</button>
</form>
<a href="/students" class="btn btn-secondary w-100 mt-2">View All Students</a>
</div></body></html>
