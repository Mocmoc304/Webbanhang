<?php 
	if(!isset($ket_noi)){exit();}
?>
<?php
	if(isset($_POST['suadanhmuc']))
	{
		include("chucnang/danhmuc/suadanhmuc.php");
		?>
		<script type="text/javascript">
					window.history.back();
		</script>
		<?php
	}
	if(isset($_GET['xoadanhmuc']))
	{
		include("chucnang/danhmuc/xoadanhmuc.php");
		?>
		<script type="text/javascript">
					window.history.back();
		</script>
		<?php
	}
	if(isset($_POST['themdanhmuc']))
	{
		include("chucnang/danhmuc/themdanhmuc.php");
		?>
		<script type="text/javascript">
					window.history.back();
		</script>
		<?php
	}
	if(isset($_POST['themsanpham']))
	{
		include("chucnang/sanpham/themsanphamvaocsdl.php");
		?>
		<script type="text/javascript">
					window.history.back();
		</script>
		<?php
	}
	if(isset($_POST['suasanpham']))
	{
		include("chuc_ang/sanpham/suasanpham.php");
		?>
		<script type="text/javascript">
					window.history.back();
		</script>
		<?php
	}
	if(isset($_GET['xoasanpham']))
	{
		include("chucnang/sanpham/xoasanpham.php");
		?>
		<script type="text/javascript">
					window.history.back();
		</script>
		<?php
	}
	if(isset($_GET['thamso']))
	{
		
		if($_GET['thamso']=="thoat")
		{
			include("chucnang/quantri2/logout.php");
			?>
		<script type="text/javascript">
					window.history.back();
		</script>
		<?php
		}
	}
?>