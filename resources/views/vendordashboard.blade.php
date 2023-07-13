<!DOCTYPE html>
<html lang="en">
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="{{asset('css/displaycards.css')}}">
<link rel="stylesheet" href="{{asset('css/homepagecards.css')}}">
<meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Booked-Start your Journey!</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('import/assets/css/styles.css')}}" rel="stylesheet" />
        <link href="{{asset('import/assets/css/style.css')}}" rel="stylesheet">



</head>
<!------ Include the above in your HEAD tag ---------->

@include('vendor.vendornavbar');
@include('layouts.message');
<div>
@foreach ($books as $book)
<div class="container" >
    
  <div class="card float-left">
    <div class="row ">
      
      <div class="col-sm-7">
        <div class="card-block">
        <h4 class="card-title">{{ $book->book_name }}</h4>
        <p> {{ $book->book_author }}</p>
          <p> {{ $book->book_description }}</p>         
          <p> {{ $book->book_quantity }}</p>
          <p> {{ $book->book_price }}</p>
          <a href="/book/{{ $book->book_id }}/edit" class="btn btn-primary btn-sm">Edit</a>
          <form method="POST" action="/book/{{ $book->book_id }}/delete">
                @csrf
                @method('DELETE')
                <button onclick="return confirm('Are you sure you want to delete this book record?')"
                    class="text-red-500"><i class="fa-solid fa-trash"></i> Delete</button>
            </form>
          
          
        </div>
      </div>

      <div class="col-sm-5">
      <img class="d-block w-100" src="{{ $book->book_image ? asset('storage/' . $book->book_image) : asset('images/no-image.jpg') }}"alt="Book Image" style="height: 230px;">
        
      </div>
    </div>
  </div>    
  </div>
  @endforeach
</div>

  
  <div>
 
</div>
 <br>
<br>
<br>
<div class="footer">
   
</div>
</html>