<?php 
	if(!isset($ket_noi)){exit();}
?>
<?php 
	if(!isset($_GET['thamso'])){$thamso="";}else{$thamso=$_GET['thamso'];}
	
	switch($thamso)
	{

		case "danhmuc":
			include("chucnang/danhmuc/quanlydanhmuc.php");
		break;
		case "them_menu_doc":
			include("chucnang/danhmuc/themdanhmuc.php");
		break;
		case "sua_menu_doc":
			include("chucnang/danhmuc/suadanhmuc.php");
		break;
		case "sanpham":
			include("chucnang/sanpham/quanlysanpham.php");
		break;
		case "them_san_pham":
			include("chucnang/sanpham/themsanpham.php");
		break;
		case "sua_san_pham":
			include("chucnang/sanpham/suasanpham.php");
		break;
		default: 
			include("chucnang/quantri2/trangchu2.php");
	}
?>