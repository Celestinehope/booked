<!DOCTYPE html>
<html lang="en">
    <head>
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
                         
                         <li><a class="nav-link scrollto" href="/product">Start Shopping</a></li>
                         <li><a class="nav-link scrollto" href="route('profile.edit')"> {{ __('Profile') }} </a></li>
                         <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            
                            <li><a class="nav-link scrollto"  href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">{{ __('Log Out') }}</a></li>
                            </form>                            
                      
                       
 
                    </ul>
                  

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
                                    <img style="width:100px; height:auto;" src="{{ asset('storage/' . $details['book_image']) }}"/>
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
                                    <a class="btn btn-outline-dark mt-auto" href="{{ route('cart')}}">View all</a>
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

        <!--<nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">Booked</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#!">All Products</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                                <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                        </button>
                    </form>
                </div>
            </div>
        </nav>

-->
        <!-- Header-->
        <header class="bg-dark py-5"  >
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Welcome, {{ Auth::user()->name }}</h1>
                    <p class="lead fw-normal text-white-50 mb-0">We are pleased to have you on this journey</p>
                </div>
            </div>
        </header>
        
       
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{asset('import/assetsjs/scripts.js')}}"></script>
    </body>
</html>
