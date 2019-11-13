<?php 
    session_start();
    if ($_SESSION["admin"] == "") {
        ?>
        <script type="text/javascript">window.location = "admin_login.php";</script>   
        <?php
    }
    
    include 'src/include/header.php';
    include 'src/include/menu.php';
    include 'src/include/db.php';
?>
<?php
    
    //$link = mysqli_connect("localhost","root","");
    //$database = "project_shop";
    //mysqli_select_db($link, $database);
?>
        <div class="grid_10">
            <div class="box round first">
                <h2>
                    Add product</h2>
                <div class="block"> 
                	<form action="" method="post" enctype="multipart/form-data" name="form1">
                		<table border="1">
                			<tr>
                				<td>Product name</td>
                				<td><input type="text" name="pname"></td>
                			</tr>
                			<tr>
                				<td>Product price</td>
                				<td><input type="text" name="pprice"></td>
                			</tr>
                			<tr>
                				<td>Product quantity</td>
                				<td><input type="text" name="pqty"></td>
                			</tr>
                			<tr>
                				<td>Product Image</td>
                				<td><input type="file" name="pimage"></td>
                			</tr>
                			<tr>
                				<td>Product category</td>
                				<td>
                					<select name="pcategory">
                						<option value="Gents clothes">Gents clothes</option>
                						<option value="Ladies clothes">Ladies clothes</option>
                						<option value="Gents shoes">Gents shoes</option>
                						<option value="Ladies Shoes">Ladies Shoes</option>
                					</select>
                				</td>
                			</tr>
                			<tr>
                				<td>Product Description</td>
                				<td><input type="text" name="pdesc"></td>
                			</tr>
                			<tr>
                				<td colspan="2" align="center"><input type="submit" name="submit1" value="upload"></td>
                			</tr>
                		</table>
                	</form>
                	<?php 
                	   if (isset($_POST["submit1"])) {
                	       $v1 = rand(1111,9999);
                	       $v2 = rand(1111,9999);
                	       $v3 = $v1.$v2;
                	       $v3 = md5($v3);
                	      
                	       $fnm = $_FILES["pimage"]["name"];
                	       $dst = "./src/images/".$v3.$fnm;
                	       $dst1 = "src/images/".$v3.$fnm;
                	       move_uploaded_file($_FILES["pimage"]["tmp_name"], $dst);
                	       
                	       
                	       
                	       $query  = "INSERT INTO product (product_name, product_price, product_qty, product_image, product_category, product_desc) VALUES ('{$_POST["pname"]}', {$_POST["pprice"]}, {$_POST["pqty"]}, '{$dst1}', '{$_POST["pcategory"]}', '{$_POST["pdesc"]}')";
         	      
                	       mysqli_query($db, $query);
                	       
                	       if (mysqli_query($db, $query)) {
                	           echo "New record created successfully";
                	       } else {
                	           echo "Error: " . $query . "<br>" . mysqli_error($db);
                	       }
                	   }
                	?>
                </div>
            </div>
            
        </div>
        <?php mysqli_close($db);?>
<?php include 'src/include/footer.php';?>