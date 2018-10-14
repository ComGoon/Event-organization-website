<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GMY EVENTS</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


    <link rel="stylesheet" type="text/css" href="styles.css">


</head>
<body>
<h1 style="text-align: center; text-underline: black;">Welcome to GMC events!</h1>
<main>
    <section id="events" class="sections">
        <h1>EVENTS:</h1>
        <hr>
        <?php

        $conn = mysqli_connect('localhost', 'root', '', 'events');

        $select = "SELECT * FROM events";
        $runSelect = mysqli_query($conn, $select);

        $runResult = mysqli_fetch_all($runSelect);
        if (!$runResult){

        }

        ?>

        <div class="container">

            <table class="table">
                <th>id</th>
                <th>nom</th>
                <th>lieu</th>
                <th>date debut</th>
                <th>date fin</th>
                <th>nombre de place</th>
                <?php
                foreach ($runResult as $event){
                    ?>

                    <tr>
                        <td> <?php echo $event[0] ?></td>
                        <td> <?php echo $event[1] ?></td>
                        <td> <?php echo $event[2] ?></td>
                        <td> <?php echo $event[3] ?></td>
                        <td> <?php echo $event[4] ?></td>
                        <td> <?php echo $event[5] ?></td>

                    </tr>

                    <?php
                }
                ?>
            </table>


        </div>

        <form action="">
            <button>log out</button>
        </form>

    </section>
    <section id="register" class="sections">
        <h3>Admin</h3>

        <form action="controller.php" method="post" id="admin">
            <input class="input" type="text" name="admin" placeholder="@admin"><br>
            <input class="input" type="password" name="adminpwd" placeholder="@password"><br>
            <input class="inputBtn" type="submit" value="sign in" name="adminBtn">
        </form>

        <hr>

        <p>Please! Connect to you account to register for an event.</p>
        <form action="eventRegistration.php" method="post" id="attend">

<!--            <input class="input" type="number" name="id" placeholder="@event-Id"><br>-->
            <input class="input" type="text" name="uname" placeholder="@username"><br>
            <input class="input" type="email" name="email" placeholder="@email"><br>
            <input class="input" type="tel" name="utel" placeholder="@telephone"><br>
            <input class="input" type="password" name="upwd" placeholder="@password"><br>
            <input class="input" type="password" name="confirpwd" placeholder="@confirm password"><br>
            <div id="attendeeBtn">
                <input class="inputBtn" type="submit" value="register" name="register"><br>
            </div>

        </form>

        <p style="margin-top: 50px">You have an account? <a href="signin.php">Sign in</a> </p>

    </section>
</main>
</body>
</html>
