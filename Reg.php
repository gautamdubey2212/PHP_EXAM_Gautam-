<?php

include "Db.php";

if ($_SERVER["REQUEST_METHOD"]==="POST") {
    $Fname =$_POST["fname"];
    $Username =$_POST["username"];
    $EAddress =$_POST["eaddress"];
    $Phone =$_POST["phone"];
    $Password =password_hash($_POST["password"],PASSWORD_DEFAULT);

    $sql =$conn->prepare("Insert into Reg(Fname,Username,EAddress,Phone,Password) values(?,?,?,?,?)");
    $sql->bind_param('sssis',$Fname,$Username,$EAddress,$Phone,$Password);
    if ($sql->execute()) {
        header("Location:Login.php");
    };
};

?>





<!doctype html>
<html lang="en" data-bs-theme="light">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS v5.3.8 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header>
            <!-- place navbar here -->
        </header>
        <main>

        <form method="POST">

        <div
            class="container mt-5 p-5 rounded shadow border col-6"
        >
            <div class="form-floating mb-3">
                <input
                    type="fname"
                    class="form-control"
                    name="fname"
                    id="fname"
                    placeholder=""
                />
                <label for="fname">Fname</label>
            </div>

            <div class="form-floating mb-3">
                <input
                    type="username"
                    class="form-control"
                    name="username"
                    id="username"
                    placeholder=""
                />
                <label for="username">Username</label>
            </div>

            <div class="form-floating mb-3">
                <input
                    type="eaddress"
                    class="form-control"
                    name="eaddress"
                    id="eaddress"
                    placeholder=""
                />
                <label for="eaddress">EAddress</label>
            </div>

            <div class="form-floating mb-3">
                <input
                    type="number"
                    class="form-control"
                    name="phone"
                    id="phone"
                    placeholder=""
                />
                <label for="phone">Phone</label>
            </div>

            <div class="form-floating mb-3">
                <input
                    type="password"
                    class="form-control"
                    name="password"
                    id="password"
                    placeholder=""
                />
                <label for="password">Password</label>
            </div>

            <button
                type="submit"
                class="btn btn-primary"
            >
                Submit
            </button>
            
            
        </div>
        

        </form>

        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Bundle (includes Popper) -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
