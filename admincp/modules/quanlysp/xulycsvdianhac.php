<?php 
include('../../config/config.php');
$csv = array();

// check there are no errors
if($_FILES['csv']['error'] == 0){
    $tmp = explode('.', $_FILES['csv']['name']);
    $ext = strtolower(end($tmp));
    
    $tmpName = $_FILES['csv']['tmp_name'];

    // check the file is a csv
    if($ext === 'csv'){
        if(($handle = fopen($tmpName, 'r')) !== FALSE) {
            // necessary if a large csv file
            set_time_limit(0);

            $row = 0;

            while(($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
                // number of fields in the csv
                $col_count = count($data);

                // get the values from the csv
                
                $tensanpham = $data[0];
                $nghesi = $data[1];
                $nhasx = $data[2];
                $ngonngu = $data[3];
                $gernes1 = $data[4];
                $cannang = $data[5];
                $kichthuoc = $data[6];
                
                $giasp = $data[7];
                $km = $data[8];
                $giagockm = $data[9];
                $soluong = $data[10];

                $hinhanh =$data[1];
                // $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
                // $hinhanh = time().'_'.$hinhanh;
                $tomtat = $data[12];
                $tinhtrang = $data[13];
                $danhmuc = $data[14];
            //su li hinh anh
                
                //them
                $sql_them = "INSERT INTO tbl_cd(tensanpham,nghesi,nhasx,ngonngu,gernes1,kichthuoc,cannang,giasp,km,giagockm,soluong,hinhanh,tomtat,tinhtrang,id_danhmuc) VALUE('".$tensanpham."','".$nghesi."','".$nhasx."','".$ngonngu."','".$gernes1."','".$cannang."','".$kichthuoc."','".$giasp."','".$km."','".$giagockm."','".$soluong."','".$hinhanh."','".$tomtat."','".$tinhtrang."','".$danhmuc."')";
                mysqli_query($mysqli,$sql_them);
                        

                // inc the row
                $row++;
            }
            fclose($handle);
            header('location:../../index.php?action=quanlysp&query=themdianhac');
        }
    }
}
?>