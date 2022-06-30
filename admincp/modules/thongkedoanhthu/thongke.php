

<div class="container" style="padding:60px 0 0 300px;">
        <div class="row">
            
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Chọn khoảng thời gian
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <td>Từ:</td>
                                <td>
                                    <input type="date" id="timeCheckIn" name="timeCheckIn" class="form-control" value="<?php echo date('Y-m-d') ?>" />
                                </td>
                                <td>Đến:</td>
                                <td>
                                    <input type="date" id="timeCheckOut" name="timeCheckOut" class="form-control" value="<?php echo date('Y-m-d') ?>" />
                                </td>
                            </tr>
                        </table>

                    </div>
                    <button  class="panel-abc " name='hienthi' id='hienthi'>
                        Hiển thị

                    </button>
                
                </div>

            </div>
            
        </div>
</div>



<div class="quanlymenu">
            <h3>Thống kê </h3>
            <table  class='lietkesp' id='lietkesp' name='lietkesp'>
                <tr class="header_lietke">
                    <th>Id</th>
                    <th>Thời gian</th>
                    <th>Mã đơn hàng</th>
                    <th>Mã sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá gốc</th>
                    <th>Đơn giá</th>
                
                    <th>Doanh thu</th>
                
                
                </tr>
                <tr class="sttsp" id ='sttsp' name ='sttsp'>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                    <th>5</th>
                    <th>6</th>
                    <th>7</th>
                    <th>8</th>
                    
                </tr>
            </table>
    </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#hienthi").on("click",function() {
            var timeCheckIn = $('#timeCheckIn').val()
            var timeCheckOut = $('#timeCheckOut').val()
            $.ajax({
                url: "modules/thongkedoanhthu/xuli.php",
                type: "get",
                data: {
                    timeCheckIn:timeCheckIn,
                    timeCheckOut:timeCheckOut
                    
                },
                dataType: "text",
                success: function(data) {

                    $("#lietkesp").html(data);

                }

            });
        });
    })
</script>

