<!DOCTYPE html>
<html>
 <head>
  <title>Laravel Autocomplete using Jquery</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
   .box{
    width:600px;
    margin:0 auto;
   }
  </style>
 </head>
 <body>
  <br />
  <div class="container box">
   <h3 align="center">Laravel Autocomplete using Jquery</h3><br />
   
   <div class="form-group">
    <input type="text" name="category_name" id="category_name" class="form-control input-lg" placeholder="Enter Country Name" />
    <div id="categoryList">
    </div>
   </div>
   {{ csrf_field() }}
  </div>
 </body>
</html>

<script>
$(document).ready(function(){

 $('#category_name').keyup(function(){ 
        var query = $(this).val();
        if(query != '')
        {
         var _token = $('input[name="_token"]').val();
         $.ajax({
          url:"{{ url('category/getCategory') }}",
          method:"POST",
          data:{query:query, _token:_token},
          success:function(data){
           $('#categoryList').fadeIn();  
                    $('#categoryList').html(data);
          }
         });
        }
    });

    $(document).on('click', 'li', function(){  
        $('#category_name').val($(this).text());  
        $('#categoryList').fadeOut();  
    });  

});
</script>