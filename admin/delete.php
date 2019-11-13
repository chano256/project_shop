<?php
    include 'src/include/db.php';
    
    $id = $_GET["id"];
    
    $query1 = "SELECT * FROM product WHERE id = $id";
    $res = mysqli_query($db, $query1);
    while ($row = mysqli_fetch_array($res)) {
        $img = $row["product_image"];
    }
    unlink($img);
    
    $query2 = "DELETE FROM product WHERE id = {$id}";
    mysqli_query($db, $query2);
?>

<script>
	window.location = "admin.php";
</script>