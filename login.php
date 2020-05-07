<?php include 'inc/header.php'; ?>
<?php
	if(Session::get("customerLogin")) {
		header("Location: order.php");
	}
?>
<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['registration'])) {
		$registrationMsg = $cmr->customerRegistration($_POST);
	}
?>
<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
		$loginMsg = $cmr->customerLogin($_POST);
	}
?>
 <div class="main">
    <div class="content">
    	 <div class="login_panel">
        	<h3>Existing Customers</h3>
					<p>Sign in with the form below.</p>
					<?= isset($loginMsg) ? $loginMsg : ''; ?>
        	<form action="" method="POST">
						<input type="text" name="email" class="field" placeholder="email" />
						<input type="password" name="password" class="field" placeholder="Password" />
						<div class="buttons"><div><button class="grey" name="login">Sign In</button></div></div>
					</form>
					<p class="note">Forgot Passoword click <a href="#">here</a></p>
				</div>
    	<div class="register_account">
				<?= isset($registrationMsg) ? $registrationMsg : ''; ?>
    		<h3>Register New Account</h3>
    		<form action="" method="POST">
					<table>
						<tbody>
							<tr>
								<td>
									<div>
										<input type="text" name="name" placeholder="Name"/>
									</div>
									<div>
										<input type="text" name="city" placeholder="City"/>
									</div>
									<div>
										<input type="text" name="zip" placeholder="Zip-Code"/>
									</div>
									<div>
										<input type="text" name="email" placeholder="E-Mail"/>
									</div>
								</td>
								<td>
									<div>
										<input type="text" name="state" placeholder="State" />
									</div>
									<div>
										<input type="text" name="address" placeholder="Address" />
									</div>
									<div>
										<input type="text" name="phone" placeholder="Phone" />
									</div>
									<div>
										<input type="text" name="password" placeholder="Password" />
									</div>
								</td>
							</tr>
						</tbody>
					</table> 
					<div class="search"><div><button name="registration" class="grey">Create Account</button></div></div>
					<p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
					<div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
</div>
	 
<?php include 'inc/footer.php'; ?>

