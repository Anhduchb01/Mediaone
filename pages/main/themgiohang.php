<?php
	session_start();
	include('../../admincp/config/config.php');
	//them so luong
	
	if(isset($_GET['cong'])){
		$id=$_GET['cong'];
		foreach($_SESSION['cart'] as $cart_item){
			if($cart_item['id']!=$id){
				$product[]= array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp'],'size'=>$size);
				$_SESSION['cart'] = $product;
			}else{
				$tangsoluong = $cart_item['soluong'] + 1;
				if($cart_item['soluong']<=9){
					$product[]= array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$tangsoluong,'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp'],'size'=>$size);
					//nếu số lượng tăng lên 9 thì soluong = cart_item còn không thì số lượng = tángsoluong
				}else{
					$product[]= array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp'],'size'=>$size);
				}
				$_SESSION['cart'] = $product;
			}
			
		}
		header('Location:../../index.php?quanly=giohang');
	}
	//tru so luong
	if(isset($_GET['tru'])){
		$id=$_GET['tru'];
		foreach($_SESSION['cart'] as $cart_item){
			if($cart_item['id']!=$id){
				$product[]= array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
				$_SESSION['cart'] = $product;
			}else{
				$trusoluong = $cart_item['soluong'] - 1;
				if($cart_item['soluong']>1){
					
					$product[]= array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$trusoluong,'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
				}else{
					$product[]= array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
				}
				$_SESSION['cart'] = $product;
			}
			
		}
		header('Location:../../index.php?quanly=giohang');
	}
	//xoa san pham o gio hang
	if(isset($_SESSION['cart'])&&isset($_GET['xoa'])){
		$id=$_GET['xoa'];
		foreach($_SESSION['cart'] as $cart_item){

			if($cart_item['id']!=$id){ //nó dà xoát tất cả id có trong sản phẩm khi có id trùng thì mới xóa
				$product[]= array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
			}

		$_SESSION['cart'] = $product;
		header('Location:../../index.php?quanly=giohang');
		}
	}
	//xoa san pham ở modal
	if(isset($_SESSION['cart'])&&isset($_GET['xoa1'])){
		$id=$_GET['xoa1'];
		foreach($_SESSION['cart'] as $cart_item){

			if($cart_item['id']!=$id){ //nó dà xoát tất cả id có trong sản phẩm khi có id trùng thì mới xóa
				$product[]= array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
			}

		$_SESSION['cart'] = $product;
		header('Location:../../index.php');
		}
	}
	// xoa tat ca
	if(isset($_GET['xoatatca'])&&$_GET['xoatatca']==1){
		unset($_SESSION['cart']);
		header('Location:../../index.php?quanly=giohang');
	}
	//them sanpham vao gio hang
	if(isset($_POST['themgiohang'])){
		//session_destroy();
		$id=$_GET['idsanpham'];
		$soluong=1;
		$danhmuc=$_GET['danhmuc'];
		// $sql ="SELECT * FROM tbl_sanpham WHERE id_sanpham='".$id."' LIMIT 1";
		$sql = "(SELECT `id_sanpham`, `tensanpham`, `giasp`, `km`, `giagockm`, `kichthuoc`, `cannang`,`ngonngu`, `tomtat`, `hinhanh`, `tinhtrang`, `soluong`, `id_danhmuc`, `director`, `run_time`, `studio`, `writers`,NULL as `nghesi`,NULL as `gernes1`,NULL as `nhasx`,NULl as tacgia,NULL as nhaphathanh FROM tbl_dvd WHERE  id_sanpham = '".$id."' AND id_danhmuc='".$danhmuc."' AND tinhtrang=1  LIMIT 1)
		UNION 
		(SELECT `id_sanpham`, `tensanpham`, `giasp`, `km`, `giagockm`, `kichthuoc`, `cannang`, `ngonngu`, `tomtat`, `hinhanh`, `tinhtrang`, `soluong`, `id_danhmuc`,NULL as `director` ,NULL as `run_time` ,NULL as `studio`,NULL as `writers`,NULL as `nghesi`,NULL as `gernes1`,NULL as `nhasx`,`tacgia`, `nhaphathanh` FROM tbl_book WHERE id_sanpham = '".$id."' AND id_danhmuc='".$danhmuc."' AND tinhtrang=1  LIMIT 1)
		UNION 
		(SELECT `id_sanpham`, `tensanpham`, `giasp`, `km`, `giagockm`, `kichthuoc`, `cannang`, `ngonngu`, `tomtat`, `hinhanh`, `tinhtrang`, `soluong`, `id_danhmuc`,NULL as `director` ,NULL as `run_time` ,NULL as `studio`,NULL as `writers`,`nghesi`,`gernes1`,`nhasx`,NULL as`tacgia`,NULL as `nhaphathanh` FROM tbl_cd WHERE id_sanpham = '".$id."' AND id_danhmuc='".$danhmuc."' AND tinhtrang=1  LIMIT 1) 
		";
		$query = mysqli_query($mysqli,$sql);
		$row = mysqli_fetch_array($query);
		if($row){
			$new_product=array(array('tensanpham'=>$row['tensanpham'],'id'=>$id,'danhmuc'=>$danhmuc,'soluong'=>$soluong,'giasp'=>$row['giasp'],'hinhanh'=>$row['hinhanh'],'giasp'=>$row['giasp'],'giagockm'=>$row['giagockm']));
			//kiem tra session gio hang ton tai
			if(isset($_SESSION['cart'])){
				$found = false;
				foreach($_SESSION['cart'] as $cart_item){
					//neu du lieu trung
					if($cart_item['id']==$id){
						$product[]= array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'danhmuc'=>$cart_item['danhmuc'],'soluong'=>$soluong+1,'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'giasp'=>$cart_item['giasp'],'giagockm'=>$cart_item['giagockm']);
						$found = true;
					}else{
						//neu du lieu khong trung
						$product[]= array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'danhmuc'=>$cart_item['danhmuc'],'soluong'=>$cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'giasp'=>$cart_item['giasp'],'giagockm'=>$cart_item['giagockm']);
					}
				}
				if($found == false){
					//lien ket du lieu new_product voi product
					$_SESSION['cart']=array_merge($product,$new_product);//lien ket mang
				}else{
					$_SESSION['cart']=$product;
				}
			}else{
				$_SESSION['cart'] = $new_product;
			}

		}
		header('Location:../../index.php');
		
	}
    
    

?>