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
</head>
<body>
    <div class="container">

        <div class="style">
        <header>
            <h1>
                <a href="index.html" title="Go back to the home">
                    CheckMX - The fast DNS checking service
                </a>
            </h1>
        </header>
                <main>
                    
                    <form method="POST" enctype="multipart/form-data" action="{{route('txtlookup')}}">
                        @csrf
                      <div class="row">
                          <div class="col-md-6 col-sm-9">
                              <input type="text" name="query" placeholder="google.com" class="form-control">
                          </div>
                          <div class="three columns">
                            <input class="button-primary u-full-width" type="submit" value="Lookup" name="submit">
                        </div>
                      </div>
                      </form>

                   
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


                      <p>Start your query with the type of lookup as prefix. Accepted prefixes are :</p>
                   <div class="col-md-7">
                       <ul class="tags">
                        <li><a href="{{route('ptr')}}" title="Check for the PTR Record." class="button button-primary">ptr:</a></li>
                        <li><a href="{{route('ns')}}" title="Check for the NameServers Record." class="button button-primary">ns:</a></li>
                        <li><a href="{{route('a')}}" title="Check for the A Record." class="button button-primary">a:</a></li>
                        <li><a href="{{route('aaaa')}}" title="Check for the AAAA Record." class="button button-primary">aaaa:</a></li>
                        <li><a href="{{route('mx')}}" title="Check for the MX Record." class="button button-primary">mx:</a></li>
                        <li><a href="{{route('txt')}}" title="Check for the TXT Record." class="button button-primary">txt:</a></li>
                        <li><a href="{{route('spf')}}" title="Check for the SPF Record." class="button button-primary">spf:</a></li>
                        <li><a href="{{route('dkim')}}" title="Check for the DKIM Record." class="button button-primary">dkim:</a></li>
                        <li><a href="{{route('dmarc')}}" title="Check for the DMARC Record." class="button button-primary">dmarc:</a></li>
                    </ul> 
                </div>
                     
                </main>
            </div>
        </div>
</body>

</html>