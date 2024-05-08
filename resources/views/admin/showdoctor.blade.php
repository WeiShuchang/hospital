<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
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

        <div align="Center" style="padding: 70px;">
        <form action="{{ route('doctors.search') }}" method="GET">
        <input type="text" name="query" placeholder="Search Doctor" style="color: black;">
        <button type="submit">Search</button>
        </form>
        <br>
          <table >
            <tr  style="background-color:skyblue;" >
              <th style="padding:10px; font-size: 20px; color: white;">Doctor Name</th>
              <th style="padding:10px; font-size: 20px; color: white;">Phone</th>
              <th style="padding:10px; font-size: 20px; color: white;">Specialization</th>
              <th style="padding:10px; font-size: 20px; color: white;">Room No</th>
              <th style="padding:10px; font-size: 20px; color: white;">Image</th>
              <th style="padding:10px; font-size: 20px; color: white;">Delete</th>
              <th style="padding:10px; font-size: 20px; color: white;">Update</th>
            </tr>

            @foreach($data as $doctor)
            <tr style="background-color:#A7A7A7;" align="Center">
              <td style="padding:10px; color: white;">{{$doctor->name}}</td>
              <td style="padding:10px; color: white;">{{$doctor->phone}}</td>
              <td style="padding:10px; color: white;">{{$doctor->speciality}}</td>
              <td style="padding:10px; color: white;">{{$doctor->room}}</td>
              <td style="padding:10px; color: white;"><img src="doctorimage/{{$doctor->image}}" height="100" width="100"></td>
              <td><a href="{{url('deletedoctor',$doctor->id)}}" class="bt btn-danger" onclick="return confirm('are you sure to delete this?')">Delete</a></td>
              <td><a href="{{url('updatedoctor',$doctor->id)}}" class="bt btn-success">Update</a></td>
              
            </tr>
            @endforeach
          </table>
          <div align="Center" style="padding: 70px;">
          {{$data->links()}}
          </div>
        </div>
      </div>
          
    </div>
    <!-- container-scroller -->
    @include('admin.script')



    <script type="text/javascript">
      
      $("document").ready(function(){
    setTimeout(function(){
       $("div.alert").remove();
    }, 4000 ); // 4 secs

});
    </script>
  </body>
</html>