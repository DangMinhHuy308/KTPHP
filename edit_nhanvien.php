<?php
require_once("./entities/nhanvien.class.php");

// Kiểm tra nếu dữ liệu được gửi về server
if (isset($_POST["btnsubmit"])) {
    // Lấy giá trị từ form
    $nhanvienID = $_POST["txtId"];
    $nhanvienName = $_POST["txtName"];
    $phongbanName = $_POST["txtPhongbanName"]; // Lấy CategoryID từ form
    $luong = $_POST["txtLuong"];
    $noisinh = $_POST["txtNoiSinh"];
    $phai = $_POST["txtpic"];
    // Khởi tạo đối tượng product
    $newNhanvien = new Nhanvien($nhanvienID,$nhanvienName, $phongbanName, $luong, $noisinh, $phai);
    // Lưu xuống CSDL
    $result = $newNhanvien->update();
    // Xử lý kết quả
    if (!$result) {
        header("Location: edit_nhanvien.php?failure");
    } else {
        header("Location: edit_nhanvien.php?inserted");
    }

}
?>

<?php
if (isset($_GET["inserted"])) {
    echo "<h2>Cập nhập nhân viên thành công</h2>";
}

?>
<?php
include_once("header.php");
?>

<form method="post">
    <h2>Cập nhập nhân viên</h2>
    
    <div class="row">
        <div class="lbLtitle">
            <label>Mã nhân viên</label>
        </div>
        <div class="lbLinput">
            <input type="text" name="txtId" value="<?php echo isset($_POST["txtId"]) ? $_POST["txtId"] : ""; ?>" />
        </div>
    </div>

    <div class="row">
        <div class="lbLtitle">
            <label>Tên nhân viên</label>
        </div>
        <div class="lbLinput">
            <input type="text" name="txtName" value="<?php echo isset($_POST["txtName"]) ? $_POST["txtName"] : ""; ?>" />
        </div>
    </div>

    <div class="row">
        <div class="lbLtitle">
            <label>Giới tính</label>
        </div>
        <div class="lbLinput">
            <input type="text" name="txtpic" value="<?php echo isset($_POST["txtpic"]) ? $_POST["txtpic"] : ""; ?>" />
        </div>
    </div>

    <div class="row">
        <div class="lbLtitle">
            <label>Lương</label>
        </div>
        <div class="lbLinput">
            <input type="text" name="txtLuong" value="<?php echo isset($_POST["txtLuong"]) ? $_POST["txtLuong"] : ""; ?>" />
        </div>
    </div>
    <div class="row">
        <div class="lbLtitle">
            <label>Nơi sinh</label>
        </div>
        <div class="lbLinput">
            <input type="text" name="txtpic" value="<?php echo isset($_POST["txtNoiSinh"]) ? $_POST["txtNoiSinh"] : ""; ?>" />
        </div>
    </div>
    <div class="row">
        <div class="lbLtitle">
            <label>Phòng ban</label>
        </div>
        <div class="lbLinput">
            <input type="text" name="txtPhongbanName" value="<?php echo isset($_POST["txtPhongbanName"]) ? $_POST["txtPhongbanName"] : ""; ?>" />
        </div>
    </div>

    



    <div class="row">
        <div class="submit">
            <input type="submit" name="btnsubmit" value="Thêm nhân viên">
        </div>
    </div>

</form>
<div>
    <li>
        <a href="/KT/list_nhanvien.php">Danh sách nhân viên</a>
    </li>
</div>

<?php
include_once("footer.php");
?>