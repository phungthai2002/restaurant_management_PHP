<?php 
include_once '../../models/ketnoi.php';
?>
<?php
    if(isset($_GET["id"])){

        $id=$_GET["id"];
    }

?>

<?php 

$sqldelete = "DELETE FROM datban WHERE id='$id'";
$query = mysqli_query($conn,$sqldelete);
header('location: ../admin/quanLyDatBan.php');

?>