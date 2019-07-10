@include('admin.layout.header')
<!-- Sidebar -->

<main class="page-content">
  <h2>Add Employee</h2>
  <form action="{{route('employee.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
      <div class="col-md-4">
          <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" name="name" required class="form-control" id="name">
            </div>
      </div>
      <div class="col-md-4">
          <div class="form-group">
              <label for="address">Address:</label>
              <input type="text" name="address" required class="form-control" id="address">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="dob">Date of Birth:</label>
                <input type="date" name="dob" required class="form-control" id="dob">
              </div>
          </div>
          <div class="col-md-4">
              <div class="form-group">
                  <label for="exampleFormControlSelect1">Select Department</label>
                  <select class="form-control" name="department_id" id="department_id">
                    @foreach($department as $dpt)
                  <option value="{{$dpt->id}}">{{$dpt->title}}</option>
                    @endforeach
                  </select>
                </div>
          </div>
          <div class="col-md-4">
              <div class="form-group">
                  <label for="mobile">Mobile:</label>
                  <input type="text" name="mobile_no" required class="form-control" id="mobile">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="mobile">Gender:</label><br>
                     <div class="inline">         
                        <label class="radio-inline"><input type="radio" name="gender" value="male"> Male<br></label>
                        <label class="radio-inline"><input type="radio" name="gender" value="female"> female<br></label>
                        <label class="radio-inline"><input type="radio" name="gender" value="others"> others<br></label>
                      </div>
                  </div>
              </div>
              <div class="col-md-4">
                  <div class="form-group">
                      <label for="mobile">Join Date:</label>
                      <input type="date" name="join_date" required class="form-control" id="join_date">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group row">
                        <div class="col-md-4">
                        <label for="image">Upload Image</label>
                        <input type="file" class="form-control-file" name="image" id="image">
                        </div>  
                        <div class="col-md-6">  
                        <img id="display_image" src="{{asset('uploads/employees/employee.jpg')}}" alt="your image" height="60px" width="60px" />
                      </div>
                  </div>
                </div>
            </div>
           

   
      
    
    <div class="form-group">
      <label for="about">About:</label>
      <textarea class="form-control" required name="about" id="description"></textarea>
    </div>
    <input type="hidden" name="status" value="0">
    <button type="submit" class="btn btn-success">Submit</button>
  </form>
  <hr>
  <h3>Employees</h3>
  <table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
      <tr>
        <th>S.No</th>
        <th>Name</th>
        <th>Address</th>
        <th>Gender</th>
        <th>Mobile no</th>
        <th>DOB</th>
        <th>JOin Date</th>
        <th>Image</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($employee as $d)
      <tr>
        <td>{{$loop->index+1}}</td>
        <td>{{$d->name}}</td>
        <td>{{$d->address}}</td>
        <td>{{$d->gender}}</td>
        <td>{{$d->mobile_no}}</td>
        <td>{{$d->dob}}</td>
        <td>{{$d->join_date}}</td>
        
        <td><img id="display_image" src="{{asset($d->image)}}" alt="your image" height="60px" width="60px" /></td>
       
        <td>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal{{$d->id}}">
            Edit
          </button>

          <!-- The Modal -->
          <div class="modal fade" id="myModal{{$d->id}}">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Modal Heading</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="{{route('employee.update',$d->id)}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" name="name" value="{{$d->name}}" required class="form-control" id="name">
                              </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="address">Address:</label>
                                <input type="text" name="address" value="{{$d->address}}" required class="form-control" id="address">
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label for="dob">Date of Birth:</label>
                                  <input type="date" name="dob" value="{{$d->dob}}" required class="form-control" id="dob">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Select Department</label>
                                    <select class="form-control" name="department_id" id="department_id">
                                      @foreach($department as $dpt)
                                    <option @if($d->department_id == $dpt->id) selected @endif   value="{{$dpt->id}}">{{$dpt->title}}</option>
                                      @endforeach
                                    </select>
                                  </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="mobile">Mobile:</label>
                                    <input type="text" name="mobile_no" value="{{$d->mobile_no}}" required class="form-control" id="mobile">
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label for="mobile">Gender:</label><br>
                                       <div class="inline">         
                                          <label class="radio-inline"><input type="radio" name="gender" @if($d->gender == 'male') checked @endif value="male"> Male<br></label>
                                          <label class="radio-inline"><input type="radio" name="gender" @if($d->gender == 'female') checked @endif value="female"> female<br></label>
                                          <label class="radio-inline"><input type="radio" name="gender" @if($d->gender == 'others') checked @endif value="others"> others<br></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="mobile">Join Date:</label>
                                        <input type="date" name="join_date" required class="form-control" value="{{$d->join_date}}" id="join_date">
                                      </div>
                                  </div>
                                  <div class="col-md-8">
                                      <div class="form-group row">
                                          <div class="col-md-4">
                                          <label for="image">Upload Image</label>
                                          <input type="file" class="form-control-file" name="image" id="image1">
                                          </div>  
                                          <div class="col-md-6">  
                                          <img id="display_image1" src="{{asset($d->image)}}" alt="your image" height="60px" width="60px" />
                                        </div>
                                    </div>
                                  </div>
                              </div>
                       
                      
                              <div class="form-group">
                                <label for="about">About:</label>
                                <textarea class="form-control" required name="about" id="edit_description">
                                  {!! $d->about !!}
                                </textarea>
                              </div>
                              <button type="submit" class="btn btn-success">Update</button>
                            </form>


                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>

              </div>
            </div>
          </div>
          <a href="{{route('employee.delete',$d->id)}}" class="btn btn-danger">Delete</a>
        </td>

      </tr>
      @endforeach

    </tbody>

  </table>


</main>


</div>

{{-- for photo preview --}}
<script>
  $(document).ready(function() {
    $('#example').DataTable();
} );

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#display_image').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]);
  }
}

$("#image").change(function() {
  readURL(this);
});

function readURL1(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#display_image1').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]);
  }
}

$("#image1").change(function() {
  readURL1(this);
});


</script>


@include('admin.layout.footer')