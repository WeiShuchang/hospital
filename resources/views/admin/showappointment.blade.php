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

          <form action="{{ route('appointments.search') }}" method="GET">
    <input type="text" name="query" placeholder="Search appointments" style="color: black;">
    <button type="submit">Search</button>
      </form>

          <table >
            <tr style="background-color:skyblue;" >
              <th style="padding:10px; font-size: 20px; color: white;">Customer Name</th>
              <th style="padding:10px; font-size: 20px; color: white;">Email</th>
              <th style="padding:10px; font-size: 20px; color: white;">Phone</th>
              <th style="padding:10px; font-size: 20px; color: white;">Doctor Name</th>
              <th style="padding:10px; font-size: 20px; color: white;">Date</th>
              <th style="padding:10px; font-size: 20px; color: white;">Time</th>
              <th style="padding:10px; font-size: 20px; color: white;">Status</th>
              <th style="padding:10px; font-size: 20px; color: white;">Approve</th>
              <th style="padding:10px; font-size: 20px; color: white;">Cancel</th>
            </tr>

            @foreach($data as $appoint)
            <tr style="background-color:#A7A7A7;" align="Center">
              <td style="padding:10px; color: white;">{{$appoint->name}}</td>
              <td style="padding:10px; color: white;">{{$appoint->email}}</td>
              <td style="padding:10px; color: white;">{{$appoint->phone}}</td>
              <td style="padding:10px; color: white;">{{$appoint->doctor}}</td>
              <td style="padding:10px; color: white;">{{$appoint->date}}</td>
              <td style="padding:10px; color: white;">{{$appoint->message}}</td>
              <td style="padding:10px; color: white;">{{$appoint->status}}</td>
              <td><a href="{{url('approved',$appoint->id)}}" onclick="return confirm('Are you sure to Approve this?')" class="bt btn-success">Approve</a></td>
              <td><a href="{{url('canceled',$appoint->id)}}" onclick="return confirm('Are you sure to Cancel this?')" class="bt btn-danger">Cancel</a></td>
            </tr>
            @endforeach
          </table>

          {{$data->links()}}

        </div>
      </div>
          
    </div>
    <!-- container-scroller -->
    @include('admin.script')
  </body>
</html>