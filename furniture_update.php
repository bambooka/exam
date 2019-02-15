<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$article = $name = $measure = $amount =$image = $type_detail = $purchasing_price = $weight = $main_provider = "";
$article_err = $name_err = $measure_err = $amount_err = $image_err = $type_detail_err = $purchasing_price_err = $weight_err = $main_provider_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["article"]) && !empty($_POST["article"])){
    // Get hidden input value
    $article = $_POST["article"];
    
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }
    
    // Validate address address
    $input_measure = trim($_POST["measure"]);
    if(empty($input_measure)){
        $measure_err = "Please enter an measure.";     
    } else{
        $measure = $input_measure;
    }
    
    // Validate salary
    $input_amount = trim($_POST["amount"]);
    if(empty($input_amount)){
        $amount_err = "Please enter amount.";     
    } elseif(!ctype_digit($input_amount)){
        $amount_err = "Please enter a positive integer value.";
    } else{
        $amount = $input_amount;
    }
    
   // Validate salary
    $input_image = trim($_POST["image"]);
    if(empty($input_image)){
        $image_err = "Please enter image.";     
    } elseif(!ctype_digit($input_aimage)){
        $imaget_err = "Please enter a positive integer value.";
    } else{
        $image = $input_image;
    }

    // Validate salary
    $input_type_detail = trim($_POST["type_detail"]);
    if(empty($input_type_detail)){
        $type_detail_err = "Please enter type_detail.";     
    } elseif(!ctype_digit($input_type_detail)){
        $type_detail_err = "Please enter a positive integer value.";
    } else{
        $type_detail = $input_type_detail;
    }
    
    // Validate salary
    $input_purchasing_price = trim($_POST["purchasing_price"]);
    if(empty($input_purchasing_price)){
        $purchasing_price_err = "Please enter purchasing_price.";     
    } elseif(!ctype_digit($input_purchasing_price)){
        $purchasing_price_err = "Please enter a positive integer value.";
    } else{
        $purchasing_price = $input_purchasing_price;
    }
    
    // Validate salary
    $input_weight = trim($_POST["weight"]);
    if(empty($input_weight)){
        $weight_err = "Please enter weight.";     
    } elseif(!ctype_digit($input_weight)){
        $weightt_err = "Please enter a positive integer value.";
    } else{
        $weight = $input_weight;
    }
    
    // Validate salary
    $input_main_provider = trim($_POST["main_provider"]);
    if(empty($input_main_provider)){
        $amount_err = "Please enter amount.";     
    } elseif(!ctype_digit($input_main_provider)){
        $main_provider_err = "Please enter a positive integer value.";
    } else{
        $main_provider = $input_main_provider;
    }
    
    // Check input errors before inserting in database
    if(empty($article_err) && empty($name_err) && empty($measure_err) && empty($amount_err) && empty($image_err) && empty($type_detail_err) && empty($purchasing_price_err) && empty($weight_err) && empty($main_provider_err)){
        // Prepare an update statement
        $sql = "UPDATE furniture SET artucle=?, name=?, measure=?, amount=?, image=?, type_detail=?, purchasing_price=?, weight=?, main_provider=? WHERE article=?";
 
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sssi", $param_article, $param_name, $param_measure, $param_amount, $param_image, $param_type_detail, $param_purchasing_price, $param_weight, $param_main_provider);
            
            // Set parameters
            $param_article = $article;
            $param_name = $name;
            $param_measure = $measure;
            $param_amount = $amount;
            $param_image = $image;
            $param_type_detail = $type_detail;
            $param_purchasing_price = $purchasing_price;
            $param_weight = $weight;
            $param_main_provider = $main_provider;
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records updated successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        $stmt->close();
    }
    
    // Close connection
    $mysqli->close();
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["article"]) && !empty(trim($_GET["aticle"]))){
        // Get URL parameter
        $article =  trim($_GET["article"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM furniture WHERE article = ?";
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("i", $param_article);
            
            // Set parameters
            $param_article = $article;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                $result = $stmt->get_result();
                
                if($result->num_rows == 1){
                    /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                    $row = $result->fetch_array(MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $article = $row["article"];
                    $name = $row["name"];
                    $measure = $row["measure"];
                    $amount = $row["amount"];
                    $image = $row["image"];
                    $type_detail = $row["type_detail"];
                    $purchasing_price = $row["purchasing_price"];
                    $weight = $row["weight"];
                    $main_provider = $row["main_provider"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: config.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        $stmt->close();
        
        // Close connection
        $mysqli->close();
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: config.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($article_err)) ? 'has-error' : ''; ?>">
                            <label>Артикул</label>
                            <input type="text" name="article" class="form-control" value="<?php echo $article; ?>">
                            <span class="help-block"><?php echo $article_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Наименование</label>
                            <textarea name="name" class="form-control"><?php echo $name; ?></textarea>
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($measure_err)) ? 'has-error' : ''; ?>">
                            <label>Измерение</label>
                            <input type="text" name="measure" class="form-control" value="<?php echo $measure; ?>">
                            <span class="help-block"><?php echo $measure_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($amount_err)) ? 'has-error' : ''; ?>">
                            <label>Количество</label>
                            <input type="text" name="amount" class="form-control" value="<?php echo $amount; ?>">
                            <span class="help-block"><?php echo $amount_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($image_err)) ? 'has-error' : ''; ?>">
                            <label>Изображение</label>
                            <input type="text" name="image" class="form-control" value="<?php echo $image; ?>">
                            <span class="help-block"><?php echo $image_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($type_detail_err)) ? 'has-error' : ''; ?>">
                            <label>Тип изделия</label>
                            <input type="text" name="type_detail" class="form-control" value="<?php echo $type_detial; ?>">
                            <span class="help-block"><?php echo $type_detail_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($purchasing_price_err)) ? 'has-error' : ''; ?>">
                            <label>Закупочная цена</label>
                            <input type="text" name="purchasing_price" class="form-control" value="<?php echo $purchasing_price; ?>">
                            <span class="help-block"><?php echo $purchasing_price_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($measure_err)) ? 'has-error' : ''; ?>">
                            <label>Вес</label>
                            <input type="text" name="weight" class="form-control" value="<?php echo $weight; ?>">
                            <span class="help-block"><?php echo $weight_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($measure_err)) ? 'has-error' : ''; ?>">
                            <label>Основной поставщик</label>
                            <input type="text" name="main_provider" class="form-control" value="<?php echo $main_provider; ?>">
                            <span class="help-block"><?php echo $main_provider_err;?></span>
                        </div>
                        
                        <input type="hidden" name="article" value="<?php echo $article; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>