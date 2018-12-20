<?php

session_start();
require_once('functions.php');

if(isset($_SESSION['user_id']) && $_SESSION['user_type']!=='admin'){
	header('location:index.php');
}
$message = "";


if (isset($_POST['name'])) {
	$name = $_POST['name'];
	$description = $_POST['description'];
	$category = $_POST['category'];
	$price = $_POST['price'];
	$manufacture = $_POST['manufacture'];
	$status = $_POST['status'];

	$image1 = $_FILES['image1'];
	$image2 = $_FILES['image2'];
	$image3 = $_FILES['image3'];
	$image4 = $_FILES['image4'];
	$image5 = $_FILES['image5'];



// uploading file  and gettig new link
	$img1 = uploadAndNewLink($image1);
	$img2 = uploadAndNewLink($image2);
	$img3 = uploadAndNewLink($image3);
	$img4 = uploadAndNewLink($image4);
	$img5 = uploadAndNewLink($image5);


	$sql = "INSERT INTO products (name,image,description,category,manufacture,price,status,img2,img3,img4,img5,created_at)
			VALUES('$name','$img1','$description','$category','$manufacture','$price','$status','$img2','$img3','$img4','$img5',NOW())";

	if($conn->query($sql)===TRUE){

	        $message = 'Product has been created successfully!';
	        header( "refresh:1;url=admin_add_products.php" );

        }else{

	        $message = 'Sorry, Please try again!';
        }






}


?>

<?php require_once('header.php'); ?>

<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="row">
				<div class="col-sm-4">
					<div class="list-group">
					  <a href="admin_products.php" class="list-group-item active">Недвижимость</a>
					  <a href="admin_categories.php" class="list-group-item ">Категории</a>
					  <a href="admin_manufacture.php" class="list-group-item">Районы</a>
					  <a href="admin_orders.php" class="list-group-item">Ордера</a>

					</div>
				</div>
				<div class="col-sm-8">
					<div class="panel panel-default">
					  <!-- Default panel contents -->
					  <div class="panel-heading">Добавить Недвижимость</div>
					  <div class="panel-body">
					  		<h4><?php echo $message; ?></h4>

					  		<div class="col-sm-10">
						  		<form role="form" method="post" action="" enctype="multipart/form-data">
								  <div class="form-group">
								    <label for="name">Название:</label>
								    <input type="text" name="name" class="form-control" id="name" required>
								  </div>
								  <div class="form-group">
								    <label for="name">Описание:</label>

								    <textarea class="form-control" name="description" id="description"></textarea>
								  </div>

								  <div class="form-group">
								    <label for="name">Изображения:</label>
								    <input type="file" class="form-control" id="name" name="image1"  required>
								    <br>
								    <input type="file" class="form-control" id="name" name="image2"  >
								    <br>
								    <input type="file" class="form-control" id="name" name="image3"  >
								    <br>
								    <input type="file" class="form-control" id="name" name="image4"  >
								    <br>
								    <input type="file" class="form-control" id="name" name="image5"  >
								  </div>
								  <div class="form-group">
								    <label for="name">Категория:</label>

								    <select class="form-control" name="category" id="category">
								    <?php
								    $sql2 ="SELECT * FROM categories";
									$result= $conn->query($sql2);

									if($result){
										while($row = $result->fetch_array()){
											echo "<option value='".$row['cat_id']."'>".$row['cat_name']."</option>";
										}

									}

								    ?>

								    </select>
								  </div>
								  <div class="form-group">
								    <label for="name">Стоимость:</label>
								    <input type="number" name="price" class="form-control" id="name">
								  </div>
								  <div class="form-group">
								    <label for="name">Район:</label>

								    <select class="form-control" name="manufacture" id="manufacture">
								    	<option></option>
								    	<?php
								    $sql3 ="SELECT * FROM manufactures";
									$result= $conn->query($sql3);

									if($result){

										while($row = $result->fetch_array()){
											echo "<option value='".$row['man_id']."'>".$row['man_name']."</option>";
										}

									}

								    ?>
								    </select>
								  </div>
								  <div class="form-group">
								    <label for="status">Статус:</label>
								    <div class="radio">
									  <label><input type="radio" name="status" value="1" checked="checked">Публично</label>
									</div>
									<div class="radio">
									  <label><input type="radio" name="status" value="0">Приавтно</label>
									</div>
								  </div>


								  <button type="submit" class="btn btn-default">Создать</button>
								</form>

					  	    </div>

					  </div>
					  <!-- list Form -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>





















<?php require_once('header.php'); ?>
