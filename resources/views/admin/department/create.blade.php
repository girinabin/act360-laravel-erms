@include('admin.layout.header')
<!-- Sidebar -->

<main class="page-content">
    <h2>Add Department</h2>
        <form action="{{route('department.store')}}" method="POST">
            @csrf
            <div class="form-group">
            <label for="title">Title:</label>
            <input type="title" name="title" required class="form-control" id="title">
            </div>
            <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" required name="description" id="description"></textarea>
            </div>
            <input type="hidden" name="status" value="0">
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
<hr>
            <h3>Departments</h3>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($department as $d)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$d->title}}</td>
                        <td>{!! $d->description !!}</td>
                        <td>
                        <a href="{{route('department.status',$d->id)}}">
                                 @if($d->status)
                                 <button class="btn btn-success">Active</button>   
                                 @else
                                 <button class="btn btn-warning">InActive</button>   
                                @endif
                                </a>
                        </td>
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
                                                <form action="{{route('department.update',$d->id)}}" method="POST">
                                                        @csrf
                                                        <div class="form-group">
                                                                <label for="title">Title:</label>
                                                                <input type="title" name="title" value={{$d->title}} required class="form-control" id="title">
                                                                </div>
                                                                <div class="form-group">
                                                                <label for="description">Description:</label>
                                                                <textarea class="form-control" required name="description" id="edit_description">
                                                                        {!! $d->description !!}
                                                                </textarea>
                                                                </div>
                                                                <input type="hidden" name="status" value="{{$d->status}}">
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
                                <a href="{{route('department.delete',$d->id)}}" class="btn btn-danger">Delete</a>
                        </td>

                    </tr>
                    @endforeach

                </tbody>
                
            </table>
        
    
      </main>

    
    </div>

<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
      
@include('admin.layout.footer')

