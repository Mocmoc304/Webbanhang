<?php 
	if(!isset($ket_noi)){exit();}
?>
<?php 
     if(isset($_GET['id'])){
	$id=$_GET['id'];
	$tv="select * from danhmuc where id='$id' ";
	$tv_1=mysqli_query($conn,$tv);
	$tv_2=mysqli_fetch_array($tv_1);
	$ten=$tv_2['ten'];
	$link_dong="?thamso=danhmuc&trang=".$_GET['trang'];
	 }

	if(isset($_POST["suadanhmuc"])){
        $ten_menu=trim($_POST['ten']);
	    $ten_menu=str_replace("'","&#39;",$ten_menu);
		$id=$_GET['id'];
        if(isset($ten_menu)){
            $sql = "select * from danhmuc where ten = '$ten_menu' ";
            $query = mysqli_query($conn, $sql);
            $rows = mysqli_num_rows($query);
            if($rows == 0) {
                $sql = "update danhmuc set ten = '$ten_menu' where id ='$id'";
                $query = mysqli_query($conn, $sql);
                header("location: ?thamso=danhmuc");
            }else {?>
                <script>
                    alert("Tên danh mục đã tồn tại trong hệ thống!")
                </script>
            <?php }
        }
    }
?>
<form action="" method="post">
	<table width="990px" >
		<tr>
			<td width="180px" ><b style="color:blue;font-size:20px" >Sửa menu dọc</b><br><br> </td>
			<td width="810px" align="right" >
				<a href="<?php echo $link_dong; ?>" class="lk_a1" style="margin-right:30px" >Đóng</a>
			</td>
		</tr>
		<tr>
			<td >Tên : </td>
			<td >
				<input style="width:400px;margin-top:3px;margin-bottom:3px;" name="ten" value="<?php echo $ten; ?>" >
			</td>
		</tr>		
		<tr>
			<td>&nbsp;</td>
			<td>
				<br>
				<input type="submit" name="suadanhmuc" value="Sửa danh mục" style="width:300px;height:50px;font-size:24px" >
			</td>
		</tr>
	</table>
</form>