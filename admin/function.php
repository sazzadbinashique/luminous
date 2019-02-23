<?php 

function confirm($result){

		global $connection;
		if (!$result) {

        die('QUERY FAILED' . mysqli_error($connection));
    }

}




function insert_categories(){
				global $connection;

                if (isset($_POST['submit'])) {
                    
                  $cat_title = $_POST['cat_title'];
                 
                 if ($cat_title == "" || empty($cat_title)) {
                    
                        echo "This field should not be Empty";

                    }else{

                        $query = "INSERT INTO category(cat_title) ";
                        $query.= "VALUES('$cat_title') ";

                        $create_categories = mysqli_query($connection, $query);

                        if (!$create_categories) {
                            die('QUERY FAILED' . mysqli_error($connection));
                        }
                    }   

                }                       

}


function findAllCategories(){

	global $connection;

	$query = "SELECT * FROM  category";
	$select_categories = mysqli_query($connection, $query);

	while ($row = mysqli_fetch_assoc($select_categories)) {

	$cat_id = $row['cat_id'];
	$cat_title = $row['cat_title'];

	// $cat_title = strtoupper($cat_title);

	echo "<tr>";    
	echo "<td>{$cat_id}</td>";
	echo "<td>{$cat_title}</td>";
	echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a> </td>";
	echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a> </td>";
	echo "</tr>";    
	}
}


function deleteCategories(){

	global $connection;

	if (isset($_GET['delete'])) {
	 
	 $the_cat_id = $_GET['delete'];
	 $query = "DELETE FROM category WHERE cat_id = {$the_cat_id} ";
	$delete_query = mysqli_query($connection, $query);

	 if (!$delete_query) {
	        die('QUERY FAILED' . mysqli_error($connection));
	    } 


	 header("Location: categories.php");
	}
}



 ?>