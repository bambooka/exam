<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Фурнитура</title>
    <link rel='stylesheet' href='css/style.css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
    .wrapper{
        width: 650px;
        margin: 0 auto;
    }
    .page-header h2{
        margin-top: 0;
    }
    table tr td:last-child a{
        margin-right: 15px;
    }
</style>
<script type="text/javascript">
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();   
    });
</script>
</head>
<body>

    <div class="wrapper" style="width: 100%">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Список материалов</h2>
                        <a href="create.php" class="btn btn-success pull-right">Добавить материал</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM material";
                    if($result = $mysqli->query($sql)){
                        if($result->num_rows > 0){
                            echo "<table class='table table-bordered table-striped'>";
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th>Артикул</th>";
                            echo "<th>Изображение</th>";
                            echo "<th>Название</th>";
                            echo "<th>Единица измерения</th>";
                            echo "<th>Количество</th>";
                            echo "<th>Длина</th>";
                            echo "<th>Тип</th>";
                            echo "<th>Закупочная цена</th>";
                            echo "<th>Характеристики</th>";
                            echo "<th>Основной поставщик</th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            while($row = $result->fetch_array()){
                                echo "<tr>";
                                echo "<td>" . $row['article'] . "</td>";
                                echo "<td>" . $row['image'] . "</td>";
                                echo "<td>" . $row['name'] . "</td>";
                                echo "<td>" . $row['measure'] . "</td>";
                                echo "<td>" . $row['amount'] . "</td>";
                                echo "<td>" . $row['length'] . "</td>";
                                echo "<td>" . $row['type'] . "</td>";
                                echo "<td>" . $row['purchasing_price'] . "</td>";
                                echo "<td>" . $row['property'] . "</td>";
                                echo "<td>" . $row['main_provider'] . "</td>";
                                echo "<td>";
                                echo "<a href='read.php?id=". $row['article'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                echo "<a href='material_update.php?article=". $row['article'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                echo "<a href='material_delete.php?article=". $row['article'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                echo "</td>";
                                echo "</tr>";
                            }
                            echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            $result->free();
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
                    }
                    
                    // Close connection
                    $mysqli->close();
                    ?>
                </div>
            </div>        
        </div>
    </div>

    <script src='js/script.js'></script>
</body>
</html>