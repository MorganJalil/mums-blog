 <?php
/*
* Examplecode for how to delete from id.


----------------------------------------
* button code ->
<!-- Delete row though id. -->
<a href="../includes/delete.php?remove=<?=$single_basket['id']?>">
<button type="button" class="btn btn-info">Remove</button></a>


----------------------------------------
code example: could be in an include.php.

session_start();
include 'database_connection.php';
// delete row with id
if(isset($_GET['remove'])) {
$delete_product = $_GET['remove'];
$statement = $pdo->prepare("DELETE FROM customerbasket WHERE id = $delete_product");
  $statement->execute(
    [
      ':id' => $delete_product
    ]
  );
header('location: ../views/checkout.php');
}
 */