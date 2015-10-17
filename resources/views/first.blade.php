<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<title>P3 -  Developer's Best Friend  - Berescu Ionut  - Harvard 2015</title>
		<meta name="description" content="Developer's Best Friend" />
		<link rel="shortcut icon" href="img/favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" href="css/main.css" />
		<script src="js/jquery.js"></script>
		<script src="js/modernizr.custom.js"></script>
		<script src="js/main.js"></script>

	</head>
	<body>
		<div class="container">
			<header>
				<h1> Developer's Best Friend <span> Click on one of the applications below</span></h1>

			</header>
			<section class="grid3d vertical" id="grid3d">
				<div class="grid-wrap">
					<div class="grid">
						<figure><img src="img/lorem_ipsum.jpg" alt="lorem ipsum"/></figure>
						<figure><img src="img/random_user.png" alt="random users"/></figure>
						<figure><img src="img/password_strength.png" alt="password strength"/></figure>
						<figure><img src="img/random_colors.jpg" alt="random colors"/></figure>
						<figure><img src="img/more_soon.png" alt="more soon"/></figure>
						<figure><img src="img/more_soon.png" alt="more soon"/></figure>
					</div>
				</div><!-- /grid-wrap -->
				<div class="content">
					<div>
						<div class="form-wrapper">
							<form id="lorem-wrapper">	
								{!! csrf_field() !!}
								<div class="field">
									<label for="paragraf">Paragraphs</label>
									<input type="text" id="paragraf" name="paragraf" value="5">
								</div>
								<div class="field ">								
									<input type="button" value="Generate" id="lorem">
								</div>	
							</form>
						</div>
						<div class="lorem"></div>	
					</div>
					<div>
						<div class="form-wrapper">
							<form id="users-wrapper">	
								{!! csrf_field() !!}
								<div class="field">
									<label for="usersnumber">How many users?</label>
									<input type="text" id="usersnumber" name="usersnumber" value="5">
								</div>
								<div class="field ">
									<input type="checkbox" checked name="emailenable" id="emailenable">
									<label for="emailenable">Include email address</label>
								</div>

								<div class="field ">
									<input type="checkbox" checked name="birthenable" id="birthenable">
									<label for="birthenable">Include birthday</label>
								</div>								
								<div class="field ">								
									<input type="button" value="Generate" id="users">
								</div>	
							</form>
						</div>
						<div class="users"></div>	
					</div>
					<div>
						<div class="form-wrapper">
							<form id="data-wrapper">	
								{!! csrf_field() !!}
								<div class="field">
									<label for="min-words">Nr. of words</label>
									<select id="min-words" name="minWords">
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4" selected="selected">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
										<option value="9">9</option>
										<option value="10">10</option>
									</select>


								</div>
								
								<div class="field">
									<label for="separator">Separator</label>
									<input type="text" id="separator" name="separator" value="-">
								</div>

								<div class="field ">
									<input type="checkbox" name="firstUpper" id="first-upper">
									<label for="first-upper">Make First Letter Uppercase</label>
								</div>

								<div class="field ">
									<input type="checkbox" name="appendNumbers" id="append-numbers">
									<label for="append-numbers">Add number to the end (1 - 10)</label>
								</div>
								<div class="field ">
									<input type="checkbox" name="addSpecial" id="append-special">
									<label for="append-special">Add special character to the end</label>
								</div>		
								<div class="field ">								
									<input type="button" value="Generate" id="generate">
								</div>	
							</form>
						</div>
						<div class="stong-password">correct-horse-battery-staple</div>							
						<div><img src="img/password_strength_full.png" class="form-image" alt="password full" /></div>							
					</div>
					<div>
						<div class="form-wrapper">
							<form id="colors-wrapper">	
								{!! csrf_field() !!}
								<div class="field">
									<label for="usersnumber">How many colors?</label>
									
									<select id="colorsnumber" name="colorsnumber">
										<option value="5">5</option>
										<option value="10">10</option>
										<option value="20" selected="selected">20</option>
										<option value="50">50</option>
										<option value="75">75</option>
										<option value="100">100</option>
									</select>
								</div>
								<div class="field">
									<label for="palette">Palette</label>
									
									<select id="palette" name="palette">
										<option value="random" selected="selected">Random</option>
										<option value="yellow">Yellow</option>
										<option value="red">Red</option>
										<option value="blue">Blue</option>
										<option value="green">Green</option>
									</select>
								</div>								
								<div class="field ">								
									<input type="button" value="Generate" id="colors">
								</div>	
							</form>
						</div>
						<div class="colors"></div>	
					</div>
					<div>
						<div><img src="img/keep-calm-coming-soon.png" class="comming-soon" alt="comming soon" /></div>
					</div>
					<div>
						<div><img src="img/keep-calm-coming-soon.png" class="comming-soon" alt="comming soon" /></div>
					</div>


					<span class="loading"></span>
					<span class="icon close-content"><i class="fa fa-times"></i></span>
				</div>
			</section>
		</div><!-- /container -->
		<script src="js/classie.js"></script>
		<script src="js/helper.js"></script>
		<script src="js/grid3d.js"></script>
		<script>
			new grid3D( document.getElementById( 'grid3d' ) );
		</script>
		<script type="text/javascript">
			var APP_URL = {!! json_encode(url('/')) !!};
		</script>
		
	</body>
</html>