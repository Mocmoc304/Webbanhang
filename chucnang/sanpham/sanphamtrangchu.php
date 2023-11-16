<br><br>
Sản phẩm của chúng tôi 
<br><br>
<?php 
	
	$tv="select id,ten,gia,hinh_anh,thuoc_menu from san_pham where trang_chu='co' order by sap_xep_trang_chu desc limit 0,15";
	$tv_1=mysqli_query($conn,$tv);
	echo "<table>";
	while($tv_2=mysqli_fetch_array($tv_1))
	{
		echo "<tr>";
			for($i=1;$i<=3;$i++)
			{
				echo "<td align='center' width='215px' valign='top' class='product'>";
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
	echo "</table>";
?>