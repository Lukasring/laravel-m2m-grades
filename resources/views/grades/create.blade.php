@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Add Grade:</div>
        <div class="card-body">
          <form action="{{ route('grades.store') }}" method="POST">
            @csrf
            <div class="form-group">
              <label>Student: </label>
              <select name="student_id" id="" class="form-control">
                <option value="" selected disabled>Select Student</option>
                @foreach ($students as $student)
                <option value="{{$student->id}}">{{ $student->name . ' ' . $student->surname }}</option>
                @endforeach
              </select>
              @error('student_id')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label>Lecture: </label>
              <select name="lecture_id" id="" class="form-control">
                <option value="" selected disabled>Select Lecture</option>
                @foreach ($lectures as $lecture)
                <option value="{{$lecture->id}}">{{ $lecture->name . ' ' . $lecture->surname }}</option>
                @endforeach
              </select>
              @error('lecture_id')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label>Grade: </label>
              <input type="number" name="grade" class="form-control">
              @error('grade')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <button type="submit" class="btn btn-outline-primary">Add</button>
          </form>
        </div>
        @if (session('status_success'))
        <div class="alert alert-success">
          <p style="color: green"><b>{{ session('status_success') }}</b></p>
        </div>
        @elseif(session('status_error'))
        <div class="alert alert-danger">
          <p style="color: red"><b>{{ session('status_error') }}</b></p>
        </div>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection