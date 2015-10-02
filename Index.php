<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
<div class="container">
    <div class="row">
    </div>
    <div class="row">
        <table class="table table-striped table-bordered">
            <thead>

            </thead>
            <tbody>
            <?php
            include 'database.php';
            $pdo = Database::connect();
            $sql = 'SHOW TABLES FROM app';
            echo 'The Table[s] in the app Database are: ';
            foreach ($pdo->query($sql) as $row){
                echo '<b>'.$row[0].'</b>';
                echo '<br>';
            }
            echo '<br>';

            $sql = 'SHOW COLUMNS FROM ' . $row[0] ;

            foreach ($pdo->query($sql) as $row){
                echo '<b>'.$row[0].'</b>';
            }


            $sql = 'SELECT * FROM `Branches` ORDER BY BranchName';
            foreach ($pdo->query($sql) as $row) {
                echo '<tr>';
                echo '<td>'. $row[0] . '</td>';
                echo '</tr>';
            }

            Database::disconnect();
            ?>

            </tbody>
        </table>
    </div>
</div> <!-- /container -->
<h3>

    <form action="https://webhooks.insxcloud.info/Github/webhook.php" method="post" id="github">
        Name:<input type="text" name="name">
        <br>
        Branch:
        <?php
        $strToEcho = '<select name="branchlist">';
        $pdo = Database::connect();
        $sql = 'SELECT * FROM `Branches` ORDER BY BranchName';
        foreach ($pdo->query($sql) as $row) {
            $strToEcho .= chr(10) . '<option>' . $row[0] . '</option>';
            }
            $strToEcho .= chr(10) . '<select>';
                echo $strToEcho;
        ?>
        <br>
        Folder:<input type="text" name="folder">
        <br>
        <input type="submit">
    </form>

</h3>

</body>

</html>