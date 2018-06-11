<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?= $title; ?></title>
		<meta name="description" content="<?= $description; ?>" />
	    <meta name="author" content="<?= Detail::author(); ?>" />
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<!-- Bootstrap core CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" crossorigin="anonymous" />
		<!-- Custom style -->
		<link rel="stylesheet" href="<?= __file(CSS."style.min.css"); ?>" />
	</head>
	<body>
		<!-- Navigation -->
		<nav class="navbar navbar-expand-lg navbar-dark bg-whitegold fixed-bottom">
			<div class="container">
				<a class="navbar-brand" target="_blank" href="https://whitegold.com"><?= Detail::appName(); ?></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navBar" aria-controls="navBar" aria-expanded="false" aria-label="Toggle Navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navBar">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active">
							<a class="nav-link" target="_blank" href="https://github.com/whytegold/whitegold">
								About <span class="sr-only">(current)</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" target="_blank" href="https://github.com/whytegold/whitegold/issues">Issues</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" target="_blank" href="https://github.com/whytegold/whitegold/pulls">Pull Request</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<section>
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<h1 class="mt-5 whitegold"><?= Detail::appName(); ?></h1>
						<p class="about-content"><a target="_blank" href="https://whitegold.com"><?= Detail::appName(); ?></a> is a PHP light web application framework with sophisticated syntax and this is inspired by the <a target="_blank" href="https://laravel.com" title="Laravel Framework">Laravel Framework</a> with the aim to ease the way components are being installed alongside our project which disrupts scaling and development process. <a target="_blank" href="https://whitegold.com"><?= Detail::appName(); ?></a> attempts to tackle this by tearing down components to make them stand alone so it's easy to remove, add and update different components at any point in time.</p>
					</div>
				</div>
			</div>
		</section>
		<!-- jQuery core JavaScript -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" crossorigin="anonymous"></script>
		<!-- Bootstrap core JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
	</body>
</html>
