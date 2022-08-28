<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!doctype html>
<html lang="en">

<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="<?php echo base_url() ?>./assets/css/style.css">

</head>

<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
						<div class="d-flex">
							<div class="w-100">
								<h3 class="mb-4">Sign In</h3>
							</div>
						</div>
						<form action="#" class="login-form">
							<div class="form-group">
								<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-envelope"></span></div>
								<input type="text" class="form-control rounded-left email" name="email" placeholder="Email" required>
							</div>
							<div class="form-group">
								<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-lock"></span></div>
								<input type="password" class="form-control rounded-left password" name="password" placeholder="Password" required>
							</div>
							<div class="form-group d-flex align-items-center">
								<div class="w-100 d-flex justify-content-end">
									<input type="submit" class="btn btn-block btn-primary rounded submit" id="login" value="Login">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<script>
		let baseUrl  = "<?php echo base_url() ?>";
	</script>

	<script src="<?php echo base_url() ?>./assets/js/jquery.min.js"></script>
	<script src="<?php echo base_url() ?>./assets/js/jquery.validate.min.js"></script>
	<script src="<?php echo base_url() ?>./assets/js/popper.js"></script>
	<script src="<?php echo base_url() ?>./assets/js/bootstrap.min.js"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="<?php echo base_url() ?>./assets/js/main.js"></script>

</body>

</html>