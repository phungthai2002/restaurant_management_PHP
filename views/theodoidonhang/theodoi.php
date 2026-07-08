<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">


    <title>Đơn hàng</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body {
            margin-top: 20px;
            background: #eee;
        }

        .ui-w-40 {
            width: 40px !important;
            height: auto;
        }

        .card {
            box-shadow: 0 1px 15px 1px rgba(52, 40, 104, .08);
        }

        .ui-product-color {
            display: inline-block;
            overflow: hidden;
            margin: .144em;
            width: .875rem;
            height: .875rem;
            border-radius: 10rem;
            -webkit-box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.15) inset;
            box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.15) inset;
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <div class="container px-3 my-5 clearfix">

        <div class="card">
            <div class="card-header">
                <h2>Đơn hàng đã mua</h2> 
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <?php
                    include_once("../../models/ketnoi.php");
                    session_start();
                    $name =  $_SESSION['username'];
                    $sql_theodoi = "SELECT UserName,NgayLap,PhuongThucTT,GhiChu,TenSP,SoLuong,TongTienHD 
                    FROM hoadonban,chitiethoadon,danhmucsp,ban 
                    WHERE hoadonban.MaHoaDon=chitiethoadon.MaHoaDon AND 
                    chitiethoadon.MaChiTietSP = danhmucsp.MaSP AND UserName='$name'";
                    $result_theodoi = $conn->query($sql_theodoi);
                    $tong_don = $result_theodoi->num_rows;
                    echo '<h6>Số đơn hàng đã mua: '.$tong_don.'</h6>';


                    ?>
                        <form action="" id="cart" method="post">
                            <table class="table table-bordered m-0">
                                <thead>
                                    <tr>
                                        
                                        <th class="text-center py-3 px-4" style="min-width: 100px;">Người dùng</th>
                                        <th class="text-right py-3 px-4" style="width: 400px;">Ngày lập</th>
                                        <th class="text-center py-3 px-4" style="width: 120px;">Tên món</th>
                                        <th class="text-right py-3 px-4" style="width: 100px;">Số lượng</th>
                                        <th class="text-right py-3 px-4" style="width: 430px;">tổng tiền</th>
                                        <th class="text-center py-3 px-4" style="width: 120px;">ghi chú</th>
                                        <th class="text-right py-3 px-4" style="width: 100px;">Phương thức thanh toán</th>
                                        <!-- <th class="text-center align-middle py-3 px-0" style="width: 40px;"><a href="#" class="shop-tooltip float-none text-light" title data-original-title="Clear cart"><i class="ino ion-md-trash"></i></a></th> -->
                                    </tr>
                                </thead>
                                <?php
                                while ($row = $result_theodoi->fetch_assoc()) {
                                    // $totalPrice = $row["GiaBan"] * $_SESSION["cart"][$row["MaSP"]];
                                    // $totalPriceAll += $totalPrice;
                                ?>
                                    <tbody>
                                        <tr>
                                            <td class="p-4">
                                                <div class="media align-items-center">
                                                    <!-- <img src="../img/<?php //echo $row["Anh"]; ?>.jpg" class="d-block ui-w-40 ui-bordered mr-4" alt> -->
                                                    <div class="media-body">
                                                        <a href="#" class="d-block text-dark"><?php echo $row["UserName"]; ?></a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-right font-weight-semibold align-middle p-4"><?php echo $row["NgayLap"]; ?></td>
                                            <td class="text-right font-weight-semibold align-middle p-4"><?php echo $row["TenSP"]; ?></td>
                                            <td class="text-right font-weight-semibold align-middle p-4"><?php echo $row["SoLuong"]; ?></td>
                                            <td class="text-right font-weight-semibold align-middle p-4"><?php echo $row["TongTienHD"]; ?></td>
                                            <td class="text-right font-weight-semibold align-middle p-4"><?php echo $row["GhiChu"]; ?></td>
                                            <td class="text-right font-weight-semibold align-middle p-4"><?php 
                                            if($row["PhuongThucTT"]==0){echo 'Chuyển khoản';}else{echo 'Tiền mặt';}; ?></td>

                                            <!-- <td class="align-middle p-4"><input type="number" class="form-control text-center" name="quantity[<?php //echo $row["MaSP"]; ?>]" value="<?php echo $_SESSION["cart"][$row["MaSP"]]; ?>"></td> -->
                                            <!-- <td class="text-right font-weight-semibold align-middle p-4"><?php // echo number_format($totalPrice); ?></td> -->
                                            <!-- <td class="text-center align-middle px-0"><a href="deleteFromCart.php?MaSP=<?php //echo $row["MaSP"] ?>" class="shop-tooltip close float-none text-danger" title data-original-title="Remove">×</a></td> -->
                                        </tr>
                                    </tbody>
                                <?php

                                }
                                ?>
                            </table>
                            <!-- <div style="margin-top:15px">
                                <a class="btn btn-primary" onclick="document.getElementById('cart').submit();" href="#">Cập nhật giỏ hàng</a>
                                <a class="btn btn-warning" href="deleteFromCart.php?MaSP=0">Xóa hết giỏ hàng</a>
                            </div> -->
                        </form>
                </div>

                <!--<div class="d-flex flex-wrap justify-content-between align-items-center pb-4">
                    <form action="">
                        <div class="mt-4">
                            <label class="text-muted font-weight-normal">Mã giảm giá (chỉ được dùng 1)</label>
                            <input type="text" placeholder="Discount" class="form-control" name="discount">
                            <input class="btn" type="submit" style="margin-top:10px" value="Áp dụng">
                        </div>
                    </form>
                    <div class="d-flex">
                        <div class="text-right mt-4 mr-5">
                            <label class="text-muted font-weight-normal m-0">Giảm giá</label>
                            <div class="text-large"><strong>$0</strong></div>
                        </div>
                        <div class="text-right mt-4">
                            <label class="text-muted font-weight-normal m-0">Tổng tiền</label>
                            <div class="text-large"><strong><?php echo $totalPriceAll; ?></strong></div>
                        </div>
                    </div>
                </div>-->
                <div class="float-right">
                    <a href="../../index.php"><button type="button" class="btn btn-lg btn-default md-btn-flat mt-2 mr-3">Back to shopping</button></a>
                    <!-- <a href="muahang.php"><button type="button" class="btn btn-lg btn-primary mt-2">Thanh toán</button></a> -->
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">

    </script>
</body>

</html>