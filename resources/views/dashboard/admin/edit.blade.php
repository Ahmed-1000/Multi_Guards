<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale = 1.0">
     
      <title>edit</title>
       <!-- Scripts -->
    <script src="http://127.0.0.1:8000/js/app.js" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="http://127.0.0.1:8000/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
  </head>
    <body style="background-color:#6a9399!important">
        <div class="container">
             <div class="row">
                <div class="col-md-4 offset-md-4" style="margin-top: 45px;">
                 <h1>edit </h1><hr>
                  <form action="{{url('admin/update/'.$student->id)}}" method="post">
                    {{ csrf_field() }}
                   @method('PUT')
                   
                      <div class="form-group">
                         <label for="email">Email</label>
                          <input type="text" class="form-control" name="email" placeholder="Enter your emali" value="{{ $student->email }}">
                            
                      </div>
                      <div class="form-group">
                         <label for="password">password</label>
                          <input type="text" class="form-control" name="name" placeholder="Enter your password" value="{{ $student->name}}">
                            
                      </div>
                       <div class="form-group">
                          <button type="submit" class="btn btn-primary">update</button>
                      
                      </div>
                      
                    </form>    
                 
                 
                 
                 
                 
                 
                 </div>
            
            
            
            
            
            </div>
        
        
        
        </div>
    
    
    
    
    
    </body>






</html>