<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>View Item</title>
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
                                   <img style="width:100px; height:auto;"src="{{ $book->book_image ? asset('storage/' . $book->book_image) : asset('images/no-image.jpg') }}"/>
                                    <!--<img style="width:100px; height:auto;"src="{{asset('import/assets/img')}}/{{$details['book_image']}}"/> -->
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
        <!-- Product section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
               
               
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{ asset('storage/' . $book->book_image) }}" alt="..." /></div>
                    <div class="col-md-6">
                        <div class="small mb-1"></div>
                        <h1 class="display-5 fw-bolder">{{$book->book_name}}</h1>
                        
                        <div class="fs-5 mb-5">
                            <span class="text-decoration-line-through"></span>
                            <span>${{$book->book_price}}</span>
                        </div>
                        <p class="lead">{{$book->book_description}}. </p>
                        <div class="d-flex">
                            <!--<input class="form-control text-center me-3" id="inputQuantity" type="num" value="{{$book['book_quantity']}}" min="1"style="max-width: 3rem" />-->
                            <button class="btn btn-outline-dark flex-shrink-0" type="button">
                            <a class="btn btn-outline-dark mt-auto" href="{{route('add_to_cart',['book_id' => $book->book_id, 'type' => 'bought','cost' => $book->book_price])}}">
                                <i class="bi-cart-fill me-1"></i>
                               
                                
                                Buy book
                                </a>
                            </button>
                            <br>
                            <button class="btn btn-outline-dark flex-shrink-0" type="button">
                            <a class="btn btn-outline-dark mt-auto" href="{{route('borrow',$book->book_id)}}">
                                <i class="bi-cart-fill me-1"></i>
                                Hire book
                            </a>
                            </button>
                        </div>
                        <small id="emailHelp" class="form-text text-muted">Borrowing a book costs kshs.20 per book borrowed</small>
    <small id="emailHelp" class="form-text text-muted">The standard timeline given for borrowing a book is 14 days</small>
    <small id="emailHelp" class="form-text text-muted">Card used to pay with will be on hold until book is returned</small>
    <small id="emailHelp" class="form-text text-muted">Failure to return book on time will result in a fine of 100 per day</small>
                    </div>
                </div>
            </div>
            
                    
        </section>
        <!-- Related items section-->
        <section class="py-5 bg-light">
            <div class="container px-4 px-lg-5 mt-5">
                <h2 class="fw-bolder mb-4">Related products</h2>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Fancy Product</h5>
                                    <!-- Product price-->
                                    $40.00 - $80.00
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View options</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                            <!-- Product image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Special Item</h5>
                                    <!-- Product reviews-->
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <!-- Product price-->
                                    <span class="text-muted text-decoration-line-through">$20.00</span>
                                    $18.00
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                            <!-- Product image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Product details-->
                              <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Sale Item</h5>
                                    <!-- Product price-->
                                    <span class="text-muted text-decoration-line-through">$50.00</span>
                                    $25.00
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Popular Item</h5>
                                    <!-- Product reviews-->
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <!-- Product price-->
                                    $40.00
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{asset('import/assets/js/scripts.js')}}"></script>
    </body>
</html>
