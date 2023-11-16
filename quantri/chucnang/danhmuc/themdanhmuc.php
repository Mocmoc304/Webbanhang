<?php 
	if(!isset($ket_noi)){exit();}
?>
<?php 
    if(isset($_POST["themdanhmuc"])){
		$ten_menu=trim($_POST['ten']);
	    $ten_menu=str_replace("'","&#39;",$ten_menu);
        if($ten_menu!="") {
            $sqlSelect = "select * from danhmuc where ten = '$ten_menu'";
            $query = mysqli_query($conn,$sqlSelect);
            $rows = mysqli_num_rows($query);
            if($rows == 0) {
                $sql = "INSERT INTO danhmuc (
		id ,
		ten 
		)
		VALUES (
		NULL ,
		'$ten_menu'
		);";
            mysqli_query($conn, $sql);
			 header("location: ?thamso=danhmuc");
            } else { ?>
           <script>
                alert("Tên danh mục bị trùng. Vui lòng nhập tên khác!");
            </script>
            <?php
            }
        }
    }
?>
<form action="" method="post">
	<table width="990px" >
		<tr>
			<td colspan="2" ><b style="color:blue;font-size:20px" >Thêm danh mục</b><br><br> </td>
			
		</tr>
		<tr>
			<td width="150px" >Tên danh mục: </td>
			<td width="840px">
				<input style="width:400px;margin-top:3px;margin-bottom:3px;" name="ten" value="" >
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>
				<br>
				<input type="submit" name="themdanhmuc" value="Thêm danh mục" style="width:300px;height:50px;font-size:20px;text-align:center" >
			</td>
		</tr>
	</table>
</form>