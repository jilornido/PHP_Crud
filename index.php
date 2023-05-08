<?php
    require('./read.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD</title>
</head>
    <style>
        html, body {
            margin: 0;
            padding: 0;
        }
        .main {
            height: 100vh;
            /*grid*/
            display: grid;
            grid-template-rows: auto 1fr;
            justify-items: center;
            row-gap: 20px;
        }
        .main .create-main {
            grid-row: 1/2;
            display: grid;
            grid-auto-rows: auto;
            row-gap: 5px;
        }
        .main .create-main h3 {
            text-align: center;
        }
        .main .read-main {
            grid-row: 2/3;
        }
        .main .read-main tr th {
            width: 200px;
        }
        .main .read-main tr td {
            text-align: center;
        }
        .main .read-main tr td:nth-child(4) {
            display: grid;
            grid-auto-flow: column;
        }
    </style>

<body>
    
<div class="main">
    <form class="create-main" action="/PHP_Crud/create.php" method="post">
        <h3>CREATE USER</h3>
        <input type="text" name="username" placeholder="Enter your username" required />
        <input type="text" name="password" placeholder="Enter your password" required />
        <input type="submit" name="create" value="CREATE" />
    </form>

    <table class="read-main">
        <tr>
            <th>ID</th>
            <th>USERNAME</th>
            <th>PASSWORD</th>
            <th>ACTIONS</th>
        </tr>

        <?php
        while($results = mysqli_fetch_array($sqlAccounts)) {
        ?>
        <tr>
            <td> <?php echo $results['id'] ?> </td>
            <td> <?php echo $results['username'] ?> </td>
            <td> <?php echo $results['password'] ?> </td>
            <td>
                <form action="/PHP_Crud/update.php" method="post">
                    <input type="submit" name="edit" value="EDIT">
                    <input type="hidden" name="editId" value="<?php echo $results['id']?>">
                    <input type="hidden" name="editUsername" value="<?php echo $results['username']?>">
                    <input type="hidden" name="editPassword" value="<?php echo $results['password']?>">
                </form>
                <form action="/PHP_Crud/delete.php" method="post">
                    <input type="submit" name="delete" value="DELETE">
                    <input type="hidden" name="deleteId" value="<?php echo $results['id']?>">
                </form>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>

</body>
</html>