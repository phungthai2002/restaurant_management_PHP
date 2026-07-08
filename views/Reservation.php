<?php
if (isset($_POST['submit'])) {
    if(isset($_SESSION['username'])){
    include_once '../models/ketnoi.php';
    $ten = $_POST['ten'];
    $email = $_POST['email'];
    $soNguoi = $_POST['soNguoi'];
    $yeuCau = $_POST['yeuCau'];
    $thoiGian = $_POST['thoiGian'];
    $trangThai = 0;
    $sql = "INSERT INTO `datban`(`ten`, `email`, `soNguoi`, `yeuCau`, `thoiGian`, `trangThai`) VALUES ('$ten', '$email', '$soNguoi', '$yeuCau', '$thoiGian', '$trangThai')";
    $query = mysqli_query($conn, $sql);
}else{
    echo '<script>alert("Hãy đăng nhập");</script>';
    header('location:controller/index.php');

}
    // $result = $conn->query($sql);
}
?>

<div class="container-xxl py-5 px-0 wow fadeInUp" data-wow-delay="0.1s">
    <div class="row g-0">
        <div class="col-md-6">
            <div class="video">
                <button type="button" class="btn-play" data-bs-toggle="modal" data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-bs-target="#videoModal">
                    <span></span>
                </button>
            </div>
        </div>
        <div class="col-md-6 bg-dark d-flex align-items-center">
            <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
                <h5 class="section-title ff-secondary text-start text-primary fw-normal">
                    Đặt chỗ
                </h5>
                <h1 class="text-white mb-4">Đặt bàn trực tuyến</h1>
                <form action="" method="POST">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="name" placeholder="Your Name" name="ten" required/>
                                <label for="name">Tên của bạn</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="tel" class="form-control" id="email" placeholder="Your Email" name="email" required/>
                                <label for="email">email của bạn</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating date" id="date3" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" id="datetime" placeholder="Date & Time" data-target="#date3" data-toggle="datetimepicker" name="thoiGian" />
                                <label for="datetime">Thời gian</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <select class="form-select" id="select1" name="soNguoi">
                                    <option value="1-2 người">1-2 người</option>
                                    <option value="3-4 người">3-4 người</option>
                                    <option value="4-6 người">4-6 người</option>
                                    <option value=">6 người"> >6 người</option>
                                </select>
                                <label for="select1">Số người</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Special Request" id="message" style="height: 100px" name="yeuCau"></textarea>
                                <label for="message">Yêu cầu đặc biệt</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3" type="submit" name="submit">
                                Đặt ngay
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- 16:9 aspect ratio -->
                <div class="ratio ratio-16x9">
                    <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always" allow="autoplay"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>