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
								<h2>Register As Vendor</h2>
								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate laboriosam numquam at</p>
							</div>
						</div>
						<form method=POST action="/addedvendorapplicant" enctype="multipart/form-data">
							@csrf
							<div class="row">

                            <div class="col-md-6">			
										<span class="form-label">Vendor Name</span>
										<input type="text" name="vendor_name" class="form-control">						
									</div>	
									
									<div class="col-md-6">			
										<span class="form-label">Vendor Email</span>
										<input type="text" name="vendor_email" class="form-control">						
									</div>

                                    <div class="col-md-6">			
										<span class="form-label">Vendor Address</span>
										<input type="text" name="vendor_address" class="form-control">						
									</div>
									
									<div class="col-md-6">			
										<span class="form-label">Vendor Password</span>
										<input type="password" name="vendor_password" class="form-control">						
									</div>

                                    <div class="col-md-6">			
										<label for="vendor_description" class="form-label">Vendor Description</span>
										<textarea name="vendor_description"
                                        row="10"
                                        class="border border-gray-200 rounded p-2 w-full input100"
                                        class="form-control">
                                        </textarea>						
									</div>

                                    


                            <div class="col-md-6">			
										<span class="form-label">Vendor Contact</span>
										<input type="number" name="vendor_contact" class="form-control">						
									</div>
						
							
								<div class="col-md-6">
									<div class="form-group">
										<label for="vendor_type" class="form-label">Vendor Type</span>
										<select class="form-control" name="vendor_type">
											<option value="library">Library</option>
											<option value="bookstore">Bookstore</option>
											<option>3</option>
										</select>
										<span class="select-arrow"></span>
									</div>
								</div>

                                    <div class="col-md-6">
                                    <label for="vendor_image" class="form-label">
                                      Vendor Image
                                   </label>
                                   <input
                                       type="file"
                                       class="border border-gray-200 rounded p-2 w-full input100"
                                       name="vendor_image"
                                   />
                                  </div>

								  <div class="col-md-6">
                                    <label for="vendor_certification" class="form-label">
                                      Vendor Certification
                                   </label>
                                   <input
                                       type="file"
                                       class="border border-gray-200 rounded p-2 w-full input100"
                                       name="vendor_certification"
                                   />
                                  </div>

							<div class="form-btn">
								<button class="submit-btn">Submit Vendor Application</button>
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