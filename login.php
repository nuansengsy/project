<?php

session_start();

require_once('config.php');

$message=$email=$pass="";

if (isset($_POST['email'])) {

	$email = $_POST['email'];
    $pass = md5($_POST['pass']);

    $sql = "SELECT * FROM users WHERE email='$email' AND pass='$pass'";

     $result= $conn->query($sql);

     if(mysqli_num_rows($result) == 0) {
		     $message = "Неверный Пароль!";


		} else {
		    $message = "Login success!";

		    while($row=mysqli_fetch_array($result)){
		    	$user_id =$row['id'];
		    	$user_type =$row['user_type'];

		    	 // Создание Сессии
                $_SESSION['user_id'] = $user_id;
                $_SESSION['user_type'] = $user_type;

                 header( "refresh:2;url=index.php" );

		    }
		}
}






?>

<?php require_once('header.php'); ?>

<div class="container">
	<div class="row">
	<?php echo $message; ?>
		<form role="form" method="post" action="">
		  <div class="form-group">
		    <label for="email">Почтовый Адресс:</label>
		    <input type="email" name="email" class="form-control" id="email">
		  </div>
		  <div class="form-group">
		    <label for="pwd">Пароль:</label>
		    <input type="password" name="pass" class="form-control" id="pwd">
		  </div>

		  <button type="submit" class="btn btn-default">Логин</button>
		</form>
		<p>Нет Аккаунта? <a href="register.php">Создать Аккаунт</a></p>
	</div>
</div>



<?php require_once('footer.php'); ?>


