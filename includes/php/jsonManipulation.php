<?php 
// echo "Hello";
function relativeURL () {
    $dir = str_replace('\\', '/', __DIR__);
        // Resolves inconsistency with PATH_SEPARATOR on Windows vs. Linux
        // Use dirname(__FILE__) in place of __DIR__ for older PHP versions
    return substr($dir, strlen($_SERVER['DOCUMENT_ROOT']));
        // Clip off the part of the path outside of the document root
}

	function getData($conn)
	{
		try {
	$stmt = "SELECT  itemcolor.id,category, title,description,color,price,count FROM items
				INNER JOIN itemcolor ON itemcolor.itemid = items.id 
				INNER JOIN price ON itemcolor.id = price.id_itemcolor
				INNER JOIN itemcount ON itemcolor.id = itemcount.id_itemcolor
				INNER JOIN color ON itemcolor.colorid = color.id
				INNER JOIN category ON items.categoryid = category.id
				WHERE category.category =:category;
	";

	$result =  $conn->prepare($stmt);
	$result->bindValue(":category",$_POST['category']);
	$result->execute();
	foreach ($result as $row) {
		$json_data[] = array(
			'id' => $row['id'],
			'title' => $row['title'],
			'description' => $row['description'],
			'color' => $row['color'],
			'category' => $row['category'],
			'price' => $row['price'],
			'count' => $row['count']
			
			 );
	}
	 
// echo($_POST['category']);
	$name = preg_replace('/\s+/', '', $_POST['category']);
$file_name = rootD().'/includes/json/'. $name .'.json';
// echo<br>;
// echo $file_name;
	if (file_put_contents($file_name, json_encode($json_data))) {
			echo"Yes, it's exist";
	}
} catch (PDOException $e) {
	error($e);
}
	}

// echo '</pre>';
// echo("<br>");

 ?>