<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Check mx</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="{{asset('asset/css/main.css')}}">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<body>
    <div class="container">
        <header>
            <h1>
                <a href="index.html" title="Go back to the home">
                    CheckMX - The fast DNS checking service
                </a>
            </h1>
        </header>
                <main>
                    
                    <form  class="form-group" method="post" action="{{route('mxlookup')}}" enctype="multipart/form-data"> 
                        @csrf
                      <div class="row">
                          <div class="col-md-8 col-lg-8 col-sm-8">
                              <input type="text" name="query" placeholder="mx:google.com" class="form-control">
                          </div>
                          <div class="col-md-4 col-lg-4 col-sm-4">
                            <input class="btn btn-primary" type="submit" value="lookup">
                        </div>
                      </div>
                      </form>

                      @foreach ($result as $item)
                      <div class="results">
                        <ul>

                            <li>{{$item->ip}}</li>
                        

                        
                        </li>
                        </ul>                          

                    </div>
                          
                      @endforeach


                </main>


    </div>
</body>



</html>