<?php
include 'server/includes/connection.php';
session_start();

// Check if the user is logged in as the seller

if (!isset($_SESSION['id'])) {
    header("location: ../../login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Fetch the product details for editing
    $sql = "SELECT * FROM products WHERE id = $product_id";
    $result = $conn->query($sql);

    if (!$result) {
        echo "Failed to fetch product";
        exit();
    }

    $product = $result->fetch_assoc();
}

// Handle form submission for editing
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['product_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // Check if a new image was uploaded
    if ($_FILES['image']['name']) {
        $image = $_FILES['image'];
        $tempname = $image['tmp_name'];
        $folder = "../../image/" . $image['name'];

        // Move the new image to the folder
        move_uploaded_file($tempname, $folder);

        // Update the product with the new image
        $sql = "UPDATE products SET name = '$name', description = '$description', price = $price, image = '$folder' WHERE product_id = $product_id";
    } else {
        // No new image uploaded, update without changing the image path
        $sql = "UPDATE products SET name = '$name', description = '$description', price = $price WHERE iid = $product_id";
    }

    $result = $conn->query($sql);

    if (!$result) {
        echo "Failed to update product";
        exit();
    }

    header("location: product_list.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
</head>

<body>
    <h1>Edit Product</h1>
    <form method="POST" action="" enctype="multipart/form-data">
        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo $product['name']; ?>"><br>
        <label for="description">Description:</label>
        <textarea name="description"><?php echo $product['description']; ?></textarea><br>
        <label for="price">Price:</label>
        <input type="number" name="price" value="<?php echo $product['price']; ?>"><br>
        <label for="image">Image:</label>
        <input type="file" name="image"><br>
        <?php
        if ($product['image']) {
            echo '<img src="' . $product['image'] . '" alt="Product Image" width="100"><br>';
        }
        ?>
        <input type="submit" value="Update">
    </form>
</body>

</html>