<?php 
include_once 'includes/inc/bd.inc.php';
include_once 'includes/inc/helpers.inc.php';
if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_GET['additem'])) {
	include 'includes/php/addform.php';
	die;
}
	//ADD ITEM
if (isset($_GET['additem'])) {
	try {
		$stmt = "SELECT color FROM color";
		$color_result = $conn->query($stmt);
		foreach ($color_result as $row) {
			$color[] = array(
				"color"=>$row['color']
				);
		$stmt = "SELECT  category FROM category";
		$category_result = $conn->query($stmt);
		}foreach ($category_result as $row) {
			$category[] = array(
				"category"=>$row['category']
				);
		}
		
	} catch (PDOException $e) {
		error($e);
	}
    include 'includes/pages/addelement.html.php';
	die;
}
	// SELECT ALL ITEMS FOR MAIN PAGE
try {
	$stmt = "SELECT  itemcolor.id, title,description,color,category,price,count FROM items
				INNER JOIN itemcolor ON itemcolor.itemid = items.id 
				INNER JOIN price ON itemcolor.id = price.id_itemcolor
				INNER JOIN itemcount ON itemcolor.id = itemcount.id_itemcolor
				INNER JOIN color ON itemcolor.colorid = color.id
				INNER JOIN category ON items.categoryid = category.id
				ORDER BY itemcolor.id;
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
	$stmt = "SELECT category FROM category";
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

// }



 ?>