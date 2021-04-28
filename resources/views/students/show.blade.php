@extends('layouts.app')
@section('content')
<h1>{{$student->name . ' ' . $student->surname}}</h1>
@foreach ($student->grades as $grade)
<div class="row">
  <div class="col-sm-6">{{$grade->lecture->name}}</div>
  <div class="col-sm-6">{{$grade->grade}}</div>
</div>
@endforeach

@endsection