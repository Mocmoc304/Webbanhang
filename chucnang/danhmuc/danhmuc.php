<?php
$tv="select * from danhmuc order by id";
	$tv_1=mysqli_query($conn,$tv);
	echo "<div class='sub-menu' >";
	while($tv_2=mysqli_fetch_array($tv_1))
	{
		$link="?thamso=xuat_san_pham&id=".$tv_2['id'];
		echo "<a href='$link'>";
			echo $tv_2['ten'];
		echo "</a>";
	}
	echo "</div>";
?>