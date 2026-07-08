<?php 
include '../admin/header.php';
include_once '../../models/ketnoi.php';
?>
<?php
    if(isset($_GET["id"])){

        $id=$_GET["id"];
    }

?>


<?php
        $sqluser ="SELECT * FROM datban";
        $queryuser = mysqli_query($conn,$sqluser);
        
        $sqlsua ="SELECT *FROM datban  WHERE id='$id'";
        $querysua = mysqli_query($conn,$sqlsua);
        $rows = mysqli_fetch_array($querysua);

        if(isset($_POST['Sua'])){
            $id=$_POST['id'];
           
            $ten=$_POST['ten'];
          
            $email=$_POST['email'];
    
            $soNguoi=$_POST['soNguoi'];
    
            $yeuCau=$_POST['yeuCau'];
    
            $thoiGian=$_POST['thoiGian'];
    
            $trangThai=$_POST['trangThai'];
    
         
    
    
    
            if($id !=""){
                $sqlSua ="UPDATE datban SET `soNguoi`='$soNguoi',  `yeuCau` ='$yeuCau' 
                ,thoiGian='$thoiGian',trangThai='$trangThai' WHERE id='$id' ";
            $query = mysqli_query($conn,$sqlSua);
            header('location: ../admin/quanLyDatBan.php');
    
            }
            
        }


?>


<div class="content-wrapper">

<div class="col-lg-6">
    <div class="card">
        <div class="card-body">
            <div class="card-title">Sửa Trạng thái đặt bàn</div>
            <form method="POST" action ="">
            
            <div  class="form-group">
                    <label   for="input-6">Id</label>
                    <input readonly name="id" value="<?php echo $rows['id']; ?>" type="text" class="form-control form-control-rounded" id="input-6" placeholder="Enter Your UserName">
                    <span asp-validation-for="UsernName" class="text-danger"></span>
                </div>
                
                <div  class="form-group">
                    <label  for="input-7">Tên</label>
                    <input readonly name="ten" value="<?php echo $rows['ten']; ?>" type="text" class="form-control form-control-rounded" id="input-7" placeholder="Enter Your Password">
                </div>

               
                    

                <div  class="form-group">
                    <label for="input-7">Số điện thoại </label>
                    <input readonly name ="email" value="<?php echo $rows['email']; ?>" type="text" class="form-control form-control-rounded" id="input-7" placeholder="Enter Your Họ ">
                </div>

                <div  class="form-group">
                    <label for="input-7">Số người </label>
                    <input name ="soNguoi" value="<?php echo $rows['soNguoi']; ?>" type="text" class="form-control form-control-rounded" id="input-7" placeholder="Enter Your Tên ">
                </div>
                <div  class="form-group">
                    <label for="input-7">Yêu cầu </label>
                    <input name ="yeuCau" value="<?php echo $rows['yeuCau']; ?>" type="text" class="form-control form-control-rounded" id="input-7" placeholder="Enter Your Tên ">
                </div>
                <div  class="form-group">
                    <label for="input-7">Thời gian </label>
                    <input name ="thoiGian" value="<?php echo $rows['thoiGian']; ?>" type="text" class="form-control form-control-rounded" id="input-7" placeholder="Enter Your Tên ">
                </div>

                <div  class="form-group">
                    <label for="input-8">Trạng thái</label>
                    <select name="trangThai" class="form-control form-control-rounded" id="input-7" placeholder="Enter trangThai">
                        <option value="0">chờ xác nhận</option>
                        <option value="1">đã xác nhận</option>
                    </select>
                </div>
<!-- 
                <div  class="form-group">
                    <label for="input-7">SDT </label>
                    <input name ="SDT" value="<?php ///echo $rows['SDT']; ?>"  type="text" class="form-control form-control-rounded" id="input-7" placeholder="Enter Your SDT ">
                </div>
            
                <div  class="form-group">
                    <label for="input-7">Địa Chỉ </label>
                    <input name ="DiaChi" value="<?php //echo $rows['DiaChi']; ?>"  type="text" class="form-control form-control-rounded" id="input-7" placeholder="Enter Your Địa Chỉ ">
                </div>

                <div  class="form-group">
                    <label for="input-7">Ngày Sinh</label>
                    <input name ="NgaySinh" value="" class="form-control form-control-rounded" id="input-7" type="date"  value="">
                    <span class="text-danger field-validation-valid" data-valmsg-for="NgaySinh" data-valmsg-replace="true"></span>
                </div> -->
             
                
               
                <a  >
                    <Button type="submit" name="Sua" value="Sua" class="btn btn-light btn-round px-5"> Sửa </Button>
                    </a>
                </div>
                </form>
            
        </div>
    </div>
</div>
</div>
<?php include '../admin/footer.php' ?>