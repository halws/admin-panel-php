<?php 
// $hello = "Hello";
include_once 'includes/inc/bd.inc.php';
include_once 'includes/inc/helpers.inc.php';


if (isset($_GET['additem'])) {
	try {
		// echo "Hello";

		$stmt = "SELECT color, category FROM color
		 JOIN usecategory on 1=1
		 ";
		$result = $conn->query($stmt);
		foreach ($result as $row) {
			$selected[] = array(
				"color"=>$row['color']
				,
				"category"=>$row['category']
				);

		}
		// foreach ($selected as $row) {
			

		// 	echo $row['category'];
		// 	echo $row['color'];
		// }
	} catch (PDOException $e) {
		error($e);
	}

	
	include 'includes/pages/addelement.html.php';
}
else{	

try {
	$stmt = "SELECT items.id,items.title,description,color.color,usecategory.category
	,price.price,count.count
	FROM olios.items 
	INNER JOIN usecategory on categoryid=usecategory.id
	INNER JOIN itemcolor on items.id=itemid 
	INNER JOIN color on colorid=color.id 
	INNER JOIN price on color.id=price.id
	INNER JOIN count on color.id=count.id
	";
	$result = $conn->query($stmt);
	foreach ($result as $row) {
		$elements[] = array(
			'id' => $row['id'],
			'title' => $row['title'],
			'description' => $row['description'],
			'color' => $row['color'],
			'category' => $row['category'],
			'price' => $row['price'],
			'count' => $row['count']
			
			 );
	}
} catch (PDOException $e) {
	error($e);
}
try {
	$stmt = "SELECT category FROM usecategory";
	$result = $conn->query($stmt);
	foreach ($result as $row) {
		$category[] = array(
			'category'=>$row['category']
			);
	}
} catch (PDOException $e) {
	error($e);
	
}






	include 'index.html.php';

}



 ?>