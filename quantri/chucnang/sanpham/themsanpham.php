<?php 
	if(!isset($ket_noi)){exit();}
?>
<?php
    if(isset($_POST["themsanpham"])){
    $ten=trim($_POST['ten']);
	$ten=str_replace("'","&#39;",$ten);
	$danh_muc=$_POST['danh_muc'];
	$gia=trim($_POST['gia']);
	if($gia==""){$gia=0;}
	$ten_file_anh=$_FILES['hinh_anh']['name'];
	$trang_chu=$_POST['trang_chu'];
	$noi_bat=$_POST['noi_bat'];
	$noi_dung=$_POST['noi_dung'];
	$noi_dung=str_replace("'","&#39;",$noi_dung);
	$tv_m="select max(sap_xep_trang_chu) from san_pham";
	$tv_m_1=mysqli_query($conn,$tv_m);
	$tv_m_2=mysqli_fetch_array($tv_m_1);
	$sap_xep_trang_chu=$tv_m_2[0]+1;
	if($ten!="")
	{
		if($ten_file_anh!="")
		{
			$tv_k="select count(*) from san_pham where hinh_anh='$ten_file_anh' ";
			$tv_k_1=mysqli_query($conn,$tv_k);
			$tv_k_2=mysqli_fetch_array($tv_k_1);
			if($tv_k_2[0]==0)
			{
				$tv="
				INSERT INTO san_pham (
				id ,
				ten ,
				gia ,
				hinh_anh ,
				noi_dung ,
				thuoc_menu ,
				noi_bat ,
				trang_chu ,
				sap_xep_trang_chu
				)
				VALUES (
				NULL ,
				'$ten',
				'$gia',
				'$ten_file_anh',
				'$noi_dung',
				'$danh_muc',
				'$noi_bat',
				'$trang_chu',
				'$sap_xep_trang_chu'
				);";
				mysqli_query($conn,$tv);
				header("location: ?thamso=sanpham");
				?>
			<script>
				alert("Sản phẩm đã thêm vào thành công!");
			</script>
			<?php

				$duong_dan_anh="../anh/sanpham/".$ten_file_anh;
				move_uploaded_file($_FILES['hinh_anh']['tmp_name'],$duong_dan_anh);
				
				$_SESSION['danh_muc_menu']=$danh_muc;
				$_SESSION['tuy_chon_trang_chu']=$trang_chu;
				$_SESSION['tuy_chon_noi_bat']=$noi_bat;
			}
			else 
			{
				?>
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
				alert("Chưa chọn ảnh");
			</script>
			<?php
		}
	}
	else 
	{
		?>
			<script>
				alert("Tên sản phẩm chưa được điền vào!");
			</script>
			<?php
	}
}
?>
<form action="" method="post" enctype="multipart/form-data" >
	<table width="990px" >
		<tr>
			<td colspan="2" ><b style="color:blue;font-size:20px" >Thêm sản phẩm</b><br><br> </td>
			
		</tr>
		<tr>
			<td width="150px" >Tên : </td>
			<td width="840px">
				<input style="width:400px;margin-top:3px;margin-bottom:3px;" name="ten" value="" >
			</td>
		</tr>
		<tr>
			<td>Danh mục : </td>
			<td>
				<?php
					if(!isset($_SESSION['danh_muc_menu']))
					{
						$_SESSION['danh_muc_menu']="";
					}
				?>
				<select name="danh_muc" style="margin-top:3px;margin-bottom:3px;" >
					<?php 
						$tv="select * from danhmuc order by id ";
						$tv_1=mysqli_query($conn,$tv);
						$a="";
						while($tv_2=mysqli_fetch_array($tv_1))
						{
							$ten=$tv_2['ten'];
							$id_menu=$tv_2['id'];
							if($_SESSION['danh_muc_menu']==$id_menu)
							{
								$a="selected";
							}
							echo "<option value='$id_menu' $a >";
								echo $ten;
							echo "</option>";
							$a="";
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td >Hình ảnh : </td>
			<td>
				<input type="file" name="hinh_anh" >
			</td>
		</tr>
		<tr>
			<td>Giá : </td>
			<td>
				<input style="width:400px;margin-top:3px;margin-bottom:3px;" name="gia" value="" >
			</td>
		</tr>
		<tr>
			<td>Trang chủ : </td>
			<td>
				<?php
					$a_1="";
					$a_2="";
					if(isset($_SESSION['tuy_chon_trang_chu']))
					{
						if($_SESSION['tuy_chon_trang_chu']=="co")
						{
							$a_2="selected";
						}
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
					if(isset($_SESSION['tuy_chon_noi_bat']))
					{
						if($_SESSION['tuy_chon_noi_bat']=="co")
						{
							$a_2="selected";
						}
					}
				?>
				<select name="noi_bat" style="margin-top:3px;margin-bottom:3px;" >
					<option value="" <?php echo $a_1; ?> >Không</option>
					<option value="co" <?php echo $a_2; ?> >Có</option>
				</select>
			</td>
		</tr>
		<tr>
			<td valign="top" >Nội dung : </td>
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
				  <textarea id="noi_dung" name="noi_dung" ></textarea>
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>
				<br>
				<input type="submit" name="themsanpham" value="Thêm sản phẩm" style="width:300px;height:50px;font-size:24px" >
			</td>
		</tr>
	</table>
</form>