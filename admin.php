<?php
/**
 * Created by PhpStorm.
 * User: ComGeek
 * Date: 02/09/2018
 * Time: 20:18
 */
session_start();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ADMIN PAGE</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link type="text/css" rel="stylesheet" href="admin.css">
</head>
<body>

<p id="header" ">
    <h1  style="text-align: center; text-transform: full-width"><?php
        if(!isset($_SESSION['Admin'])){
            header('location: index.php?=keep&off');
            exit();
        }elseif(isset($_SESSION['Admin'])){

            echo $_SESSION['Admin'] . ", ";

        }else{
            header('location: index.php?=keep&off');
            exit();
        }
        ?>Welcome to your admin page!</h1>
</p>

<main>
    <section id="list">
    <h3>List of attendees</h3><hr>


        <h4 style="background: aqua; width: 90%; margin: 0 10px; padding-left: 10px; color: black">Applicants Confirmation</h4>
        <?php
        $conn = mysqli_connect('localhost', 'root', '', 'events');

        $select = "SELECT * FROM registers";
        $runSelect = mysqli_query($conn, $select);

        $runResult = mysqli_fetch_all($runSelect);
        echo "<br>";

        ?>
        <table style="width: 100%; border: 1px solid darkslateblue;">
            <th style="text-align: center; border: 1px solid darkslateblue; font-weight: bold">Id</th>
            <th style="text-align: center; border: 1px solid darkslateblue; font-weight: bold">Name</th>
            <th style="text-align: center; border: 1px solid darkslateblue; font-weight: bold">Event Id</th>
            <th style="text-align: center; border: 1px solid darkslateblue; font-weight: bold">Confirm</th>

            <?php
            foreach ($runResult as $n){
                if ($n[1]){

            ?>
        <tr>
            <td style="text-align: center; border: 1px solid darkslateblue"> <?php  print_r($n[0]) ?></td>
            <td style="text-align: center; border: 1px solid darkslateblue"> <?php  print_r($n[2]) ?></td>
            <td style="text-align: center; border: 1px solid darkslateblue"> <?php  print_r($n[1]) ?></td>


            <td style="text-align: center; border: 1px solid darkslateblue">
                <?php



//                form here
                $conn = mysqli_connect('localhost', 'root', '', 'events');

                $select = "SELECT confirmation FROM registers WHERE id = '$n[0]'";
                $runSelect = mysqli_query($conn, $select);

                $runResult = mysqli_fetch_array($runSelect);
                print_r($runResult[0]);
                if ($runResult[0] == 'confirm'){
                    $uIdD = $n[0] . "d";?>
                    <form action="confirm.php" method="post">
                        <button name="decline" value="<?="$uIdD"?>" type="submit">D</button>
                    </form>
               <?php }elseif ($runResult[0] == 'decline'){
                    $uIdC = $n[0] . "c";?>
                    <form action="confirm.php" method="post">
                        <button name="confirm" value="<?="$uIdC"?>" type="submit">C</button>
                    </form>
              <?php  }else{
                    print_r($runResult[0]);
                    $uIdC = $n[0] . "c";
                    $uIdD = $n[0] . "d";?>
                    <form action="confirm.php" method="post">
                    <button name="confirm" value="<?="$uIdC"?>" type="submit">C</button>
                    <button name="decline" value="<?="$uIdD"?>" type="submit">D</button>
                </form>
              <?php  }
                ?>
            </td>
<?php } ?>
        </tr>

        <?php
        }
        ?>




        </table>

    </section>



        <section style="background: url(img/img2.jpg); font-weight: bold; color: darkblue;" id="events" class="sections">
            <h1 style="color: azure">EVENTS:</h1>
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
                    <th>Trash</th>
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

                                <form action="delEventControl.php" method="post">
                                    <input name="del" type="hidden" value="<?php echo $event[0] ?>">

                                    <button style="border: none; height: 44px; width: 40px; font-size: large; background: cornflowerblue" class="glyphicon glyphicon-trash" type="submit" name="send">


                                    </button>
                                </form>

                            </td>

                        </tr>

                        <?php
                    }
                    ?>
                </table>


            </div>

            <form action="logout.php" method="post">
                <button name="logout">log out</button>
            </form>

        </section>

    <section id="event-modif" >
        <h3>Alter Events</h3><hr>

        <form action="addEventControl.php" method="post" style="width: 200px; margin: 10px; background: rgb(125, 143, 128)">
            <fieldset>
                <legend style="margin-left: 5px">Add Events:</legend>
                <input type="text" name="name" placeholder="Event label" style="background: black; margin-left: 15px; margin-top: 10px">

                <input type="text" name="place" placeholder="Location" style="background: black; margin-left: 15px">

                <input type="date" name="startD" placeholder="Starting date:" style="background: black; margin-left: 15px">

                <input type="date" name="endD" placeholder="Endding date:" style="background: black; margin-left: 15px">

                <input type="number" min="0" step="1" name="nbr-place" placeholder="Number of place:" style="background: black; margin-left: 15px">

                <input type="submit" name="add" value="Add" style="background: black; margin-left: 15px; margin-top: 10px"><br><br>
            </fieldset>
        </form>

        <form action="modifEventControl.php" method="post" style="width: 200px; margin: 10px; background: rgb(125, 143, 128)">
            <fieldset>
                <legend style="margin-left: 5px">Modify Events:</legend>

                <?php
                $conn = mysqli_connect('localhost', 'root', '', 'events');

                $select = "SELECT id FROM events";
                $runSelect = mysqli_query($conn, $select);

                $runResult = mysqli_fetch_all($runSelect);

                if ($runResult){?>
                    <label style="margin-left: 10px">Event Id:</label>
                    <select name="id" placeholder="@event-Id"  style=" background: black">

                        <?php
                        foreach ($runResult as $item){
                            print_r($item);
                            echo "<br>";
                            ?>
                            <option><?php print_r($item[0]) ?></option>
                            <?php
                        }
                        ?>

                    </select>

                <?php }
                ?>

                <select name="select" style="margin-left: 10px; background: black">
                    <option value="evName">Nom</option>
                    <option value="location">Lieu</option>
                    <option value="evStartD">Date debut</option>
                    <option value="evEndD" selected>Date fin</option>
                    <option value="nbrPlace" selected>place</option>
                </select>
                <input type="text" name="newValue" placeholder="New Value" style="margin-left: 10px; background: black">
                <br>
                <input type="submit" name="modif" value="Modify" style="background: black; margin-left: 15px; margin-top: 10px"><br><br>
            </fieldset>
        </form>
    </section>
</main>

</body>
</html>
