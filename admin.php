<?php

session_start();
require_once('functions.php');

if(isset($_SESSION['user_id']) && $_SESSION['user_type']!=='admin'){
	header('location:index.php');
}

?>

<?php require_once('header.php'); ?>

<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="row">
				<div class="col-sm-4">
					<div class="list-group">
					  <a href="admin_products.php" class="list-group-item">Недвижимость</a>
					  <a href="admin_categories.php" class="list-group-item ">Категории</a>
					  <a href="admin_manufacture.php" class="list-group-item">Районы</a>
					  <a href="admin_orders.php" class="list-group-item">Ордера</a>
					</div>
				</div>
				<div class="col-sm-8">

				</div>
			</div>
		</div>
	</div>
</div>





















<?php require_once('header.php'); ?>
