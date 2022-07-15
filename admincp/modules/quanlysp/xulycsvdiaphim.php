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
                $director = $data[1];
                $studio = $data[2];
                $ngonngu = $data[3];
                $run_time = $data[4];

                $media_format = $data[5];
                $subtitles = $data[6];

                $writers = $data[7];
                $country = $data[8];

                

                $cannang = $data[9];
                $kichthuoc = $data[10];
                
                $giasp = $data[11];
                $km = $data[12];
                $giagockm = $data[13];
                $soluong = $data[14];

                $hinhanh = $data[15];
                // $hinhanh_tmp = $data[0];
                // $hinhanh = time().'_'.$hinhanh;
                $tomtat = $data[16];
                
                $tinhtrang = $data[17];
                $danhmuc = $data[18];
            //su li hinh anh
                
                //them
                $sql_them = "INSERT INTO tbl_dvd(tensanpham,director,studio,ngonngu,run_time,meida_format,subtitles,writers,country,kichthuoc,cannang,giasp,km,giagockm,soluong,hinhanh,tomtat,tinhtrang,id_danhmuc) VALUE('".$tensanpham."','".$director."','".$studio."','".$ngonngu."','".$run_time."','".$media_format."','".$subtitles."','".$writers."','".$country."','".$kichthuoc."','".$cannang."','".$giasp."','".$km."','".$giagockm."','".$soluong."','".$hinhanh."','".$tomtat."','".$tinhtrang."','".$danhmuc."')";
                mysqli_query($mysqli,$sql_them);
                

                // inc the row
                $row++;
            }
            fclose($handle);
            header('location:../../index.php?action=quanlysp&query=themdiaphim');
        }
    }
}
?>