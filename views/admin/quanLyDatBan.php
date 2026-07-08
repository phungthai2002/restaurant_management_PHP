<!--Start topbar header-->
<?php include '../admin/header.php' ?>
<?php

$sql1 = "SELECT * FROM user ";

$query = mysqli_query($conn, $sql1);

?>
<div class="content-wrapper">

    <div class="row mt-3">


        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Quản lý đặt bàn</h5>



                    <!-- <button type="submit" class="btn btn-light btn-round px-5"><a href="index.php?page_layout=them">
                            Thêm</a> </button> -->






                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">tên</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">số người</th>
                                    <th scope="col">yêu cầu</th>
                                    <th scope="col">Thời gian</th>
                                    <th scope="col">trạng thái</th>
                                    <th scope="col">Sửa | Xóa</th>



                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include_once '../../models/ketnoi.php';

                                $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 3;
                                $current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
                                $offset = ($current_page - 1) * $item_per_page;
                                $sql = "SELECT * FROM datban ORDER BY 'thoiGian' DESC LIMIT " . $item_per_page . " OFFSET " . $offset . "";
                                $totalRecords = mysqli_query($conn, "SELECT * FROM datban");
                                $totalRecords = $totalRecords->num_rows;
                                $totalPages = ceil($totalRecords / $item_per_page);

                                $query = mysqli_query($conn, $sql);


                                while ($rows = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $rows['id']; ?></th>
                                        <td><?php echo $rows['ten']; ?></td>
                                        <td><?php echo $rows['email']; ?></td>
                                        <td><?php echo $rows['soNguoi']; ?></td>
                                        <td><?php echo $rows['yeuCau']; ?></td>
                                        <td><?php echo $rows['thoiGian']; ?></td>
                                        <td><?php echo $rows['trangThai'] == 0 ? "Chờ xác nhận" : "Đã xác nhận"; ?></td>

                                        <td> <a href="suaDatBan.php?id=<?php echo $rows['id']; ?>"> Sửa </a> |
                                            <a onclick="return Del('<?php echo $rows['id']; ?>')" href="xoaDatBan.php?id=<?php echo $rows['id']; ?>"> Xóa </a>
                                        </td>
                                    </tr>
                                <?php

                                } ?>




                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php for ($num = 1; $num <= $totalPages; $num++) { ?>



        <a href="?per_page=<?= $item_per_page ?>&page=<?= $num ?>" class="btn" style="color:white;background-color:grey"><?= $num ?></a>


    <?php } ?>




</div>


<script>
    function Del(UserName) {
        return confirm("Bạn có muốn xóa đơn đặt bàn có id là " + UserName + " Không ?")
    }
</script>
<!--Start footer-->
<?php include '../admin/footer.php' ?>
<!--End footer-->