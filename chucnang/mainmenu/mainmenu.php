<?php 
	$tv="SELECT * FROM menu_ngang WHERE 1";
	$tv_1=mysqli_query($conn,$tv);
	echo "<div class='main-menu' >";
	echo "<a href='?thamso='>Trang chủ</a>";
	while($tv_2=mysqli_fetch_array($tv_1))
	{
		if($tv_2['loai_menu']==""){$link_menu="?thamso=xuat_mot_tin&id=".$tv_2['id'];}
		if($tv_2['loai_menu']=="san_pham"){$link_menu="?thamso=xuat_san_pham_2";}
		echo "<a href='$link_menu'>";
			echo $tv_2['ten'];
		echo "</a>";
	}
	echo "</div>";
?>