<?php 
	if(!isset($ket_noi)){exit();}
	
	if(isset($_POST['dang_nhap_quan_tri']))
	{
		$ky_danh=$_POST['ky_danh'];
		$ky_danh=str_replace("'","",$ky_danh);
		$ky_danh=str_replace('"',"",$ky_danh);
		
		$mat_khau=md5($_POST['mat_khau']);
		$mat_khau=md5($mat_khau);
		
		$tv="select count(*) from thong_tin_quan_tri where ky_danh='$ky_danh' and mat_khau='$mat_khau' ";
		$tv_1=mysqli_query($conn, $tv);
		$tv_2=mysqli_fetch_array($tv_1);
		if($tv_2[0]==1)
		{
			$_SESSION['ky_danh']=$ky_danh;
			$_SESSION['mat_khau']=$mat_khau;
		}
		else 
		{ ?>
		    <script>
				alert("Thông tin nhập vào không đúng");
			</script>
			<?php
		}
		?>
		<script type="text/javascript">
					window.history.back();
		</script>
		<?php
	}
	
	if(isset($_SESSION['ky_danh']))
	{
		$ky_danh=$_SESSION['ky_danh'];
		$mat_khau=$_SESSION['mat_khau'];
		$tv="select count(*) from thong_tin_quan_tri where ky_danh='$ky_danh' and mat_khau='$mat_khau' ";
		$tv_1=mysqli_query($conn,$tv);
		$tv_2=mysqli_fetch_array($tv_1);
		if($tv_2[0]==1)
		{
			$xac_dinh_dang_nhap="co";
		}
	}
?>