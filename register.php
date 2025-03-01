<?php

$errors = [];

$username = $email = $password = $repeat_password = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $username = htmlspecialchars(trim($_POST['username']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = $_POST['password'];
    $repeat_password = $_POST['repeat-password'];

    
    if (empty($username)) {
        $errors['username'] = "Vui lòng nhập họ tên.";
    }

  
    if (empty($email)) {
        $errors['email'] = "Vui lòng nhập email.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Email không hợp lệ.";
    }

   
    if (empty($password)) {
        $errors['password'] = "Vui lòng nhập mật khẩu.";
    } elseif (strlen($password) < 6) {
        $errors['password'] = "Mật khẩu phải ít nhất 6 ký tự.";
    }

    
    if ($password !== $repeat_password) {
        $errors['repeat-password'] = "Mật khẩu xác nhận không khớp.";
    }


    if (empty($errors)) {
       
        echo "<p class='success-message'>Chào mừng bạn, $username! Đăng ký thành công.</p>";
       
        $username = $email = $password = $repeat_password = "";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./reset.css" />
    <link rel="stylesheet" href="./style.css" />
    <title>Register Page</title>
</head>
<body>
    <div class="wrapper fade-in-down">
        <div id="form-content">
    
            <a href="./login.php">
                <h2 class="inactive underline-hover">Đăng nhập</h2>
            </a>
            <a href="./register.php">
                <h2 class="active">Đăng ký</h2>
            </a>

            
            <div class="fade-in first">
                <img src="./imgs/avatar.png" id="avatar" alt="User Icon" />
            </div>

            
            <form method="POST" action="">

                <input
                    type="text"
                    id="username"
                    class="fade-in first"
                    name="username"
                    placeholder="Họ tên"
                    value="<?php echo htmlspecialchars($username); ?>"
                />
                <?php if (isset($errors['username'])): ?>
                    <p class="error"><?php echo $errors['username']; ?></p>
                <?php endif; ?>

                
                <input
                    type="email"
                    id="Email"
                    class="fade-in second"
                    name="email"
                    placeholder="Email"
                    value="<?php echo htmlspecialchars($email); ?>"
                />
                <?php if (isset($errors['email'])): ?>
                    <p class="error"><?php echo $errors['email']; ?></p>
                <?php endif; ?>

      
                <input
                    type="password"
                    id="password"
                    class="fade-in third"
                    name="password"
                    placeholder="Mật khẩu"
                />
                <?php if (isset($errors['password'])): ?>
                    <p class="error"><?php echo $errors['password']; ?></p>
                <?php endif; ?>

                
                <input
                    type="password"
                    id="repeat-password"
                    class="fade-in fourth"
                    name="repeat-password"
                    placeholder="Xác nhận mật khẩu"
                />
                <?php if (isset($errors['repeat-password'])): ?>
                    <p class="error"><?php echo $errors['repeat-password']; ?></p>
                <?php endif; ?>

     
                <input type="submit" class="fade-in five" value="Đăng ký" />

            </form>

          
            <div id="form-footer">
                <a class="underline-hover" href="#">Quên mật khẩu?</a>
            </div>
        </div>
    </div>
</body>
</html>