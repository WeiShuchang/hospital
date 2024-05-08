<!DOCTYPE html>
<html lang="en">
<head>
  <base href="/public">
  @include('admin.css')
  <style type="text/css">
    body {
      color: black; /* Set text color to black */
    }
    label {
      display: inline-block;
      width: 200px;
      color: black; /* Set label text color to black */
    }
    /* Set the width of input fields */
    input[type="text"],
    input[type="number"],
    select,
    input[type="file"] {
      width: calc(100% - 200px); /* Adjust based on label width */
      padding: 5px;
      margin: 5px 0;
      color: black; /* Set input text color to black */
      background-color: white; /* Set background color to white */
    }
  </style>
</head>
<body>
  <div class="container-scroller">
     
    <!-- partial:partials/_sidebar.html -->
    @include('admin.sidebar')
    <!-- partial -->
    @include('admin.navbar')
      <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      
      <div class="container" align="container" style="padding-top: 100px;">
        @if(session()->has('message'))
        <div class="alert alert-success">
          {{session()->get('message')}}
        </div>
        @endif
        <form action="{{url('editdoctor',$data->id)}}" method="post" enctype="multipart/form-data">
          @csrf
          <div style="padding: 15px;">
            <label style="color: white;">Doctor Name</label>
            <input type="text" name="name" value="{{$data->name}}">
          </div>
          <div style="padding: 15px;">
            <label style="color: white;">Phone Number</label>
            <input type="number" name="phone" value="{{$data->phone}}" required>
          </div>
          <div style="padding: 15px;">
            <label style="color: white;">Specialization</label>
            <select name="speciality" required>
              <option>--Select--</option>
              <option value="Dermatology">Dermatology</option>
              <option value="Cardiology">Cardiology</option>
              <option value="Ophthalmology">Ophthalmology</option>
              <option value="Oncology">Oncology</option>
            </select>
          </div>
          <div style="padding: 15px;">
            <label style="color: white;">Room No</label>
            <input type="text" name="room" value="{{$data->room}}" required>
          </div>
          <div style="padding: 15px;">
            <label style="color: white;">Old Image</label>
            <img height="200" width="200" src="doctorimage/{{$data->image}}" style="background-color: white;">
          </div>
          <div style="padding: 15px;">
            <label style="color: white;">Change Image</label>
            <input type="file" name="file">
          </div>
          <div style="padding: 15px;">
            <input type="submit" class="btn btn-success">
          </div>
        </form>
      </div>
    </div>  
  </div>
  <!-- container-scroller -->
  @include('admin.script')
  <script type="text/javascript">
    $("document").ready(function(){
      setTimeout(function(){
        $("div.alert").remove();
      }, 4000); // 4 seconds
    });
  </script>
</body>
</html>
