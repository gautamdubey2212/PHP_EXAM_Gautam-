<?php
include "db.php";

$sql= $conn->query("select * from Dashboard");

if ($_SERVER["REQUEST_METHOD"]==="POST") {
    $BookTitle =$_POST["BT"];
    $AuthorName =$_POST["AN"];
    $Genre =$_POST["genre"];
    $AvailableCopies =$_POST["AC"];

    $sql =$conn->prepare("Insert into Dashboard(BookTitle,AUthorName,Genre,AvailableCopies) values(?,?,?,?)");
    $sql->bind_param('ssds',$BookTitle,$AuthorName,$Genre,$AvailableCopies);
    if ($sql->execute()) {
        header("Location:Home.php");
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
            <nav
                class="navbar navbar-expand-sm navbar-light bg-light"
            >
                <div class="container">
                    <h3>Hello <?=$_SESSION["username"]?></h3>
                    <button
                        class="navbar-toggler d-lg-none"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapsibleNavId"
                        aria-controls="collapsibleNavId"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                    >
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="collapsibleNavId">
                        <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                            
                        </ul>
                        <form action="Login.php" class="d-flex my-2 my-lg-0">

                            <button
                                class="btn btn-outline-success my-2 my-sm-0"
                                type="submit"
                            >
                                Logout
                            </button>
                        </form>

                    <a href="PDF.php" class="btn btn-outline-success my-2 my-sm-2">
                       PDF
                     </a>
                    </div>
                </div>
            </nav>
            
        </header>
        <main>

        <div
            class="container"
        >
            <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    <li
                        data-bs-target="#carouselId"
                        data-bs-slide-to="0"
                        class="active"
                        aria-current="true"
                        aria-label="First slide"
                    ></li>
                    <li
                        data-bs-target="#carouselId"
                        data-bs-slide-to="1"
                        aria-label="Second slide"
                    ></li>
                    <li
                        data-bs-target="#carouselId"
                        data-bs-slide-to="2"
                        aria-label="Third slide"
                    ></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img
                            src="https://bluediarybooks.com/wp-content/uploads/2024/07/WhatsApp-Image-2024-07-04-at-6.14.37-PM.jpeg"
                            class="w-100 d-block"
                            alt="First slide"
                        />
                    </div>
                    <div class="carousel-item">
                        <img
                            src="https://m.media-amazon.com/images/I/617pm0131-L._AC_UF1000,1000_QL80_.jpg"
                            class="w-100 d-block"
                            alt="Second slide"
                        />
                    </div>
                    <div class="carousel-item">
                        <img
                            src="https://bluediarybooks.com/wp-content/uploads/2024/06/WhatsApp-Image-2024-06-18-at-2.47.25-PM.jpeg"
                            class="w-100 d-block"
                            alt="Third slide"
                        />
                    </div>
                </div>
                <button
                    class="carousel-control-prev"
                    type="button"
                    data-bs-target="#carouselId"
                    data-bs-slide="prev"
                >
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button
                    class="carousel-control-next"
                    type="button"
                    data-bs-target="#carouselId"
                    data-bs-slide="next"
                >
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            
        </div>
        

            <form method="POST">
                <div
                    class="container mt-5 p-5 col-6 rounded shadow border"
                >
                    <div class="form-floating mb-3">
                        <input
                            type="text"
                            class="form-control"
                            name="BT"
                            id="BT"
                            placeholder=""
                        />
                        <label for="BT">BookTitle</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input
                            type="text"
                            class="form-control"
                            name="AN"
                            id="AN"
                            placeholder=""
                        />
                        <label for="AN">AuthorName</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input
                            type="text"
                            class="form-control"
                            name="genre"
                            id="genre"
                            placeholder=""
                        />
                        <label for="genre">Genre</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input
                            type="text"
                            class="form-control"
                            name="AC"
                            id="AC"
                            placeholder=""
                        />
                        <label for="AC">AvailableCopies</label>
                    </div>

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Submit
                    </button>
                    
                    
                </div>
                
            </form>

            

<div
        class="container my-5 rounded border shadow p-5 col-8"
       >
         <div
            class="table-responsive"
        >
            <table class="table table-primary">
    <thead>
        <tr>
            <th>BookId</th>
            <th>BookTitle</th>
            <th>AuthorName</th>
            <th>Genre</th>
            <th>AvailableCopies</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>

    <?php while($row = $sql->fetch_assoc()){ ?>
        <tr>
            <td><?=$row["BookId"]?></td>
            <td><?=$row["BookTitle"]?></td>
            <td><?=$row["AuthorName"]?></td>
            <td><?=$row["Genre"]?></td>
            <td><?=$row["AvailableCopies"]?></td>

            <td>
                <a
                    name=""
                    id=""
                    class="btn btn-primary"
                    href="Edit.php"
                    role="button"
                    >Edit</a
                >
                
            </td>

             <td>
                <a
                    name=""
                    id=""
                    class="btn btn-primary"
                    href="Delete.php"
                    role="button"
                    >Delete</a
                >
                
            </td>

            
        </tr>
    <?php } ?>

    </tbody>
</table>
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

<td>
                <a href="Edit.php?id=<?=$row['id']?>" class="btn btn-success">
                    Edit
                </a>
            </td>

            <td>
                <a href="Delete.php?id=<?=$row['id']?>" class="btn btn-danger">
                    Delete
                </a>
            </td>