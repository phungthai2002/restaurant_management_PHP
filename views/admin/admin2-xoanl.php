<?php include '../admin/admin2-header.php' ?>
<?php
include_once '../../models/ketnoi.php';
?>
<?php
        $MaNL = $_GET['MaNL']; 
        $sql = "DELETE FROM nguyenlieu where MaNL = '$MaNL'";
        $query= mysqli_query($conn, $sql);
        header('location: admin2-nguyenLieu.php');

?>