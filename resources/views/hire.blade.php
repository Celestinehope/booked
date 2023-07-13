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
 
<form method="POST" action="{{ route('submit-order') }}">
  <div class="form-group">
  @if(session('borrow'))
    @foreach(session('borrow') as $id=> $need)     

        
       @csrf

       <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  placeholder="{{$need['product_name']}}" disabled>
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  
  <div class="col-12">
    <label for="inputAddress" class="form-label">Book Name</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="{{$need['product_name']}}" disabled>
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label">Host</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="Host name" disabled>
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label">Cost</label>
    <input type="number" class="form-control" id="inputAddress" value="20" disabled>
    <small id="emailHelp" class="form-text text-muted">Borrowing a book costs kshs.20 per book borrowed</small>
    <small id="emailHelp" class="form-text text-muted">The standard timeline given for borrowing a book is 14 days</small>
    <small id="emailHelp" class="form-text text-muted">Card used to pay with will be on hold until book is returned</small>
    <small id="emailHelp" class="form-text text-muted">Failure to return book on time will result in a fine of 100 per day</small>
  </div>

                                <!--<label for="date">Select a Start Date:</label>
                                  <input type="date" id="date" name="date" >-->
                                
                                  <label for="date"> End Date:</label>
                                  <input type="date" id="date" name="date" value="{{ old('date', $futureDate) }}" disabled>

                                  <input type="hidden" name="product_id" value="{{ $id }}">
                                    <input type="hidden" name="product_name" value="{{$need['product_name']}}">
                                    <input type="hidden" name="product_price" value="20 ">
                                    <input type="hidden" name="product_quantity" value="1">
                                    <input type="hidden" name="type" value="borrowed">
                                    

    

  <button type="submit" class="btn btn-primary">Submit</button>


  
</form>
@endforeach
        @endif
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>