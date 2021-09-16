<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale = 1.0">
     
      <title>user |Dashboard</title>
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
               <div class="col-md-6 offset-md-3" style="margin-top: 45px;">
                <h4>user Dashboard</h4><hr>
                <table class="table table-striped table-inverse table-responsive">
                    <thead class="thead-inverse">
                       <tr>
                          <th>Name</th>
                           <th>Email</th>
                            <th>Action</th>
                       </tr>
                    </thead>
                    <tbody>
                         <tr>
                           <td>{{Auth::guard('web')->user()->name}}</td>
                           <td>{{Auth::guard('web')->user()->email}}</td>
                           <td>
                               <a href="{{route('user.logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">logout</a>
                               <form action="{{route('user.logout')}}" method="post" class="d-none" id="logout-form">@csrf</form>
                             
                           </td>     
                        </tr>
                    
                    </tbody>
                    
                </table>
                
                
                </div>
               
             </div>
            
           </div> 
           
        
        
        
    
    
    
    
    
    </body>
</html>