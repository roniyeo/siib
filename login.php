<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" type="image/x-icon" href="assets/img/logo_honda_3.jpeg">
    <title>HONDA | Sistem Inventaris Barang</title>
</head>

<body class="text-center">

    <main class="form-signin">
        <form action="include/cek_login.php" method="POST">
            <img class="mb-4" src="assets/img/logo_honda_3.jpeg" alt="" width="120"
                height="120">
            <h1 class="h3 mb-3 fw-bold">SISTEM INFORMASI INVENTARIS BARANG</h1>

            <div class="form-floating mb-2">
                <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="username">
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating mt-2">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password"
                    name="password">
                <label for="floatingPassword">Password</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-muted">&copy; Copyright PIONIKA GROUP 2022. Develop by RONFOLIO</p>
        </form>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>