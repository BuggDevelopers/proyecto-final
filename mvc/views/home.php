<?php $GLOBALS['page_name'] = 'home'; ?>

<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="UTF-8">
		<title>
			HOME
		</title>
	
		<?php require_once 'views/layouts/header.php'; ?>
	</head>
	
	<body>
		<?php require_once 'views/layouts/navbar.php'; ?>
	<br><br>
	<div class="container">
		<div class="form-row">
			<div class="col-md-8">
				<div class="form-row bordered">
				<div class="form-row margin">
					<div class="col-md-3">
						<p class="title">REGEX</p>
						<p align="center">
							<img src="<?= "$GLOBALS[assets]/img/regex.png" ?>" width="100px">
						</p>
					</div>
					<div class="col-md-9">
						<div class="form-row">
							<p class="paragraph">								
								Regex (Regular Expression) is a sequence of characters that make up a pattern
								search. They are mainly used to search for string patterns
								character or substitution operations.
							</p>
						</div>
						<div class="form-row">
							<span class="btn btn-success btn-sm">Try Out</span>
							&nbsp;
							<span class="btn btn-secondary btn-sm">Info</span>
						</div>
					</div>
				</div>
				</div>
			</div>
			<div class="col-md-1"></div>
			<div class="col-md-3">
				<div class="form-row bordered">
					<div class="form-row margin2">
						<div class="col-md-12">
							<p align="center">
								<img src="<?= "$GLOBALS[assets]/img/brand-logo.png" ?>" width="200px">
							</p>
							<p class="title">
								PREMIUM
							</p>
						</div>
						<div class="col-md-12">
							<p class="paragraph">
								<br><br>
								Become Premium today and get access to all our services!<br><br>
								Create, modify and share your services.
							</p>
						</div>
						<div class="col-md-12">
							<p align="center">
								<br><br>
								<span class="btn btn-success btn-sm title">Try Now!!!</span>
							</p>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
	
	</body>
	
</html>