<?php
$filepath = realpath(dirname(__FILE__));
include_once $filepath."/../lib/Session.php";
Session::init();



spl_autoload_register(function($classes){

  include 'classes/'.$classes.".php";

});


$users = new Users();

?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Quản lý người dùng</title>
    <link rel="stylesheet" href="assets/bootstrap.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/style.css">
  </head>
  <body>


<?php


if (isset($_GET['action']) && $_GET['action'] == 'logout') {
  Session::destroy();
}

 ?>


    <div class="container">

      <nav class="navbar navbar-expand-md navbar-dark bg-dark card-header">
        <a class="navbar-brand" href="index.php"><i class="fas fa-home mr-2"></i>Trang chủ</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
          	<ul class="navbar-nav ml-auto">

          	<?php if (Session::get('id') == TRUE) { ?>
				<?php if (Session::get('roleid') == '1') { ?>
				<li class="nav-item">

					<a class="nav-link" href="index.php"><i class="fas fa-users mr-2"></i> Danh sách người dùng </span></a>
				</li>
				<li class="nav-item">

					<a class="nav-link" href="addUser.php"><i class="fas fa-user-plus mr-2"></i>Thêm người dùng</span></a>
				</li>
				<?php  } ?>
				<li class="nav-item">

					<a class="nav-link" href="profile.php?id=<?php echo Session::get("id"); ?>"><i class="fab fa-500px mr-2"></i>Thông tin <span class="sr-only">(current)</span></a>
				</li>

				<li class="nav-item">
				<a class="nav-link" href="?action=logout"><i class="fas fa-sign-out-alt mr-2"></i>Đăng xuất</a>
				</li>
			<?php }else{ ?>

				<li class="nav-item">
					<a class="nav-link" href="register.php"><i class="fas fa-user-plus mr-2"></i>Đăng ký</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="login.php"><i class="fas fa-sign-in-alt mr-2"></i>Đăng nhập</a>
				</li>

				<?php } ?>


          	</ul>

        </div>
      </nav>
