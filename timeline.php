<?php require_once("auth.php"); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Belanja</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">

            <div class="card">
                <div class="card-body text-center">

                    <img class="img img-responsive rounded-circle mb-3" width="160" src="img/<?php echo $_SESSION['user']['photo'] ?>" />
                    
                    <h3><?php echo  $_SESSION["user"]["name"] ?></h3>
                    <p><?php echo $_SESSION["user"]["email"] ?></p>

                    <p><a href="logout.php">Logout</a></p>
                </div>
            </div>

            
        </div>


        <?php
require_once __DIR__ . '/lib/perpage.php';
require_once __DIR__ . '/lib/DataSource.php';
$database = new DataSource();

$name = "";
$code = "";

$queryCondition = "";
if (! empty($_POST["search"])) {
    foreach ($_POST["search"] as $k => $v) {
        if (! empty($v)) {

            $queryCases = array(
                "name",
                "code"
            );
            if (in_array($k, $queryCases)) {
                if (! empty($queryCondition)) {
                    $queryCondition .= " AND ";
                } else {
                    $queryCondition .= " WHERE ";
                }
            }
            switch ($k) {
                case "name":
                    $name = $v;
                    $queryCondition .= "name LIKE '" . $v . "%'";
                    break;
                case "code":
                    $code = $v;
                    $queryCondition .= "code LIKE '" . $v . "%'";
                    break;
            }
        }
    }
}
$orderby = " ORDER BY id desc";
$sql = "SELECT id,name,code,category,price,stock_count,(price*stock_count) as Total FROM subagiya " . $queryCondition;
$href = 'index.php';

$perPage = 3;
$page = 1;
if (isset($_POST['page'])) {
    $page = $_POST['page'];
}
$start = ($page - 1) * $perPage;
if ($start < 0)
    $start = 0;

$query = $sql . $orderby . " limit " . $start . "," . $perPage;
$result = $database->select($query);

if (! empty($result)) {
    $result["perpage"] = showperpage($sql, $perPage, $href);
}
?>
<html>
<head>
<title>Ayub subagiya</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/table.css" />
<link rel="stylesheet" type="text/css" href="css/form.css" />
<style>
button, input[type=submit].btnSearch {
    width: 140px;
    font-size: 14px;
    margin: 10px 0px 0px 10px;
}

.btnReset {
    width: 140px;
    padding: 8px 0px;
    font-size: 14px;
    cursor: pointer;
    border-radius: 25px;
    color: #000000;
    border: 2px solid #d2d6dd;
    margin-top: 10px;
}

button, input[type=submit].perpage-link {
    width: auto;
    font-size: 14px;
    padding: 5px 10px;
    border: 2px solid #d2d6dd;
    border-radius: 4px;
    margin: 0px 5px;
    background-color: #fff;
    cursor: pointer;
}

.current-page {
    width: auto;
    font-size: 14px;
    padding: 5px 10px;
    border: 2px solid #d2d6dd;
    border-radius: 4px;
    margin: 0px 5px;
    background-color: #efefef;
    cursor: pointer;
}
</style>
</head>
<body>
    
    <div class="phppot-container">
        <h1>Daftar Belanja</h1>

        <div>
            <form name="frmSearch" method="post" action="">
                <div>
                    <p>
                        <input type="text" placeholder="Nama"
                            name="search[name]"
                            value="<?php echo $name; ?>" /> <input
                            type="text" placeholder="Id_Barang"
                            name="search[code]"
                            value="<?php echo $code; ?>" /> <input
                            type="submit" name="go" class="btnSearch"
                            value="Search"> <input type="reset"
                            class="btnReset" value="Reset"
                            onclick="window.location='timeline.php'">
                    </p>
                </div>
                <div>
                    <a class="font-bold float-right" href="add.php">Add
                        New</a>
                </div>
                <table class="stripped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Id_Pembeli</th>
                            <th>Category</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Total Harga</th>
                            
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (! empty($result)) {
                        foreach ($result as $key => $value) {
                            if (is_numeric($key)) {
                                ?>
                     <tr>
                            <td><?php echo $result[$key]['id']; ?></td>
                            <td><?php echo $result[$key]['name']; ?></td>
                            <td><?php echo $result[$key]['code']; ?></td>
                            <td><?php echo $result[$key]['category']; ?></td>
                            <td><?php echo $result[$key]['price']; ?></td>
                            <td><?php echo$result[$key]['stock_count']; ?></td>
                            <td><?php echo$result[$key]['Total']; ?></td>
                            <td><a class="mr-20"
                                href="edit.php?id=<?php echo $result[$key]["id"]; ?>">Edit</a>
                                <a
                                href="delete.php?action=delete&id=<?php echo $result[$key]["id"]; ?>">Delete</a>
                            </td>
                        </tr>
                    <?php
                            }
                        }
                    }
                    if (isset($result["perpage"])) {
                        ?>
                        <tr>
                            <td colspan="6" align=right> <?php echo $result["perpage"]; ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</body>
</html>

