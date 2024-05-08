<!DOCTYPE html>
<html lang="en">
<head>
  @include('admin.css')
  <style type="text/css">
    body {
      color: black; /* Set text color to black */
    }
    label {
      display: inline-block;
      width: 200px;
      color: white;
    }
    /* Set the width of input fields */
    input[type="text"],
    input[type="number"],
    select,
    input[type="file"] {
      width: calc(100% - 200px); /* Adjust based on label width */
      padding: 5px;
      margin: 5px 0;
      color: black; /* Set text color to black */
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
    
    <div class="main-panel">
      <div class="content-wrapper">
        @if(session()->has('message'))
        <div class="alert alert-success">
          {{session()->get('message')}}
        </div>
        @endif
        <form action="{{url('upload_doctor')}}" method="post" enctype="multipart/form-data">
          @csrf
          <div style="padding: 15px;">
            <label>Doctor Name</label>
            <input type="text" name="name" placeholder="Doctor Name">
          </div>
          <div style="padding: 15px;">
            <label>Phone</label>
            <input type="number" name="phone" placeholder="Phone Number" required>
          </div>
          <div style="padding: 15px;">
            <label>Specialization</label>
            <select name="speciality" required>
              <option>--Select--</option>
              <option value="Dermatology">Dermatology</option>
              <option value="Cardiology">Cardiology</option>
              <option value="Ophthalmology">Ophthalmology</option>
              <option value="Oncology">Oncology</option>
            </select>
          </div>
          <div style="padding: 15px;">
            <label>Room No</label>
            <input type="text" name="room" placeholder="Room Number" required>
          </div>
          <div style="padding: 15px;">
            <label>Doctor Image</label>
            <input type="file" name="file" required>
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
