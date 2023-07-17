<!DOCTYPE html>
<html>
<head>
    <style>
        /* CSS styles for the table */
        table {
            border-collapse: collapse;
            width: 100%;
            margin: 20px;
            border: 1px solid red; /* Margin color */
        }
        
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        
        th {
            background-color: #f2f2f2;
        }
        
        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body>
<form method="POST" action="{{ route('submit-order') }}">
            @csrf
    <table class="table">
        <thead>
            <tr>
                
                <th>Book</th>
                <th>Book image</th>
                <th>Type</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th></th>
                
                
            </tr>
        </thead>

        <tbody>
        
                                   @php $total += $price*$quantity @endphp
                                
                                  <!--'book_id' => $id,
            'book_name' => $name,
            'book_price' => $price,
            'book_quantity' => $quantity,
            'type' => $type,
            'total' => $total--> 
                                   
                                <tr data-id="{{ $id }}">
                                    
                                    <td>{{$name}}</td>
                                    <td><img src="{{asset('import/assets/img')}}/{{$details['book_image']}}" width="100" height="100"> </td>
                                    <td>{{$type}}</td>
                                    <td>{{$book->book_name}}</td>
                                    
                                    <td><small id="emailHelp" class="form-text text-muted">Change the quantity over here</small>
                                    <input type="number" value="{{$quantity}}" class="quantity swc cart_update" min="1"/></td>
                                    <td>{{$total}}</td>
                            
                                    <td><a class="btn btn-outline-dark mt-auto cart_remove" href="">Delete</a></td>
                                    
                                   <!-- <input type="hidden" name="book_id" value="{{ $id }}">
                                    <input type="hidden" name="book_name" value="{{$details['book_name']}}">
                                    <input type="hidden" name="book_price" value="{{$details['book_quantity']}} ">
                                    <input type="hidden" name="book_quantity" value="{{$details['book_quantity']}}">
                                    <input type="hidden" name="type" value="bought"> 
                                    <input type="hidden" name="total" value="{{$total}}">-->

                                </tr>
                               
          
    
    </tbody>
        <tfoot>
            <tr>
                <td><h3><strong>Total ${{$total}}</strong></h3></td>

            </tr>
            <tr>
                <td>
                <a class="btn btn-outline-dark mt-auto" href="product">Continue Shopping</a>
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
     

          