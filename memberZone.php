<?php
/**
 * Created by PhpStorm.
 * User: ComGeek
 * Date: 06/09/2018
 * Time: 23:06
 */

session_start();

if (!isset($_SESSION['uname']) && !isset($_SESSION['id'])){
    header('location: signin.php?=no&hacking');
    exit();
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=$_SESSION['uname']?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="styles.css">

</head>
<body style="background: url(img/img7.jpg); color: azure">
<h1 style="color: aliceblue; text-align: center">Hey Mr./Mme <?=$_SESSION['uname']; ?>, Welcome to you members zone. </h1>

<main style="">
    <section id="events" class="sections" style="background: none; font-weight: bold">
        <h1>EVENTS:</h1>
        <?php
        print_r($_SESSION['id']);
        ?>
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
                <th>participate</th>
                <th>approvement</th>
                <th></th>
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

                        <td>
                            <form action="applyControl.php" method="post"  class="btn btn-info btn-lg" style="padding: 0;
                             width: 70px; height: 40px; display: flex; flex-direction: column; align-items: center; justify-content: center">
                                <button style="  width: 100%; font-size: 30px;;
                                 background-color: #31b0d5; border-color: #1b6d85; margin: 10px"
                                  class="glyphicon glyphicon-hand-left" type="submit" name="send">
                                    <input name="evId" type="hidden" value="<?php echo $event[0] ?>">
                                    <input name="applier" type="hidden" value="<?php print_r($_SESSION['id']) ?>">
                                </button>
                            </form>
                        </td>

                        <td style="color: red; font-weight: bold; text-transform: uppercase">
                            <?php
                            $conn = mysqli_connect('localhost', 'root', '', 'events');
                            $var = $_SESSION['id'];
                            $select = "SELECT confirmation, evId FROM registers WHERE id = '$var'";
                            $runSelect = mysqli_query($conn, $select);

                            $runResult = mysqli_fetch_all($runSelect);

                            if ($runResult){
                                if ($event[0] == $runResult[0][1])
                                print_r($runResult[0][0]);
                            }

                            ?>
                        </td>

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

</body>
</html>
