<?php 
	if(!isset($ket_noi)){exit();}
?>
<?php
     if(isset($_GET['id'])){
	$id=$_GET['id'];
	$tv="select * from san_pham where id='$id' ";
	$tv_1=mysqli_query($conn,$tv);
	$tv_2=mysqli_fetch_array($tv_1);
	$ten=$tv_2['ten'];
	$gia=$tv_2['gia'];
	$trang_chu=$tv_2['trang_chu'];
	$noi_bat=$tv_2['noi_bat'];
	$noi_dung=$tv_2['noi_dung'];
	$ten_anh=$tv_2['hinh_anh'];
	$link_hinh="../anh/sanpham/".$tv_2['hinh_anh'];
	$link_dong="?thamso=sanpham&id_menu=".$_GET['id_menu']."&trang=".$_GET['trang'];
    }

	if(isset($_POST["suasanpham"])){
		$ten=trim($_POST['ten']);
	$ten=str_replace("'","&#39;",$ten);
	$gia=trim($_POST['gia']);
	$trang_chu=$_POST['trang_chu'];
	$noi_bat=$_POST['noi_bat'];
	$noi_dung=$_POST['noi_dung'];
	$noi_dung=str_replace("'","&#39;",$noi_dung);
	$ten_file_anh_tai_len=$_FILES['hinh_anh']['name'];
	if($ten_file_anh_tai_len!="")
	{
		$ten_file_anh=$ten_file_anh_tai_len;
	}
	else 
	{
		$ten_file_anh=$_POST['ten_anh'];
	}
	$id=$_GET['id'];
	if($ten!="")
	{
		$tv_k="select count(*) from san_pham where hinh_anh='$ten_file_anh' ";
		$tv_k_1=mysqli_query($conn,$tv_k);
		$tv_k_2=mysqli_fetch_array($tv_k_1);
		if($tv_k_2[0]==0 or $ten_file_anh_tai_len=="")
		{
			$tv="
			UPDATE san_pham SET 
			ten = '$ten',
			gia = '$gia',
			hinh_anh = '$ten_file_anh',
			noi_dung = '$noi_dung',
			trang_chu = '$trang_chu',
			noi_bat = '$noi_bat' 
			WHERE id =$id;
			";
			mysqli_query($conn,$tv);
			
			
			if($ten_file_anh_tai_len!="")
			{				
				$duong_dan_anh="../anh/sanpham/".$ten_file_anh_tai_len;
				move_uploaded_file($_FILES['hinh_anh']['tmp_name'],$duong_dan_anh);
				$duong_dan_anh_cu="../anh/sanpham/".$_POST['ten_anh'];
				unlink($duong_dan_anh_cu);
			}
			header("location: ?thamso=sanpham");
				
		}
		else 
		{?>
			<script>
				alert("Hình ảnh bị trùng tên");
			</script>
			<?php
		}
	}
	else 
	{
		?>
			<script>
				alert("Tên sản phẩm chưa được điền vào");
			</script>
			<?php
	}

	}
?>
<form action="" method="post" enctype="multipart/form-data" >
	<table width="900px" >
		<tr>
			<td width="180px" ><b style="color:blue;font-size:20px" >Sửa sản phẩm</b><br><br> </td>
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
			<td valign="top" >Hình ảnh : </td>
			<td >
				<img src='<?php echo $link_hinh; ?>' style='width:180px' > 
				<br><br>
				<input type="file" name="hinh_anh" >
				<input type="hidden" name="ten_anh" value="<?php echo $ten_anh; ?>" >
				<br><br>
				<a href="<?php echo $link_hinh; ?>" class="lk_a1" style="font-size:24px" target="_blank" >Xem ảnh đủ kích cỡ</a>
				<br><br>
			</td>
		</tr>
		<tr>
			<td >Giá : </td>
			<td >
				<input style="width:400px;margin-top:3px;margin-bottom:3px;" name="gia" value="<?php echo $gia; ?>" >
			</td>
		</tr>
		<tr>
			<td>Trang chủ : </td>
			<td>
				<?php
					$a_1="";
					$a_2="";
					if($trang_chu=="co")
					{
						$a_2="selected";
					}
				?>
				<select name="trang_chu" style="margin-top:3px;margin-bottom:3px;" >
					<option value="" <?php echo $a_1; ?> >Không</option>
					<option value="co" <?php echo $a_2; ?> >Có</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Nổi bật : </td>
			<td>
				<?php
					$a_1="";
					$a_2="";
					if($noi_bat=="co")
					{
						$a_2="selected";
					}
				?>
				<select name="noi_bat" style="margin-top:3px;margin-bottom:3px;" >
					<option value="" <?php echo $a_1; ?> >Không</option>
					<option value="co" <?php echo $a_2; ?> >Có</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Nội dung : </td>
			<td>
				<script type="text/javascript">
				  tinymce.init({
					selector: '#noi_dung',
					theme: 'modern',
					width: 800,
					height: 400,
					plugins: [
					  'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
					  'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
					  'save table contextmenu directionality emoticons template paste textcolor jbimages'
					],
					toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons jbimages',
					relative_urls: false
				  });
				  
				  </script>
				  <textarea id="noi_dung" name="noi_dung" ><?php echo $noi_dung; ?></textarea>
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>
				<br>
				<input type="submit" name="suasanpham" value="Sửa sản phẩm" style="width:300px;height:50px;font-size:24px" >
			</td>
		</tr>
	</table>
</form>