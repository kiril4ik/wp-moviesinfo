<?php /* Template Name: Example Template */ ?>

<?php get_header(); ?>

<form class="moviesinfo-reg-form" >
	<div class="container" style="border:1px solid #ccc">
		<h1>Sign Up</h1>
		<p>Please fill in this form to create an account.</p>
		<hr>

		<label for="email"><b>Email</b></label>
		<input type="text" placeholder="Enter Email" name="email">

		<label for="psw"><b>Password</b></label>
		<input type="password" placeholder="Enter Password" name="psw">

		<label for="psw-repeat"><b>Repeat Password</b></label>
		<input type="password" placeholder="Repeat Password" name="psw-repeat">

        <p id="form-error-found"></p>
		<div class="clearfix">
			<button type="button" class="cancelbtn" onclick="location.href='/';">Cancel</button>
			<button type="submit" class="signupbtn">Sign Up</button>
		</div>
	</div>
</form>

<?php get_footer(); ?>
