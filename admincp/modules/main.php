<div>
    <?php
        if(isset($_GET['action']) && $_GET['query']){
            $tam = $_GET['action'];
            $query = $_GET['query'];
         }else{
            $tam = '';
            $query = '';
         }
        // if($tam=='quanlymenu' && $query=='them'){
        //     include('./modules/quanlymenu/them.php' );
        //     include('./modules/quanlymenu/lietke.php');
        // }elseif ($tam=='quanlymenu' && $query=='sua'){
        //     include('./modules/quanlymenu/sua.php' );

        if ($tam=='quanlysp' && $query=='themsach'){
            include('./modules/quanlysp/themsach.php' );
        }elseif ($tam=='quanlysp' && $query=='liekesach'){
            include('./modules/quanlysp/lietkesach.php');
        }elseif ($tam=='quanlysp' && $query=='suasach'){
            include('./modules/quanlysp/suasach.php' );

        }elseif ($tam=='quanlysp' && $query=='themdianhac'){
            include('./modules/quanlysp/themdianhac.php');
        }elseif ($tam=='quanlysp' && $query=='suadianhac'){
            include('./modules/quanlysp/suadianhac.php' );
        }elseif ($tam=='quanlysp' && $query=='liekedianhac'){
            include('./modules/quanlysp/lietkedianhac.php');

        }elseif ($tam=='quanlysp' && $query=='themdiaphim'){
            include('./modules/quanlysp/themdiaphim.php' );
        }elseif ($tam=='quanlysp' && $query=='liekediaphim'){
            include('./modules/quanlysp/lietkediaphim.php');
        }elseif ($tam=='quanlysp' && $query=='suadiaphim'){
            include('./modules/quanlysp/suadiaphim.php' );
        
        
        }elseif ($tam=='thongkedoanhthu'&& $query=='thongke' ){
            include('./modules/thongkedoanhthu/thongke.php' );  
        }elseif ($tam=='thongkedoanhthu'&& $query=='hienthi' ){
            include('./modules/thongkedoanhthu/hienthi.php' );

        

        }elseif ($tam=='quanlydonhang' && $query=='lietke'){
            include('./modules/quanlydonhang/lietke.php');
        }elseif ($tam=='quanlydonhang' && $query=='xemdonhang'){
            include('./modules/quanlydonhang/xemdonhang.php' );
        }elseif ($tam=='quanlydonhang' && $query=='xuly'){
            include('./modules/quanlydonhang/xuly.php' );

        }elseif ($tam=='qlkhachhang' && $query=='lietke'){
            include('./modules/qlkhachhang/lietke.php');
        }elseif ($tam=='qlkhachhang' && $query=='xemdonhang'){
            include('./modules/qlkhachhang/xemdonhang.php' );
        }elseif ($tam=='qlkhachhang' && $query=='xuly'){
            include('./modules/qlkhachhang/xuly.php' );
        
        }elseif ($tam=='quanlytenchinhsach' && $query=='them'){
            include('./modules/qltenchinhsach/them.php');
            include('./modules/qltenchinhsach/lietke.php');
        }elseif ($tam=='quanlytenchinhsach' && $query=='sua'){
            include('./modules/qltenchinhsach/sua.php' );

        }elseif ($tam=='quanlychinhsach' && $query=='them'){
            include('./modules/qlchinhsach/them.php');
        }elseif ($tam=='quanlychinhsach' && $query=='lietke'){
            include('./modules/qlchinhsach/lietke.php');
       
        }elseif ($tam=='quanlychinhanh' && $query=='them'){
            include('./modules/quanlychinhanh/them.php');
            include('./modules/quanlychinhanh/lietke.php');
        }elseif ($tam=='quanlychinhanh' && $query=='sua'){
            include('./modules/quanlychinhanh/sua.php' );

        }elseif ($tam=='quanlylienhe' && $query=='them'){
            include('./modules/quanlylienhe/them.php');
            include('./modules/quanlylienhe/lietke.php');
        }elseif ($tam=='quanlylienhe' && $query=='sua'){
            include('./modules/quanlylienhe/sua.php' );
        
        }elseif ($tam=='anhtrangbia' && $query=='them'){
            include('./modules/anhtrangbia/them.php');
            include('./modules/anhtrangbia/lietke.php');
        }elseif ($tam=='anhtrangbia' && $query=='sua'){
            include('./modules/anhtrangbia/sua.php' );
        
        }elseif ($tam=='quanlybaibao' && $query=='them'){
            include('./modules/quanlybaibao/them.php');
        }elseif ($tam=='quanlybaibao' && $query=='sua'){
            include('./modules/quanlybaibao/sua.php' );  
        }elseif ($tam=='quanlybaibao' && $query=='lietke'){
            include('./modules/quanlybaibao/lietke.php');

        }else{
            include('./modules/dashboard.php');
        }
    ?>
</div>