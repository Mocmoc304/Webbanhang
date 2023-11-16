<?php 
session_start();
include("ketnoi.php");
if(isset($_POST['thong_tin_khach_hang']))
{
    include("chucnang/giohang/thuchienmuahang.php");
}
if(isset($_POST['cap_nhat_gio_hang']))
{
    include("chucnang/giohang/capnhatgiohang.php");
    ?>
		<script type="text/javascript">
					window.history.back();
		</script>
	<?php
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/banner.css">
    <link rel="stylesheet" href="css/main-menu.css">
    <link rel="stylesheet" href="css/sub-menu.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/footer.css">
    <title>Web bán hàng</title>
</head>
<body>
    <center>
        <table width="100%">
            <tr>
                <td colspan="3" class="banner">
                    <?php
                    include("chucnang/banner/banner.php");
                    ?>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <?php
                    include("chucnang/mainmenu/mainmenu.php");
                    ?>
                
                </td>
            </tr>
            <tr>
                <td width="170px" valign="top">
                    <?php
                    include("chucnang/danhmuc/danhmuc.php");
                    include("chucnang/danhmuc/moi.php");
                    include("chucnang/quangcao/trai.php");
                    ?>
                </td>
                <td width="650px" valign="top">
                    <?php 
                    include("chucnang/dieuhuong.php");
                    ?>
                </td>
                <td width="170px" valign="top">
                    <?php
                    include("chucnang/timkiem/timkiem.php");
                    include("chucnang/giohang/vunggiohang.php");
                    include("chucnang/timkiem/noibat.php");
                    include("chucnang/quangcao/phai.php");
                    ?>
                </td>
            </tr>
            <tr>
                <td colspan="3" class="footer">
                    <?php 
                    include("chucnang/footer/footer.php");
                ?>
                </td>
            </tr>

        </table>
    </center>
    
</body>

</html>