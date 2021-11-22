<?php
include("database.php");
$q = "select * from grocerytb";
$query = mysqli_query($con, $q);
?>

<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>Shop List</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">

    <style>
        body {
            font-size: 28px;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: blue;

        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 10px 10px;
            text-decoration: none;
            font-size: 18px;
        }

        li a:hover {
            text-decoration: none;
            color: white;
        }


        .card-header {
            height: 40px;
            padding: 5px;
            font-size: 5px;

        }

        .card-footer {
            height: 40px;
            padding: 5px;

        }

        .top-navbar {
            position: -webkit-sticky;
            position: sticky;
            width: 100%;
            top: 0;
            font-size: 15px;
            z-index: 500;

        }
        .row
        {
            display:contents;
        }
    </style>

</head>

<!DOCTYPE html>
<html>

<body style="background-color:lavender;">
    <div class="top-navbar">
        <ul>
            <li style="font-weight:bold"><a href="#">Market Shop | List</a></li>
        </ul>
    </div>

    <br>


    <div class="container">
        <div class="col-sm-4 mb-4">
            <input type="text" id="myFilter" class="form-control" onkeyup="myFunction()" placeholder="Search Shops">
        </div>
        <br>

        <!-- top -->
        <div class="row">

            <!-- shop Cards -->
            <div id="shops" class="row mt-5">
                <?php
                $query = mysqli_query($con, "SELECT * FROM shop ORDER BY shopName");
                while ($qq = mysqli_fetch_array($query)) {
                ?>
                    <div class="col-lg-5">
                        <div class="card text-center">
                            <div id="myUL" class="card-header" style="background-color:#24a0ed;">
                                <div class="card-title" style="color:white; font-size:22px; text-shadow:none; font-weight:bold;font-family:sans;"><?php echo htmlentities($qq['shopName']); ?></div>
                            </div>
                            <div class="card-body" style="background-color:azure;">
                                <p class="card-text" style="font-size:20px"><?php echo $qq['location'] ?></p>
                                <a href="feedback.php?shopID=<?php echo $qq['shopID']; ?>" target="_blank" class="btn btn-primary" style="height:40px;">Feedback</a>
                            </div>
                            <div class="card-footer text-muted" style="font-size:15px; font-weight:bold;"> <i class="fa fa-phone"></i> <?php echo $qq['contact'] ?> </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
    <script>
        function myFunction() {
            var input, filter, cards, cardContainer, title, i;
            input = document.getElementById("myFilter");
            filter = input.value.toUpperCase();
            cardContainer = document.getElementById("shops");
            cards = cardContainer.getElementsByClassName("card");
            for (i = 0; i < cards.length; i++) {
                title = cards[i].querySelector(".card-title");
                if (title.innerText.toUpperCase().indexOf(filter) > -1) {
                    cards[i].style.display = "";
                } else {
                    cards[i].style.display = "none";
                }
            }
        }
    </script>

</body>

</html>