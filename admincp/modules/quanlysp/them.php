<div class="quanlymenu">
            <h3>thêm sản phẩm</h3>

            <table class='them_menu'>
                <form method="POST" action="./modules/quanlysp/xuly.php" enctype="multipart/form-data"> <!-- muon gui hinh anh qua post pha them enctype -->
                    <tr>
                        <td class="them_menu1">Tên Sản Phẩm</td>
                        <td class="them_menu2"><input type="text" name="tensanpham"></td>
                    </tr>
                    <tr>
                        <td  class="them_menu1">Mã sp</td>
                        <td class="them_menu2"><input type="text" name="masp"></td>
                    </tr>
                    <tr>
                        <td  class="them_menu1">Khuyến mãi %</td>
                        <td class="them_menu2"><input type="number" name="km"></td>
                    </tr>
                    <tr>
                        <td  class="them_menu1">Giá sp</td>
                        <td class="them_menu2"><input type="number" name="giasp"></td>
                    </tr>
                    <tr>
                        <td  class="them_menu1">Giá gốc </td>
                        <td class="them_menu2"><input type="number" name="giagockm"></td>
                    </tr>
                    <tr>
                        <td  class="them_menu1">Số lượng</td>
                        <td class="them_menu2"><input type="number" name="soluong"></td>
                    </tr>
                    <tr>
                        <td  class="them_menu1">Hình ảnh</td>
                        <td class="them_menu2"><input type="file" name="hinhanh"></td>
                    </tr>
            
                    <tr>
                        <td  class="them_menu1">Tóm tắt</td>
                        <td class="them_menu2"><textarea rows="5" name="tomtat" id="tomtat"></textarea></td>
                    </tr>
                    
                    <tr>
                        <td  class="them_menu1">Danh muc san pham</td>
                        <td class="them_menu2">
                            <select name="danhmuc">
                                <?php
                                    $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
                                    $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
                                    while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
                                ?>
                                <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td  class="them_menu1">Tình trạng</td>
                        <td class="them_menu2">
                            <select name="tinhtrang">
                                <option value="1">Còn hàng</option>
                                <option value="0">Hết</option>
                            </select>
                        </td>
                    </tr>
                    <tr class="them_menu3">
                        <td colspan ='2'><input type="submit" name='themsanpham' value='Thêm sản phẩm'></td>
                    </tr>
                </form>
            </table>

        </div>