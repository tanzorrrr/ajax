@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">Student-edit</div>
            <div class="panel-body">

<form action="{{route('students.update',$id)}}" method="POST">
    {{csrf_field()}}
    {{method_field('PUT')}}
    <table>
        <tr>
            <p><img src="http://127.0.0.1:8000/photo/{{$student->photo}}" class="img-thumbnail" alt=""></p>
            <p><input type="file" name="photo"></p>
            <td>First name</td>
            <td>
                <input type="text" name="first_name" value="{{$student->first_name}}">
            </td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td> <input type="text" name="last_name" value="{{$student->last_name}}"></td>
        </tr>
        <tr>
            <td>sex</td>
            <td>
                <select name="sex_id" id="">
                    <option value="">------------------</option>
                    @foreach($sexes as $sex)
                        <option value="{{$sex->id}}"{{$student->sex_id==$sex->id? 'selected': null}}>{{$sex->sex}}</option>
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
@endsection
