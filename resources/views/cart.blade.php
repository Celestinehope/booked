<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shop Item - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
       <link href="{{asset('import/assets/css/styles.css')}}" rel="stylesheet" />
        <link href="{{asset('import/assets/css/style.css')}}" rel="stylesheet">
    </head>
    <body>
    @if(session('success'))
        <div>
            {{session('success')}}
        </div>
        @endif
        <!-- Navigation-->


        <header id="header" class="fixed-top d-flex align-items-center">
          <div class="container d-flex align-items-center justify-content-between">

            <h1 class="logo"><a href="index.html">Booked</a></h1>
      
                 <nav id="navbar" class="navbar">
                     <ul>
                         <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                         <li><a class="nav-link scrollto" href="#about">About</a></li>
                         <li><a class="nav-link scrollto" href="#services">Services</a></li>
                         <li><a class="nav-link scrollto" href="#team">Team</a></li>
                         <li><a class="nav-link scrollto"  href="#faq">FAQ</a></li>
                  <!--<li class=s"dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                      <li><a href="#">Drop Down 1</a></li>
                      <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                        <ul>
                          <li><a href="#">Deep Drop Down 1</a></li>
                         
                          
                        </ul>
                      </li>
                      <li><a href="#">Drop Down 2</a></li>
                      <li><a href="#">Drop Down 3</a></li>
                      <li><a href="#">Drop Down 4</a></li>
                    </ul>
                  </li>
-->
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li>
             
              
                <form class="getstarted scrollto" >
                <li class="nav-item dropdown">
                     <button class="btn btn-outline-dark" type="submit" style="color:white;">
                         <a class="nav-link dropdown-toggle" id="navbarDropdown" href="cart" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="bi-cart-fill me-1"></i>
                            Cart
                                     <span class="badge bg-dark text-white ms-1 rounded-pill">{{count((array) session('cart')) }}</span>
                        </a>
                    </button>
                        

                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" > 
                                <div>
                                    @php $total = 0@endphp
                                    @foreach((array) session('cart') as $id=> $details)
                                    @php $total += $details['book_price']*$details['book_quantity'] @endphp
                                    @endforeach

                                    <div>
                                        <p>Total: $ {{$total}}</p>
                                    </div>

                                </div>

                                </a></li>

                               
                                @if(session('cart'))
                                   @foreach(session('cart') as $id=> $details)
                                   <li><a class="dropdown-item" > 
                                   <div>
                                    <img style="width:100px; height:auto;"src="{{asset('import/assets/img')}}/{{$details['book_image']}}"/>
                                   </div>
                                   <div>
                                    <p>{{$details['book_name']}}</p>
                                    <p>{{$details['book_price']}}</p>
                                    <p class="count">Quantity:{{$details['book_quantity']}}</p>
                                   </div>
                                   </a>
                                   </li>
                                   @endforeach

                                @endif
                                
                               
                                
                                <li>
                                    <a class="dropdown-item" href="#!">
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <a class="btn btn-outline-dark mt-auto" href="cart">View all</a>
                                </div>
                        </div>

                                </a>
                                
                            
                           </li>
                              
                            </ul>
                        </li>
                    </form>
              
                  

            </li>

          <!--<li><div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            </li>
            -->


        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      </div>
  </header>


<br><br><br><br>

<form method="POST" action="{{ route('checkout') }}">
            @csrf
            <table class="table table-bordered">
  <thead>
    <tr>
                
    <th scope="col">Book</th>
                <th scope="col">Book image</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Subtotal</th>
                <th scope="col"></th>
                
                
            </tr>
        </thead>

        <tbody>

                                    @php $total = 0@endphp
                                    @if(session('cart'))
                                   @foreach(session('cart') as $id=> $details)
                                   @php $total += $details['book_price']*$details['book_quantity'] @endphp
                                
                                   
                                   
                                <tr data-id="{{ $id }}">
                                    
                                    <td>{{$details['book_name']}}</td>
                                    <td><img src="{{asset('import/assets/img')}}/{{$details['book_image']}}" width="100" height="100"> </td>
                                    <td>{{$details['book_price']}}</td>
                                    
                                    <td><small id="emailHelp" class="form-text text-muted">Change the quantity over here</small>
                                    <input type="number" value="{{$details['book_quantity']}}" class="quantity swc cart_update" min="1"/></td>
                                    <td>{{$total}}</td>
                            
                                    <td><a class="btn btn-outline-dark mt-auto cart_remove" href="">Delete</a></td>
                                    
                                    <input type="hidden" name="book_id" value="{{ $id }}">
                                    <input type="hidden" name="book_name" value="{{$details['book_name']}}">
                                    <input type="hidden" name="book_price" value="{{$details['book_price']}} ">
                                    <input type="hidden" name="book_quantity" value="{{$details['book_quantity']}}">
                                    <input type="hidden" name="type" value="bought">
                                    <input type="hidden" name="total" value="{{$total}}">

                                </tr>
                                @endforeach
                                @endif
          
    
    </tbody>
        <tfoot>
            <tr>
                <td><h3><strong>Total ${{$total}}</strong></h3></td>

            </tr>
            <tr>
                <td>
                <a class="btn btn-outline-dark mt-auto" href="sample">Continue Shopping</a>
                <button type="submit" class="btn btn-primary">Checkout</button>
            
                </td>
            </tr>
        </tfoot>
    </table>
    </form>

</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Vendor JS Files -->
  <script src="{{asset('import/assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{asset('import/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('import/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('import/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('import/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('import/assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('import/assets/js/main.js')}}"></script>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{asset('import/assets/js/scripts.js')}}"></script>

    <script type="text/javascript">

        $(document).ready(function(){
            $(".cart_update").change(function (e) {
        e.preventDefault();
   
        var ele = $(this);
   
        $.ajax({
            url: '{{ route('update_cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id"), 
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });
            
 } )

$(document).ready(function(){
        
            $(".cart_remove").click(function (e) {
            e.preventDefault();
    
            var ele = $(this);
    
            if(confirm("Do you really want to remove?")) {
                $.ajax({
                    url: '{{ route('remove_from_cart') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}', 
                        id: ele.parents("tr").attr("data-id")
                        },
                        success: function (response) {
                            window.location.reload();
                        }
                    });
                }
            });

        })
        
        

    </script>
     

            
                