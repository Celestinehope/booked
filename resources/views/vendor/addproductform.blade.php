<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Booking Form HTML Template</title>

	<!-- Google font -->
	<link href="http://fonts.googleapis.com/css?family=Playfair+Display:900" rel="stylesheet" type="text/css" />
	<link href="http://fonts.googleapis.com/css?family=Alice:400,700" rel="stylesheet" type="text/css" />

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="{{asset('import/addproduct/assets/css/bootstrap.min.css')}}" />

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="{{asset('import/addproduct/assets/css/style.css')}}" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="booking-form">
						<div class="booking-bg">
							<div class="form-header">
								<h2>Add Books</h2>
								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate laboriosam numquam at</p>
							</div>
						</div>
						<form method=POST action="/addedbook" enctype="multipart/form-data">
							@csrf
							<div class="row">

                            <div class="col-md-6">			
										<span class="form-label">Book Name</span>
										<input type="text" name="book_name" class="form-control">						
									</div>	
									
									<div class="col-md-6">			
										<span class="form-label">Book Author</span>
										<input type="text" name="book_author" class="form-control">						
									</div>

                            <div class="col-md-6">			
										<span class="form-label">Book Quantity</span>
										<input type="number" name="book_quantity" class="form-control">						
									</div>
							

                            <div class="col-md-6">			
										<span class="form-label">Book price</span>
										<input type="number" name="book_price" class="form-control">						
									</div>
								
							
								<div class="col-md-6">
									<div class="form-group">
										<label for="category_id" class="form-label">Category</span>
										<select class="form-control" name="category_id">
											<option value="1">Romance</option>
											<option value="2">Fantasy</option>
											<option value ="3"> Thriller</option>
										</select>
										<span class="select-arrow"></span>
									</div>
								</div>


								
                                <div class="col-md-6">			
										<label for="book_description" class="form-label">Book description</span>
										<textarea name="book_description"
                                        row="10"
                                        class="border border-gray-200 rounded p-2 w-full input100"
                                        class="form-control">
                                        </textarea>						
									</div>
                                    <div class="col-md-6">
                                    <label for="book_image" class="form-label">
                                      Book Image
                                   </label>
                                   <input
                                       type="file"
                                       class="border border-gray-200 rounded p-2 w-full input100"
                                       name="book_image"
                                   />
                                  </div>

							<div class="form-btn">
								<button class="submit-btn">Add book</button>
							</div>

    </div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>