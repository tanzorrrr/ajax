@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <div class="panel-default">
                    <div class="panel-heading">Pagination</div>
                    <div class="panel-body">
                        @include('ajax.studentPage')


                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection

@section('script')
    <script>
        $(document).on('click','.pagination a',function (e) {
            e.preventDefault();
            var page =$(this).attr('href'),split('page=')[1];\

            alert(page);

        })
    </script>

    @endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).on('click','.pagination a',function (e) {
        e.preventDefault();
        var page =$(this).attr('href').split('page=')[1];

            readPage(page);

    })

    function readPage(page)
    {
        $.ajax({
            url :'/student/page/ajax?page='+page
        }).done(function(data){
            console.log(data)
        })
    }
</script>

