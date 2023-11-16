<?php if(isset($_GET['thamso'])){$tham_so=$_GET['thamso'];}else{$tham_so="";}
	switch($tham_so)
	{
		case "xuat_san_pham":
			include("chucnang/sanpham/xuat.php");
		break;
		case "chi_tiet_san_pham":
            include("chucnang/sanpham/chitietsanpham.php");
        break;
		case "xuat_mot_tin":
        include("chucnang/xuatmottin.php");
        break;
        case "tim_kiem":
        include("chucnang/timkiem/xuatsanphamtimkiem.php");
        break;
        case "gio_hang":
        include("chucnang/giohang/giohang.php");
        break;
        default:
        include("chucnang/slideshow/slideshow.php");
        include("chucnang/sanpham/sanphamtrangchu.php");
        }
?>