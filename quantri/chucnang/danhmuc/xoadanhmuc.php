<?php 
	if(!isset($ket_noi)){exit();}
?>
<?php 
    
	$id=$_GET['id'];
	$tv="select count(*) from san_pham where thuoc_menu='$id' ";
	$tv_1=mysqli_query($conn,$tv);
	$tv_2=mysqli_fetch_array($tv_1);
	if($tv_2[0]==0)
	{
		$truy_van_xoa="DELETE FROM danhmuc WHERE id = $id ";
		mysqli_query($conn,$truy_van_xoa);
		header("location: ?thamso=danhmuc");
	}
	
	else 
	{?><script>
		alert("Danh mục này vẫn còn dữ liệu nên không thể xóa");
	</script>
		<?php
	}
?>