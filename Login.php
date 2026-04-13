
<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $Username = $_POST["username"];
    $Password = $_POST["password"];

    $sql = $conn->prepare("SELECT password FROM reg WHERE Username=?");
    $sql->bind_param('s', $Username);
    $sql->execute();
    $sql->store_result();
    $sql->bind_result($pv);

    if ($sql->fetch() && password_verify($Password, $pv)) {
        $_SESSION["username"] = $Username;
        header("Location: Home.php");
        exit();
    } else {
        echo "Invalid login";
    }
}
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
            class="container p-5 rounded shadow border col-6 mt-5" style="box-shadow:0,0,30,rgba(0,0,0.1);"
        >
            <div class="form-floating mb-3 ">
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
