<?php
session_start();

$conn = new mysqli("localhost", "root", "", "user");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        $error = "Username dan password wajib diisi!";
    } else {
        $password_hashed = md5($password);
        $query = "SELECT * FROM tb_user WHERE username = ? AND password = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $username, $password_hashed);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            if ($user['role'] == 'admin') {
                header("Location: admin.php");
            } else {
                header("Location: pelanggan.php");
            }
            exit;
        } else {
            $error = "Username atau password salah!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: yellow;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .login-container {
            background-color: yellow;
            border: 4px solid #000;
            padding: 20px;
            max-width: 400px;
            width: 100%;
            text-align: center;
            box-shadow: 10px 10px 0px 0px #000;
        }
        h1 {
            font-size: 2rem;
            margin-bottom: 20px;
            color: #000;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            text-align: left;
            margin-bottom: 5px;
            font-weight: bold;
            color: #000;
        }
        input {
            border: 2px solid #000;
            padding: 10px;
            margin-bottom: 15px;
            background-color: #f9f9f9;
            font-size: 1rem;
            color: #000;
        }
        button {
            background-color: #000;
            color: #fff;
            border: none;
            padding: 10px;
            font-size: 1rem;
            cursor: pointer;
            transition: transform 0.2s, background-color 0.2s;
        }
        button:hover {
            background-color: #333;
            transform: scale(1.05);
        }
        .error {
            color: red;
            font-size: 0.9rem;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <form method="POST" action="">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Login</button>
        </form>
        <?php if (!empty($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
    </div>
</body>
</html>
