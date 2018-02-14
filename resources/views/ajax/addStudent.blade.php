
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">New Student</h4>
            </div>
            <form action="{{URL::to('/student/store')}}" method="POST" id="form-insert">
                <div class="modal-body">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="">First name</label>
                            <input type="text" name="first_name" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="">Last Name</label>
                            <input type="text" name="last_name" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="">Sex</label>
                            <select name="sex_id" id="sex_id" class="form-control">
                                <option value="">-----------</option>
                                @foreach($sexes as $key =>$sex)
                                    <option value="{{$key}}">{{$sex}}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" id="submit">save</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>

           </form>
        </div>
    </div>
 </div>
</div>