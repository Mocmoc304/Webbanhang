<?php session_start();
	$ket_noi="yes";
    include("../ketnoi.php");	
	include("./chucnang/quantri2/xacdinhdangnhap.php");
	if(isset($xac_dinh_dang_nhap))
	{
		if($xac_dinh_dang_nhap=="co")
		{
			include("chucnang/quantri2/xulypostget.php");
		}   
	}
?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Quản trị</title>
		<script src='phanbotro/tinymce/js/tinymce/tinymce.min.js'></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
		<link rel="stylesheet" type="text/css" href="giaodien/giaodien.css">
	</head>
	<body>
		<?php 
			if(!isset($xac_dinh_dang_nhap))
			{
				include("chucnang/quantri2/khungdangnhap.php");
			}
			else 
			{
				if($xac_dinh_dang_nhap=="co")
				{
					echo "<center>";
						include("chucnang/quantri2/trangchu.php");
					echo "</center>";
				}
			}
		?>
	</body>
</html>
