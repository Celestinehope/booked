<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Booked-A World of Literature</title>
  <meta content="" name="description">
  <meta content="" name="keywords">


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
 
<form method="POST" action="{{ route('submitOrder') }}">
 
 
        

        
       @csrf
      
       
  <div class="col-12">
    <label for="inputAddress" class="form-label">Book Name</label>
    <input type="text" class="form-control" id="inputAddress" name="book_name" value="{{ $borrow['book_name'] }}" disabled>
  </div>

  <div class="col-12">
    <label for="inputAddress" class="form-label">Book Description</label>
    <input type="text" class="form-control" id="inputAddress" value="{{ $borrow['book_description'] }}" disabled>
  </div>

  <div class="col-12">
    <label for="inputAddress" class="form-label">Book Author</label>
    <input type="text" class="form-control" id="inputAddress" value="{{ $borrow['book_author'] }}" disabled>
  </div>

  <div class="col-12">
    <label for="inputAddress" class="form-label">Host</label>
    <input type="text" class="form-control" id="inputAddress" value="{{ $borrow['vendor_name'] }}" disabled>
  </div>

  <div class="col-12">
    <label for="inputAddress" class="form-label">Cost</label>
    <input type="number" class="form-control" id="inputAddress" name="book_price" value="20" disabled>

  </div>

  <div class="col-12">
    <label for="inputAddress" class="form-label">Cost</label>
    <input type="text" name="date" value="{{ $futureDate }}" disabled>

  </div>
  
                                   <input type="hidden" name="book_id" value="{{ $borrow['book_id'] }}">
                                    <!--<input type="hidden" name="quantity" value="1">-->
                                    <input type="hidden" name="type" value="borrowed">


  

                                

                                    

    

  <button type="submit" class="btn btn-primary"><a class="btn btn-outline-dark mt-auto" href="{{route('add_to_cart',['book_id' => $borrow['book_id'], 'type' => 'borrowed', 'cost' => 20])}}">
                                <i class="bi-cart-fill me-1"></i>
                               
                                
                                Buy book
                                </a></button>


  
</form>

        
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>