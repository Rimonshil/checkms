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
                    
                    <form method="get" enctype="multipart/form-data" action="{{route('alllookup')}}">
                        @csrf
                      <div class="row">
                          <div class="col-md-6 col-sm-9">
                              <input type="text" name="query" placeholder="google.com" class="form-control">
                          </div>
                          <div class="col-md-3 col-sm-3">
                            <select name="prefix" id="" class="form-control">
                                <option value="" selected>select prefix</option>
                                <option value="DNS_ANY">ALL</option>

                                <option value="DNS_PTR">PTR</option>
                                <option value="DNS_NS">NS</option>
                                <option value="DNS_A">A</option>
                                <option value="DNS_AAAA">AAAA</option>
                                <option value="DNS_MX">MX</option>
                                <option value="DNS_TXT">TXT</option>
                                <option value="DNS_SPF">SPF</option>
                                <option value="DNS_DKIM">DKIM</option>
                                <option value="DNS_DMARC">DMARC</option>
                            </select>
                        </div>
                          <div class="col-md-3 col-sm-3">
                            <input class="button-primary u-full-width" type="submit" value="Lookup" name="submit">
                        </div>
                      </div>
                      </form>
                      <?php 
                       if(isset($_GET['submit'])) {
                           $query = $_GET['query']; 
                           $prefix = $_GET['prefix']; 

                           if($query && $prefix == NULL){
                               echo "Please provide a valid query.";
                           }
                        
                        }
                      
                      ?>


                      @foreach ($result as $item)
                      <div class="results">
                        <ul>
                            {{-- <li>{{$item->txt}}</li>
                            <li>{{$item->host}}</li>
                            <li>{{$item->ttl}}</li>
                            <li>{{$item->class}}</li> --}}
                            <?php if($item->type == 'TXT'){ ?>
                               <li>{{$item->txt}}  </li>
                           <?php }?>     
                           
                           <?php if($item->type == 'MX'){ ?>
                            <li>{{$item->pri}} - {{$item->target}}</li>
                        <?php }?> 

                        <?php if($item->type == 'NS'){ ?>
                            <li>{{$item->target}}</li>
                        <?php }?> 

                        <?php if($item->type == 'A'){ ?>
                            <li>{{$item->ip}}</li>
                        <?php }?> 

                        <?php if($item->type == 'AAAA'){ ?>
                            <li>{{$item->ipv6}} </li>

                        <?php }?>

                        <?php if($item->type == 'PTR'){ ?>
                            <li>{{$item->target}}</li>
                        <?php }?>

                        </li>
                        </ul>                          

                    </div>
                          
                      @endforeach


                </main>


    </div>
</body>



</html>