<?php include("includes/public_header.php"); ?>

<div id="content">
    <h2>Shopping Cart</h2>

    <ul class="alerts">
        <?php $this->get_alerts(); ?>
    </ul>

    <form action="" method="post">
        <ul class="cart">
            <?php $this->get_data('cart_rows'); ?>
        </ul>

        <div class="buttons_row">
            <a class="button_alt" href="?empty">Empty Cart</a>
            <input type="submit" name="update" class="button_alt" value="Update Cart">
        </div>
    </form>

    <?php
    $items = $this->get_data('cart_total_items', FALSE);
    if ($items > 0) { 
        $cart_items = $Cart->get_ids();
    ?>
        <form action="payment.php" method="post">
            <?php foreach ($cart_items as $cart_item) { ?>

                <input type="hidden" name="<?php echo 'cart[][id]'; ?>" value="<?= $cart_item[id] ?>">
                <input type="hidden" name="<?php echo 'cart[][name]'; ?>" value="<?= $cart_item[name] ?>">
                <input type="hidden" name="<?php echo 'cart[][description]'; ?>" value="<?= $cart_item[description] ?>">
                <input type="hidden" name="<?php echo 'cart[][price]'; ?>" value="<?= $cart_item[price] ?>">
                <input type="hidden" name="<?php echo 'cart[][image]'; ?>" value="<?= $cart_item[image] ?>">
                <input type="hidden" name="<?php echo 'cart[][quantity]'; ?>" value="<?= $cart_item[quantity] ?>">

            <?php } ?>
            <div class="submit_row">
                <input type="submit" name="submit" class="button" value="Pay">
            </div>
        </form>
    <?php } ?>

</div>

<?php include("includes/public_footer.php"); ?>