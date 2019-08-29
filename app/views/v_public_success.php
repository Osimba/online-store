<?php include("includes/public_header.php"); ?>


<div class="content">
	<h2>Thank you for your purchase!</h2>
	<br>
	<p>Details:</p>

	<ul class="purchase-details">
		<?php $this->get_data('cart_rows'); ?>
	</ul>

	<hr>
	<p>Your transaction ID is <?php echo $tid; ?></p>
	<p>Check your email for more info</p>
	<p><a href="index.php">Go Back</a></p>
</div>

<?php include("includes/public_footer.php"); ?>