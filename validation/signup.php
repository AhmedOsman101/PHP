<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Sign-Up</title>
	<link rel="stylesheet" href="./css/water.css" />
	<link rel="stylesheet" href="./css/navbar.css" />
	<link rel="stylesheet" href="./css/sign-up.css" />
	<link rel="stylesheet" href="./css/radio.css" />
	<link rel="stylesheet" href="./css/main.css" />
	<!-- <script defer src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js"></script>
	<script defer src="./js/validation.js"></script> -->
</head>

<body>
	<?php include_once("./components/navbar.html") ?>
	<main>
		<div class="form-container">
			<p class="title">Sign-Up</p>
			<form id="form" class="form" method="post" novalidate action="handle-sign-up.php">
				<!-- username -->
				<div class="input-group">
					<label for="username">Username</label>
					<input type="text" name="username" id="username" placeholder="enter your username" />
				</div>
				<!-- email -->
				<div class="input-group">
					<label for="email">Email</label>
					<input type="email" name="email" id="email" placeholder="enter your email" />
				</div>
				<!-- password -->
				<div class="input-group">
					<label for="password">Password</label>
					<input type="password" name="password" id="password" placeholder="enter your password" />
				</div>
				<!-- phone number -->
				<div class="input-group">
					<label for="phone">Phone Number</label>
					<input type="phone" name="phone" id="phone" placeholder="enter your phone Number" />
				</div>
				<!-- address 1 -->
				<div class="input-group">
					<label for="mainAddress">main address</label>
					<input type="text" name="mainAddress" id="mainAddress" placeholder="enter your main address" />
				</div>
				<!-- address 2 -->
				<div class="input-group">
					<label for="secondAddress">Second Address</label>
					<input type="text" name="secondAddress" id="secondAddress" placeholder="enter your second Address" />
				</div>
				<!-- age -->
				<div class="input-group">
					<label for="age">Age</label>
					<input type="number" name="age" id="age" placeholder="enter your age" />
				</div>
				<!-- gender -->
				<div class="radio-button-container">
					<label class="radio-button__label gender">gender:</label>
					<div class="radio-button" id="radio">
						<input type="radio" class="radio-button__input" value="male" id="radio1" name="radio_group" />
						<label class="radio-button__label" for="radio1">
							<span class="radio-button__custom"></span> Male </label>
					</div>
					<div class="radio-button">
						<input type="radio" class="radio-button__input" value="female" id="radio2" name="radio_group" />
						<label class="radio-button__label" for="radio2">
							<span class="radio-button__custom"></span> Female </label>
					</div>
				</div>
				<!-- sign up -->
				<input type="submit" value="sign-up" class="sign" id="submit" />
			</form>
			<br />
			<p class="sign-in"> Already have an account? <a rel="noopener noreferrer" href="login.php">Sign In</a>
			</p>
		</div>
	</main>
	<script type="text/javascript" src="./js/mobile.js"></script>
</body>

</html>