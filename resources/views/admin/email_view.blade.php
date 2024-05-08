<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public">
    @include('admin.css')
    <style type="text/css">
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-top: 15px;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding-top: 100px;
        }

        h1 {
            text-align: center;
            font-size: 25px;
            margin-bottom: 20px;
        }

        .alert {
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 4px;
            color: #31708f;
            background-color: #d9edf7;
            border: 1px solid #bce8f1;
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
        <div class="container">
            <h1>Send Email to {{$data->email}}</h1>
            @if(session()->has('message'))
            <div class="alert alert-success">
                {{session()->get('message')}}
            </div>
            @endif
            <form action="{{url('sendemail',$data->id)}}" method="post">
                @csrf
                <div>
                    <label for="greeting">Greeting:</label>
                    <textarea id="greeting" name="greeting" placeholder="Enter a greeting" rows="4" style="color: black;" required></textarea>
                </div>
                <div>
                    <label for="body">Body:</label>
                    <textarea id="body" name="body" placeholder="Enter body text" rows="8" style="color: black;" required></textarea>
                </div>
                <div>
                    <label for="endpart">End Part:</label>
                    <textarea id="endpart" name="endpart" placeholder="Enter closing text" rows="4" style="color: black;" required></textarea>
                </div>
                <div>
                    <input type="submit" value="Send Email" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- container-scroller -->
@include('admin.script')
<script type="text/javascript">
    $(document).ready(function(){
        setTimeout(function(){
            $("div.alert").remove();
        }, 4000 ); // 4 seconds
    });
</script>
</body>
</html>
