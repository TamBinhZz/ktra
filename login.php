<?php
// Bắt đầu phiên làm việc
session_start();



// Kiểm tra xem người dùng đã gửi dữ liệu đăng nhập chưa
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Kiểm tra tên người dùng và mật khẩu
    if($_POST["username"] === "admin" && $_POST["password"] === "123"){
        // Đăng nhập thành công, bắt đầu một phiên làm việc mới
        session_start();
        
        // Lưu các biến phiên
        $_SESSION["loggedin"] = true;
        
        // Chuyển hướng người dùng đến trang index.php
        header("location: index.php");
    } else{
        // Hiển thị thông báo lỗi nếu tên người dùng hoặc mật khẩu không đúng
        $login_err = "Tên người dùng hoặc mật khẩu không đúng.";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <style>
        form {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="text"],
        input[type="password"],
        input[type="submit"] {
            width: 100%;
            margin-bottom: 10px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">Đăng nhập</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="username">Tên người dùng:</label>
        <input type="text" id="username" name="username" value="admin" required>
        <label for="password">Mật khẩu:</label>
        <input type="password" id="password" name="password" value="123" required>
        <input type="submit" value="Đăng nhập">
    </form>
    <?php 
    // Hiển thị thông báo lỗi nếu có
    if(!empty($login_err)){
        echo '<div class="error">' . $login_err . '</div>';
    }
    ?>
</body>
</html>