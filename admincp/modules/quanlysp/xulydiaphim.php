
<?php
   
    include('../../config/config.php'); //truyền dữ liệu về mysql
    
    //gọi tên danh mục avf thứ tự từ bên trang thêm sang
    
    
    
    //bắt đầu truyền về mysq/
    if(isset($_POST['themsanpham'])){
        $tensanpham = $_POST['tensanpham'];
        $director = $_POST['director'];
        $studio = $_POST['studio'];
        $ngonngu = $_POST['ngonngu'];
        $run_time = $_POST['run_time'];

        $media_format = $_POST['media_format'];
        $subtitles = $_POST['subtitles'];

        $writers = $_POST['writers'];
        $country = $_POST['country'];

        

        $cannang = $_POST['cannang'];
        $kichthuoc = $_POST['kichthuoc'];
        
        $giasp = $_POST['giasp'];
        $km = $_POST['km'];
        $giagockm = $_POST['giagockm'];
        $soluong = $_POST['soluong'];

        $hinhanh = $_FILES['hinhanh']['name'];
        $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
        $hinhanh = time().'_'.$hinhanh;
        $tomtat = $_POST['tomtat'];
        
        $tinhtrang = $_POST['tinhtrang'];
        $danhmuc = $_POST['danhmuc'];
    //su li hinh anh
        
        //them
        $sql_them = "INSERT INTO tbl_dvd(tensanpham,director,studio,ngonngu,run_time,meida_format,subtitles,writers,country,kichthuoc,cannang,giasp,km,giagockm,soluong,hinhanh,tomtat,tinhtrang,id_danhmuc) VALUE('".$tensanpham."','".$director."','".$studio."','".$ngonngu."','".$run_time."','".$media_format."','".$subtitles."','".$writers."','".$country."','".$kichthuoc."','".$cannang."','".$giasp."','".$km."','".$giagockm."','".$soluong."','".$hinhanh."','".$tomtat."','".$tinhtrang."','".$danhmuc."')";
        mysqli_query($mysqli,$sql_them);
        move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
        header('location:../../index.php?action=quanlysp&query=themdiaphim'); //quay lại trang them.php
    }elseif(isset($_POST['suasanpham'])){
        $tensanpham = $_POST['tensanpham'];
        $director = $_POST['director'];
        $studio = $_POST['studio'];
        $ngonngu = $_POST['ngonngu'];
        $run_time = $_POST['run_time'];

        $media_format = $_POST['media_format'];
        $subtitles = $_POST['subtitles'];

        $writers = $_POST['writers'];
        $country = $_POST['country'];

        

        $cannang = $_POST['cannang'];
        $kichthuoc = $_POST['kichthuoc'];
        
        $giasp = $_POST['giasp'];
        $km = $_POST['km'];
        $giagockm = $_POST['giagockm'];
        $soluong = $_POST['soluong'];

        $hinhanh = $_FILES['hinhanh']['name'];
        $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
        $hinhanh = time().'_'.$hinhanh;
        $tomtat = $_POST['tomtat'];
        
        $tinhtrang = $_POST['tinhtrang'];
        $danhmuc = $_POST['danhmuc'];
    //su li hinh anh
        //sua
        if(!empty($_FILES['hinhanh']['name'])){
            move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
            
            $sql_update = "UPDATE tbl_dvd SET tensanpham='".$tensanpham."','".$director."','".$studio."','".$ngonngu."','".$run_time."','".$media_format."','".$subtitles."','".$writers."','".$country."',kichthuoc='".$kichthuoc."',cannang='".$cannang."',giasp='".$giasp."',km='".$km."',giagockm='".$giagockm."',soluong='".$soluong."',hinhanh='".$hinhanh."',tomtat='".$tomtat."',tinhtrang='".$tinhtrang."',id_danhmuc='".$danhmuc."' WHERE id_sanpham='$_GET[idsanpham]'";
            // update xong mowis sua hinh anh
            $sql = "SELECT * FROM tbl_book WHERE id_sanpham = '$_GET[idsanpham]' LIMIT 1";
            $query = mysqli_query($mysqli,$sql);
            while($row = mysqli_fetch_array($query)){
                unlink('./uploads/'.$row['hinhanh']);
            }
        }else{
            $sql_update = "UPDATE tbl_dvd SET tensanpham='".$tensanpham."',director='".$director."',studio='".$studio."',ngonngu='".$ngonngu."',run_time='".$run_time."',media_format='".$media_format."',subtitles='".$subtitles."',writers='".$writers."',country='".$country."',kichthuoc='".$kichthuoc."',cannang='".$cannang."',giasp='".$giasp."',km='".$km."',giagockm='".$giagockm."',soluong='".$soluong."',tomtat='".$tomtat."',tinhtrang='".$tinhtrang."',id_danhmuc='".$danhmuc."' WHERE id_sanpham='$_GET[idsanpham]'";

        }
        mysqli_query($mysqli,$sql_update);
        header('location:../../index.php?action=quanlysp&query=liekediaphim'); //quay lại trang them.php
    }else{
        //xoa
        $id=$_GET['idsanpham'];
        $sql = "SELECT * FROM tbl_dvd WHERE id_sanpham = '$id' LIMIT 1";
        $query = mysqli_query($mysqli,$sql);
        while($row = mysqli_fetch_array($query)){
            unlink('uploads/'.$row['hinhanh']);
        }
        $sql_xoa = "DELETE FROM tbl_dvdWHERE id_sanpham='".$id."'";
        mysqli_query($mysqli,$sql_xoa);
        header('location:../../index.php?action=quanlysp&query=liekediaphim');
    }
?>