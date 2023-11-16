<?php 
	if(!isset($ket_noi)){exit();}
?>
<div style="width:900px;text-align:left" >
	<a href="?thamso=them_menu_doc" class="btn btn-success" >Thêm danh mục</a><br>
	<?php 
	$so_dong_tren_mot_trang=20;
	if(!isset($_GET['trang'])){$_GET['trang']=1;}
	
	$tv="select count(*) from danhmuc";
	$tv_1=mysqli_query($conn,$tv);
	$tv_2=mysqli_fetch_array($tv_1);
	$so_trang=ceil($tv_2[0]/$so_dong_tren_mot_trang);
	
	$vtbd=($_GET['trang']-1)*$so_dong_tren_mot_trang;
	$tv="select * from danhmuc order by id limit $vtbd,$so_dong_tren_mot_trang";
	$tv_1=mysqli_query($conn,$tv);
?>
<table width="900px" class="tb_a1" >
	<tr style="background:#CCFFFF;height:40px;" >
		<td width="500px" ><b>Tên</b></td>
		<td align="center" width="200px" ><b>Sửa</b></td>
		<td align="center" width="200px" ><b>Xóa</b></td>
	</tr>
	<?php 
		while($tv_2=mysqli_fetch_array($tv_1))
		{
			$id=$tv_2['id'];
			$ten=$tv_2['ten'];
			$link_sua="?thamso=sua_menu_doc&id=".$id."&trang=".$_GET['trang'];
			$link_xoa="?xoadanhmuc=co&id=".$id;
			?>
				<tr class="a_1" >
					<td>
						<a href="<?php echo $link_sua; ?>" class="lk_a1" ><?php echo $ten; ?></a>
					</td>
					<td align="center" >
						<a href="<?php echo $link_sua; ?>" class="lk_a1" >Sửa</a>
					</td>
					<td align="center" >
						<a href="<?php echo $link_xoa; ?>" class="lk_a1" >Xóa</a>
					</td>
				</tr>
			<?php 
		}
	?>
	<tr>
		<td colspan="3" align="center" >
			<br>
			<?php 
				for($i=1;$i<=$so_trang;$i++)
				{
					$link_phan_trang="?thamso=&trang=".$i;
					echo "<a href='$link_phan_trang' class='phan_trang' >";
						echo $i;
					echo "</a> ";
				}
			?>
			<br><br>
		</td>
	</tr>
</table>
</div>