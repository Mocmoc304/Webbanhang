<?php
 $id=$_GET['id'];
	
	$so_du_lieu=6;
	$tv="select count(*) from san_pham where thuoc_menu='$id';";
	$tv_1=mysqli_query($conn,$tv);
	$tv_2=mysqli_fetch_array($tv_1);
	$so_trang=ceil($tv_2[0]/$so_du_lieu);
	
	if(!isset($_GET['trang'])){$vtbd=0;}else{$vtbd=($_GET['trang']-1)*$so_du_lieu;}
    $tv="SELECT ten FROM danhmuc WHERE id='$id';";
	$tv_1=mysqli_query($conn,$tv);
	$tv_2=mysqli_fetch_array($tv_1);
	$ten = $tv_2['ten'];
	echo "<h1 class='name-type'>";
	echo $ten;
	echo "</h1>";
	echo "<hr style='margin-left:30px'>";
	
	$tv="select id,ten,gia,hinh_anh,thuoc_menu from san_pham where thuoc_menu='$id' order by id desc limit $vtbd,$so_du_lieu";
	$tv_1=mysqli_query($conn,$tv);
	echo "<table>";
	while($tv_2=mysqli_fetch_array($tv_1))
	{
		echo "<tr >";
			for($i=1;$i<=3;$i++)
			{
				echo "<td align='center' width='215px' valign='top' class='product' >";
					if($tv_2!=false)
					{
						$link_anh="anh/sanpham/".$tv_2['hinh_anh'];
						$link_chi_tiet="?thamso=chi_tiet_san_pham&id=".$tv_2['id'];
						$gia=$tv_2['gia'];
						$gia=number_format($gia,0,",",".");
						echo "<a href='$link_chi_tiet' >";
							echo "<img src='$link_anh' width='160px' height='150px' >";
						echo "</a>";
						echo "<br>";
						echo "<br>";
						echo "<div class='name1'>";
						echo "<a href='$link_chi_tiet' class='name-product'>";
							echo $tv_2['ten'];
						echo "</a>";
						echo "</div>";
						echo "<div style='margin-top:5px' >";						
						echo "<p class='price'>";
						echo $gia;
						echo "</p>";
						echo "</div>";
						echo "<br>";
					}
					else 
					{
						echo "&nbsp;";
					}
				echo "</td>";
				if($i!=3)
				{
					$tv_2=mysqli_fetch_array($tv_1);
				}
			}
		echo "</tr>";
	}
	echo "<tr>";
		echo "<td colspan='3' align='center' >";
			echo "<div class='phantrang' >";
				for($i=1;$i<=$so_trang;$i++)
				{
					$link="?thamso=xuat_san_pham&id=".$_GET['id']."&trang=".$i;
					echo "<a href='$link' >";
						echo $i;echo " ";
					echo "</a>";
				}
			echo "</div>";
		echo "</td>";
	echo "</tr>";
	echo "</table>";
?>