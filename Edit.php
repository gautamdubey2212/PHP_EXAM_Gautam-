<?
include "Db.php";
if (isset($_GET["BookId"])) {
    $BookId = $_GET["BookId"];

    $sql = $conn->prepare("SELECT * FROM Dashboard WHERE BookId=?");
    $sql->bind_param('i', $BookId);
    $sql->execute();
    $user = $sql->get_result()->fetch_assoc();

    if (!$user) {
        echo "Book not found";
        exit();
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
       $BookTitle =$_POST["BT"];
    $AuthorName =$_POST["AN"];
    $Genre =$_POST["genre"];
    $AvailableCopies =$_POST["AC"];

        $sql = $conn->prepare("UPDATE Dashboard SET BookTitle=?, AuthorName=?, Genre=?, AvailableCopies=? WHERE BookId=?");
        $sql->bind_param('sssii', $BookTitle, $AuthorName, $Genre, $AvailableCopies, $BookId);

        if ($sql->execute()) {
            header("Location: Home.php");
            exit();
        }
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
           <div
                class="container"
            >
                <form method="POST">
            <div
                class="container p-5 mt-5 col-6 rounded shadow border"
            >
                <div class="form-floating mb-3">
                    <input
                        type="text"
                        value="<?=$user["BookTitle"]?>"
                        class="form-control"
                        name="BT"
                        id="Bt"
                        placeholder=""
                    />
                    
                </div>

                <div class="form-floating mb-3">
                    <input
                        type="text"
                        value="<?=$user["AuthorName"]?>"
                        class="form-control"
                        name="AN"
                        id="AN"
                        placeholder=""
                    />
                    
                </div>

                <div class="form-floating mb-3">
                    <input
                        type="text"
                        value="<?=$user["Genre"]?>"
                        class="form-control"
                        name="genre"
                        id="genre"
                        placeholder=""
                    />
                   
                </div>


                 <div class="form-floating mb-3">
                    <input
                        type="text"
                        value="<?=$user["AvailableCopies"]?>"
                        class="form-control"
                        name="AC"
                        id="AC"
                        placeholder=""
                    />
                   
                </div>

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Edit
                </button>
            </div>
            
        </form>

            </div>
            
   
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


