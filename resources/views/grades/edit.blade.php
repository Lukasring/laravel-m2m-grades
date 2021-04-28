@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Edit Grade:</div>
        <div class="card-body">
          <form action="{{ route('grades.update', $grade->id) }}" method="POST">
            @csrf @method("PUT")
            <div class="form-group">
              <label>Student: </label>
              <select name="student_id" id="" class="form-control">
                <option value="" selected disabled>Select Student</option>
                @foreach ($students as $student)
                <option value="{{$student->id}}" @if($student->id === $grade->student_id) selected="selected" @endif>{{ $student->name . ' ' . $student->surname }}</option>
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
                <option value="{{$lecture->id}}" @if($lecture->id === $grade->lecture_id) selected="selected" @endif>{{ $lecture->name . ' ' . $lecture->surname }}</option>
                @endforeach
              </select>
              @error('lecture_id')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label>Grade: </label>
              <input type="number" name="grade" class="form-control" value="{{$grade->grade}}">
              @error('grade')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <button type="submit" class="btn btn-outline-primary">Edit</button>
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