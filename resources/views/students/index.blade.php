@extends('layouts.app')

@section('content')
<div class="container">
    <div class="panel panel-default">
    <div class="panel-heading">Student-list</div>
    <div class="panel-body">
    <div class="">

        <h1>Student List</h1>
        <hr>
        <a href="{{route('students.create')}}">New student</a>
        <hr>
        @if(session('status'))
            <h1>{{session('status')}}</h1>
        @endif
        <form action="{{route('students.store')}}" method="POST">

            {{ csrf_field() }}
            <table>
                <thead>
                <tr>
                    <th>Shecbox</th>
                    <th>ID</th>
                    <th>Photo</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Sex</th>
                    <th>Ection</th>
                    <th>ection</th>
                </tr>
                </thead>
                <tbody>

                @foreach($students as $stu)

                    <tr>
                        <td>
                            <input type="checkbox" name="mult_id[]" value="{{$stu->id}}">
                        </td>
                        <td>{{$stu->id}}</td>
                        <td><img src="http://127.0.0.1:8000/photo/{{$stu->photo}}" class="img-thumbnail" alt=""></td>
                        <td><a href="{{route('students.show',$stu)}}">{{$stu->first_name}}</a></td>
                        <td>{{$stu->last_name}}</td>

                        <td>
                            {{$stu->sex}}
                        </td>
                        <td><a href="{{route('students.edit',$stu)}}">Edit</a></td>
                    <!-- <form method="POST" action="{{route('students.destroy',$stu->id)}}"  style="display: inline;">
                                {{ csrf_field() }}
                    {{method_field('DELETE')}}
                            <input type="text" value="{{$stu->id}}">
                                <input type="submit" value="Delit">
                            </form>-->
                        <td><a href="{{URL::to('student/delete',$stu)}}" class="btn btn-danger btn-xs">Delete</a></td>

                    </tr>
                @endforeach
                </tbody>
            </table>
            <input type="submit" value="Delete Bu checbox">
        </form>
        <hr>
        {{$students->render()}}
    </div>
</div>
    </div>
</div>

@endsection