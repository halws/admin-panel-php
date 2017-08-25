<?php 

	// echo "Hello";
// $title = $_POST['title'];
// echo $title;

		$startTransaction = ' BEGIN; ';
// 		//CATEGORY 
// 		// echo "HeLoo";
// 		$insertCategory = '';
		$categoryId = '';
		$selectCategory = '';
// 		// PLACEHOLDER FOR $_POST ELEMENT 
		$placeholders[] = array();
		// if ($_POST['category'] !='' && $_POST['category']=='newCategory') {
		// 	$insertCategory = 'INSERT INTO category(category) VALUES(:newCategory)';
		// 		$placeholders[':newCategory'] = $_POST['newCategory'];
		// 	$categoryId = 'SELECT  LAST_INSERT_ID() INTO @categoryid'; // categoryid 
		// }else{
		// 	}
			$selectCategory = ' SELECT @categoryid := id FROM category 
			WHERE category=:category '// category select;
				$placeholders[':category'] = $_POST['category'];
// 			//COLOR 
// 			$insertColor = '';
// 			$colorId = '';
// 			$selectColor = '';
// 			if ($_POST['color'] !='' && $_POST['color']=='newColor') {
// 			$insertColor = 'INSERT INTO color(color) VALUES(:newColor)';
// 				$placeholders[':newColor'] = $_POST['newColor'];
// 			$colorId = 'SELECT  LAST_INSERT_ID() INTO @colorid'; // colorid 
// 		}else{
// 			$selectColor = 'SELECT  @colorid:=id FROM color WHERE color= :color'; // color select;
// 				$placeholders[':color'] = $_POST['color'];
// 			}
// 			//INSERT INTO ITEMS
		$insertItem = ' INSERT INTO items(title,description,categoryid) 
			VALUES(:title,:description,@categoryid) ';
			$placeholders[':title'] = $_POST['title'];
			$placeholders[':description'] = $_POST['description'];
// 		//ITEM ID	
// 		$itemid = 'SELECT LAST_INSERT_ID() INTO @itemid';
// 		//INSERT INTO ITEM COLOR 
// 		$insertItemColor='INSERT INTO itemcolor(itemid,colorid) 
// 			VALUES(@itemid, @colorid)  ';
// 		//ITEMCOLOR ID
// 		$itemcolorid = 'SELECT LAST_INSERT_ID() INTO @itemcolorid';
// 		//INSERT INTO PRICE 
// 		$insertPrice = 'INSERT INTO price(itemcolorid,price) VALUES(@itemcolorid,:price) ';
// 			$placeholders[':price'] = $_POST['price'];
// //INSERT INTO COUNT
// 		$insertCount = 'INSERT INTO itemcount(itemcolorid,count) VALUES(@itemcolorid,:count) ';
// 			$placeholders[':count'] = $_POST['count'];
		$endTransaction = ' Commit; ';


	try {
			// $sql = $startTransaction 
			//       .$insertCategory .$categoryid . $selectCategory 
			// 	  .$insertColor .$colorId. $selectColor 
			//       .$insertItem . $itemid 
			//       .$insertItemColor .$itemcolorid
			//       .$insertPrice
			//       .$insertCount
			//       .$endTransaction;
		$sql = $startTransaction . $selectCategory . $insertItem;
		$s = $conn->prepare($sql);
		$s->execute($placeholders);
		} catch (PDOException $e) {
			error($e);
		}	
	
		




 ?>