<table class="table table-bordered table-striped table-condensed">
    <thead>
    <tr>
        <th>Id</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>sex</th>
        <th>Ection</th>
    </tr>
    </thead>
    <tbody id="student-info">
    @foreach($students as $value)
        <tr id="{{$value->id}}">
            <td>{{$value->id}}</td>
            <td>{{$value->first_name}}</td>
            <td>{{$value->last_name}}</td>
            <td>{{$value->sex}}</td>
            <td>
                <a href="#" class="btn btn-info btn-xs" id="view" data="{{$value->id}}">View</a>
                <a href="#" class="btn btn-success btn-xs" id="edit" data="{{$value->id}}">Edit</a>
                <a href="#" class="btn btn-danger btn-xs del" id="del" data="{{$value->id}}">Delete</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{$students->render()}}