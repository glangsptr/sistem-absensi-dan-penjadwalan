<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            width: 600px;
            text-align: center;
        }

        .container {
            width: 300px;
            margin: 0 auto; 
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        .form-group button {
            background-color: black;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="login-container">    
        <h2>SISTEM ABSENSI DAN JADWAL SEKOLAH</h2>
        <h2>Login</h2>
        <div class="container">
            <form action="<?=base_url('login/login');?>" method="post">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>

                 <!-- Menampilkan pesan kesalahan -->
         <?php if ($this->session->flashdata('error')): ?>
                <div class="error-message" style="color: red; margin-bottom: 3px;">
                    <?= $this->session->flashdata('error'); ?>
                </div>
            <?php endif; ?>

                <div class="form-group">
                    <button type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
