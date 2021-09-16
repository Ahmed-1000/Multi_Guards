<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale = 1.0">
        <title>Dashboard | admin</title>
          <!-- Scripts -->
    <script src="http://127.0.0.1:8000/js/app.js" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="http://127.0.0.1:8000/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-6" style="margin-top: 45px">
                    @if(Session::get('status'))
                     <div class="alert alert-success">
                      
                              {{ Session::get('status') }}
                         </div>
                    @endif
                     <form action="{{ route('admin.search') }}" method="get">
                        <input class="form-control mr-sm-2" type="search" name="query" placeholder="type to search">
                        <button class="btn btn-outline my-2 my-sm-0" type="submit">search</button>
                    </form>
                    <h4>Admin Dashboard</h4><hr>
                   
                    <table class=" table table-striped table-inverse table-responsive">
                        <thead class="thead-inverse">
                            <tr>
                                <td>Name</td>
                                <td>Phone</td>
                                <td>Email</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                             <tr>
                                 <td scope="row">{{Auth::guard('admin')->user()->name}}</td>
                                 <td>{{Auth::guard('admin')->user()->email}}</td>
                                 <td>{{Auth::guard('admin')->user()->phone}}</td>
                                 <td>
                                      <a href="{{route('admin.logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">logout</a>
                                      <form action="{{route('admin.logout')}}" method="post" class="d-none" id="logout-form">@csrf</form>
                                 </td>
                                
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    
    </body>

</html>