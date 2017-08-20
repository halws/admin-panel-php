<?php 
// $hello = "Hello";
include 'includes/inc/bd.inc.php';
include 'includes/inc/helpers.inc.php';
if ($conn) {
	// echo "Ok";
}
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
	// $stm"SELECT items.id,item.title,description,color.color,
	// FROM olios.items";
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













	include 'index.html.php';
 ?>