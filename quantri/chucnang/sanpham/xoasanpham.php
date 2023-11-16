<?php 
	if(!isset($ket_noi)){exit();}
?>
<?php 
	$id=$_GET['id'];
	
	$tv="select * from san_pham where id='$id' ";
	$tv_1=mysqli_query($conn,$tv);
	$tv_2=mysqli_fetch_array($tv_1);

	$link_hinh="../anh/sanpham/".$tv_2['hinh_anh'];
	if(is_file($link_hinh))	
	{
		unlink($link_hinh);
	}
	
	$tv="DELETE FROM san_pham WHERE id = $id ";
	mysqli_query($conn,$tv);
	?>
	<script>
		alert("Xóa sản phẩm thành công!");
	</script>
	<?php
?>