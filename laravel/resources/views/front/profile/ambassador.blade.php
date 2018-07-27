<center><h2>AWARDS/CERTIFICATES</h2></center>
@if(count($certifications)>0)
<div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th>Year</th>
        <th>Title</th>
        <th>Description</th>
        
        <th>Download Link</th>
        
      </tr>
    </thead>
    <tbody>
      <tr>
          <td>{{ $certifications->year }}</td>         
          <td>{{ $certifications->title }}</td>
        <td>{{ $certifications->description }}</td>      
        <td>
<a href="{{ url('uploads/users/'.$certifications->file) }}" download="{{$certifications->file}}" class="btn btn-primary"><i class="fa fa-download" aria-hidden="true"></i> Download</a></td>
        
      </tr>

    </tbody>
  </table>
  </div>
@else
<div class="bg-warning">Sorry, there is no certificate added yet</div>
@endif

