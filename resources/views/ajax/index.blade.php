@extends('layouts.app')

@section('content')
    @include('ajax.addStudent')
    @include('ajax.updateStudent')
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <div class="panel-default">
                    <div class="panel-heading">Dashboard
                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">+Student</button>
                        <button class="btn btn-info pull-right btn-xs" id="read_data">Load data</button>
                    </div>
                    <div class="panel-body">
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

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">

            $(document).ready(function(){

                $("#read_data").click(function(){

                   $.get("{{URL::to('/student/read-data')}}",function(data){
                       $('#student-info').empty().html(data);
                       return data;

                   })
                });




                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });


        //------- add student----------
             $('#form-insert').on('submit',function(e){

                e.preventDefault();

                var data = $(this).serialize();
                var url = $(this).attr('action');
                var post = $(this).attr('method');
                $.ajax({

                    type:post,

                    url:url,
                    data:data,
                    dataType:'json',
                    success:function(data)
                    {
                        var tr = $('<tr/>',{
                            id:data.id
                        });
                        tr.append($("<td>",{
                            text:data.id
                        })).append($("<td>",{
                            text:data.first_name
                        })).append($("<td>",{
                            text:data.last_name
                        })).append($("<td>",{
                            text:data.sex
                        })).append($("<tr/>",{
                            html :' <a href="#"' +
                            ' class="btn btn-info btn-xs" id="view" data-id="'+data.id+'">View</a>'
                             +'<a href="#" class="btn btn-success btn-xs" id="edit" data-id="'+data.id+'">Edit</a>'
                        +'<a href="#" class="btn btn-danger btn-xs del" id="del" data="' +data.id+ '">Delete</a>'}));


                        $("#student-info").append(tr);


                    }
                })

              });
             //-----delite---//


            });

            //----------delete student-----/
           $('body').delegate('#student-info #del','click',function(e){
               var id= $(this).attr('data');


               $.post('{{URL::to("student/destroy")}}',{id:id},function(data){

                   $('tr#'+id).remove();
               })
           })


            //---------edit student-----
            $('body').delegate('#student-info #edit','click',function(e){
                var id = $(this).attr('data');
                $.get("{{URL::to('/student/edit')}}",{id:id},function (data) {

                    $("#form-update").find('#first-name').val(data.first_name);
                    $("#form-update").find('#last-name').val(data.last_name);
                    $("#form-update").find('#sex_id').val(data.sex_id);
                    $("#form-update").find('#id').val(data.id);
                    $("#student-update").modal('show');
                })

                //------update student------
                $("#form-update").on('submit',function(e){
                    e.preventDefault();
                    var data = $(this).serialize();

                    var url = $(this).attr('action');
                    $.post(url,data,function (data) {

                        $("form-update").trigger('reset')

                        var tr = $('<tr/>',{
                            id:data.id
                        });
                        tr.append($("<td>",{
                            text:data.id
                        })).append($("<td>",{
                            text:data.first_name
                        })).append($("<td>",{
                            text:data.last_name
                        })).append($("<td>",{
                            text:data.sex
                        })).append($("<tr/>",{
                            html :' <a href="#"' +
                            ' class="btn btn-info btn-xs" id="view" data-id="'+data.id+'">View</a>'
                            +'<a href="#" class="btn btn-success btn-xs" id="edit" data-id="'+data.id+'">Edit</a>'
                            +'<a href="#" class="btn btn-danger btn-xs del" id="del" data="' +data.id+ '">Delete</a>'}));


                        $("#student-info tr#"+data.id).replaceWith(tr);

                    })
                })

            })
        </script>
    </div>

    @endsection

