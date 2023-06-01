    <?php
    require "config.php";
    if (!$_POST) {
        header("Location: ./");
    }
    if (empty($_POST["nameInput"])) {
        echo "name";
    }
    if (empty($_POST["categoryInput"])) {
        echo "category";
    }
    if (empty($_POST["priceInput"])) {
        echo "price";
    }
    if (empty($_POST["stockInput"])) {
        echo "stock";
    }

    $status = isset($_POST["statusInput"]) ? true : false;

    $target_dir = "images/";
    print_r($_FILES);
    $target_file = $target_dir . basename($_FILES["imgInput"]["tmp_name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["imgInput"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
            echo "1";
        }
    }


    // Check if file already exists 
    if (file_exists($target_file)) {
        $uploadOk = 0;
        echo "2";
    }

    // Check file size
    if ($_FILES["imagenProducto"]["size"] > 100000000) {
        echo "3";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" && $imageFileType != "avif"
    ) {
        $uploadOk = 0;
        echo "4";
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "5";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "0";
        } else {
            echo "6";
        }
    }

    $records = $conn->prepare("INSERT INTO `products`(`name`, `category`, `status`, `sales`, `stock`, `price`, `img`) VALUES (:name, :category, :status, 0, :stock, :price, :img)");
    $records->bindParam(":name", $_POST["nameInput"]);
    $records->bindParam(":category", $_POST["categoryInput"]);
    $records->bindParam(":status", $_POST["statusInput"]);
    $records->bindParam(":stock", $stock);
    $records->bindParam(":price", $_POST["priceInput"]);
    $records->bindParam(":img", $target_file);
    $records->execute();

    header("Location: ./");
