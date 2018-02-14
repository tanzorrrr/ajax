@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">Student-Datail</div>
            <div class="panel-body">
<hr>
<div class="container">
    <h1>Student Id:{{$student->id}}</h1>
    <hr>
    <ul>
        <li>First name:{{$student->first_name}}</li>
        <li>Last Name:{{$student->last_name}}</li>
        <li>Student Sex:{{$student->sex}}</li>
        <li></li>
    </ul>
</div>
            </div>
        </div>

@endsection


