@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">Student-list</div>
            <div class="panel-body">
<h1>add new stuent </h1>
<hr>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{URL::to('/students')}}" method="POST" file="true" enctype="multipart/form-data">
    {{csrf_field()}}
    <table>
        <tr>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <td>Add photo</td>
            <td><input type="file" name="photo"></td><td><img src="http://127.0.0.1:8000/photo/{{$stu->photo or ""}}" alt=""></td></tr>
        <tr>
            <td>First name</td>
            <td>
                <input type="text" name="first_name">
            </td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td> <input type="text" name="last_name"></td>
        </tr>
        <tr>
            <td>sex</td>
            <td>
                <select name="sex_id" id="">
                    <option value="">------------------</option>
                    @foreach($sexses as $sex)
                        <option value="{{$sex->id}}">{{$sex->sex}}</option>
                        @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <td></td>
            <td> <input type="submit" name="submit"></td>
        </tr>
    </table>
</form>
            </div>
        </div>
        <
    </div>
@endsection
