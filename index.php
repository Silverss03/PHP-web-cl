<?php
include 'inc/header.php';

Session::CheckSession();

$logMsg = Session::get('logMsg');
if (isset($logMsg)) {
  echo $logMsg;
}
$msg = Session::get('msg');
if (isset($msg)) {
  echo $msg;
}
Session::set("msg", NULL);
Session::set("logMsg", NULL);
?>
<?php

if (isset($_GET['remove'])) {
  $remove = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['remove']);
  $removeUser = $users->deleteUserById($remove);
}

if (isset($_GET['deactive'])) {
  $deactive = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['deactive']);
  $deactiveId = $users->userDeactiveByAdmin($deactive);
}

if (isset($_GET['active'])) {
  $active = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['active']);
  $activeId = $users->userActiveByAdmin($active);
}

?>
  <div class="card ">
    <div class="card-header">
      <h3><i class="fas fa-users mr-2"></i>Danh sách người dùng <span class="float-right">Xin chào! <strong>
        <span class="badge badge-lg badge-secondary text-white">
			<?php
			$username = Session::get('username');
			if (isset($username)) {
			echo $username;
			}
			?>
		</span>

		</strong></span></h3>
        </div>
        <div class="card-body pr-2 pl-2">

          <table id="example" class="table table-striped table-bordered" style="width:100%">
				<thead>
          <tr>
            <th  class="text-center">STT</th>
            <th  class="text-center">Tên</th>
            <th  class="text-center">Tên đăng nhập</th>
            <th  class="text-center">Email</th>
            <th  class="text-center">Sđt</th>
            <th  class="text-center">Trạng thái</th>
            <th  class="text-center">Thời gian tạo</th>
            <th  width='25%' class="text-center">Hành động</th>
          </tr>
				</thead>
				<tbody>
                    <?php

					$allUser = $users->selectAllUserData();

					if ($allUser) {
                        $i = 0;
                        foreach ($allUser as  $value) {
                          	$i++;

                     ?>

					<tr class="text-center"
					<?php if (Session::get("id") == $value->id) {
					echo "style='background:#d9edf7' ";
					} ?>
					>

                        <td><?php echo $i; ?></td>
                        <td><?php echo $value->name; ?></td>
                        <td><?php echo $value->username; ?> <br>
                          <?php if ($value->roleid  == '1'){
                          echo "<span class='badge badge-lg badge-info text-white'>Admin</span>";
                        } elseif ($value->roleid == '2') {
                          echo "<span class='badge badge-lg badge-dark text-white'>Người chỉnh sửa</span>";
                        }elseif ($value->roleid == '3') {
                            echo "<span class='badge badge-lg badge-dark text-white'>Người dùng</span>";
                        } ?></td>
                        <td><?php echo $value->email; ?></td>

                        <td><span class="badge badge-lg badge-secondary text-white"><?php echo $value->mobile; ?></span></td>
                        <td>
                          	<?php if ($value->isActive == '0') { ?>
                          	<span class="badge badge-lg badge-info text-white">Hoạt động</span>
                        <?php }else{ ?>
                    		<span class="badge badge-lg badge-danger text-white">Không hoạt động</span>
                        <?php } ?>

                        </td>
                        <td><span class="badge badge-lg badge-secondary text-white"><?php echo $users->formatDate($value->created_at);  ?></span></td>

                        <td>
                        <?php if ( Session::get("roleid") == '1') {?>
                            <a class="btn btn-success btn-sm
                            " href="profile.php?id=<?php echo $value->id;?>">Xem</a>
                            <a class="btn btn-info btn-sm " href="profile.php?id=<?php echo $value->id;?>">Sửa</a>
                            <a onclick="return confirm('Bạn có chắc muốn xóa ?')" class="btn btn-danger
                             btn-sm " href="?remove=<?php echo $value->id;?>">Xóa</a>

                            <?php if ($value->isActive == '0') {  ?>
                               <a onclick="return confirm('Bạn có chắc muốn vô hiệu ?')" class="btn btn-warning btn-sm " href="?deactive=<?php echo $value->id;?>">Vô hiệu</a>
                            <?php } elseif($value->isActive == '1'){?>
                               <a onclick="return confirm('Bạn muốn kích hoạt lại người dùng?')" class="btn btn-secondary btn-sm " href="?active=<?php echo $value->id;?>">Kích hoạt</a>
                             <?php } ?>

                        <?php  }elseif( Session::get("roleid") == '2'){ ?>
                          <a class="btn btn-success btn-sm" href="profile.php?id=<?php echo $value->id;?>">Xem</a>
                          <a class="btn btn-info btn-sm" href="profile.php?id=<?php echo $value->id;?>">Sửa</a>
                        <?php }else{ ?>
						<a class="btn btn-success btn-sm" href="profile.php?id=<?php echo $value->id;?>">Xem</a>

                        <?php } ?>

                        </td>
                      </tr>
                    <?php }}else{ ?>
                      <tr class="text-center">
                      <td>Không có người dùng !</td>
                    </tr>
                    <?php } ?>

                  </tbody>

              </table>

        </div>
      </div>
	  
  <?php
  include 'inc/footer.php';

  ?>
