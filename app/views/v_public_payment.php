<?php include("includes/public_header.php"); ?>

<div class="p-container">
	<h2>Your Order</h2>

	<ul class="alerts">
		<?php $this->get_alerts(); ?>
	</ul>

	<ul class="cart">
		<?php $this->get_data('cart_rows'); ?>
	</ul>

	<?php print_r($_POST['cart']); ?>


	<h2>Checkout - Billing Details</h2>
	<form action="./charge.php" method="post" id="payment-form">
		<div class="form-row">
			<input type="text" name="first_name" placeholder="First Name">

			<input type="text" name="last_name" placeholder="Last Name">

			<input type="text" name="billing_address_1" placeholder="Street Address">

			<input type="text" name="billing_address_2" placeholder="Apartment, suite, unit etc. (optional)">

			<input type="text" name="billing_city" placeholder="City">

			<select name="billing_state" aria-hidden="true">
				<option value="">Select a State...</option>
				<option value="AL">Alabama</option>
				<option value="AK">Alaska</option>
				<option value="AZ">Arizona</option>
				<option value="AR">Arkansas</option>
				<option value="CA">California</option>
				<option value="CO">Colorado</option>
				<option value="CT">Connecticut</option>
				<option value="DE">Delaware</option>
				<option value="DC">District Of Columbia</option>
				<option value="FL">Florida</option>
				<option value="GA">Georgia</option>
				<option value="HI">Hawaii</option>
				<option value="ID">Idaho</option>
				<option value="IL">Illinois</option>
				<option value="IN">Indiana</option>
				<option value="IA">Iowa</option>
				<option value="KS">Kansas</option>
				<option value="KY">Kentucky</option>
				<option value="LA">Louisiana</option>
				<option value="ME">Maine</option>
				<option value="MD">Maryland</option>
				<option value="MA">Massachusetts</option>
				<option value="MI">Michigan</option>
				<option value="MN">Minnesota</option>
				<option value="MS">Mississippi</option>
				<option value="MO">Missouri</option>
				<option value="MT">Montana</option>
				<option value="NE">Nebraska</option>
				<option value="NV">Nevada</option>
				<option value="NH">New Hampshire</option>
				<option value="NJ">New Jersey</option>
				<option value="NM">New Mexico</option>
				<option value="NY">New York</option>
				<option value="NC">North Carolina</option>
				<option value="ND">North Dakota</option>
				<option value="OH">Ohio</option>
				<option value="OK">Oklahoma</option>
				<option value="OR">Oregon</option>
				<option value="PA">Pennsylvania</option>
				<option value="RI">Rhode Island</option>
				<option value="SC">South Carolina</option>
				<option value="SD">South Dakota</option>
				<option value="TN">Tennessee</option>
				<option value="TX">Texas</option>
				<option value="UT">Utah</option>
				<option value="VT">Vermont</option>
				<option value="VA">Virginia</option>
				<option value="WA">Washington</option>
				<option value="WV">West Virginia</option>
				<option value="WI">Wisconsin</option>
				<option value="WY">Wyoming</option>
			</select>	

			<input type="text" name="billing_zipcode" placeholder="Zipcode">

			<input type="email" name="email" placeholder="Email">
		    
		    <label for="card-element">
		      Credit or debit card
		    </label>

		    <div id="card-element">
		      <!-- A Stripe Element will be inserted here. -->
		    </div>

		    <!-- Used to display form errors. -->
		    <div id="card-errors" role="alert"></div>
  		</div>

  		<button>Submit Payment</button>
	</form>

</div>


<?php include("includes/public_footer.php"); ?>