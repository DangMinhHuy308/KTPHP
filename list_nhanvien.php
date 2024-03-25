<?php
require_once("./entities/nhanvien.class.php");
if(isset($_GET['delete_id'])) {
    $nhanvienID = $_GET['delete_id'];
    
    // Gọi phương thức delete từ lớp nhanvien
    $result = nhanvien::delete($nhanvienID);

    // Kiểm tra kết quả xóa
    if($result) {
        // Nếu xóa thành công, chuyển hướng về trang danh sách nhân viên
        header("Location: list_nhanvien.php");
        exit(); // Dừng kịch bản để tránh thực thi các mã HTML hoặc PHP tiếp theo
    } else {
        // Nếu xóa không thành công, hiển thị thông báo lỗi
        echo "Xóa không thành công!";
    }
}
$nhanVien = nhanvien::list_nv();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <div>
            <h1>THÔNG TIN NHÂN VIÊN</h1>
            <a href="/KT/add_nhanvien.php" class="btn btn-primary">Thêm nhân viên</a>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>MÃ NHÂN VIÊN</th>
                    <th>TÊN NHÂN VIÊN</th>
                    <th>GIỚI TÍNH</th>
                    <th>NƠI SINH</th>
                    <th>TÊN PHÒNG</th>
                    <th>LƯƠNG</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach($nhanVien as $item) { ?>
                    <tr>
                        <td><?php echo $item['MA_NV']; ?></td>
                        <td><?php echo $item['TEN_NV']; ?></td>
                        <td>
                            <?php 
                            $gioitinh = $item['PHAI']; 
                            $image = ($gioitinh == 'NAM') ? './images/man.png' : './images/woman.png'; 
                            ?>
                            <img width="45" height="63" src="<?php echo $image; ?>" alt="<?php echo $gioitinh; ?>">
                        </td>
                        <td><?php echo $item['NOI_SINH']; ?></td>
                        <td><?php echo $item['MA_PHONG']; ?></td>
                        <td><?php echo $item['LUONG']; ?></td>
                        <td>
                            <?php echo "<a href='edit_nhanvien.php?MA_NV" . $item["MA_NV"] . "' class='btn btn-primary'>Sửa</a>";?>

                            |
                            <?php echo "<a href='list_nhanvien.php?delete_id=" . $item["MA_NV"] . "' class='btn btn-danger'>Xóa</a>"; ?>

                        </td>
                    </tr>    
                <?php  } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
