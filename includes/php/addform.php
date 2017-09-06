<?php 
include 'jsonManipulation.php';

		$sql = array();
		if ($_POST['category'] !='' && $_POST['category']=='newCategory') {
			$sql['insertCategory'] = 'INSERT INTO category(category) VALUES(:newCategory)';
			$sql['selectCategory'] = 'SELECT  LAST_INSERT_ID() INTO @categoryid'; 
			// categoryid 
		}else{
			$sql['selectCategory'] = ' SELECT @categoryid := id FROM category 
			 WHERE category=:category ';// category select;
			}
			//INSERT AND SELECT  COLOR
			if ($_POST['color'] !='' && $_POST['color']=='newColor') {
			$sql['insertColor'] = 'INSERT INTO color(color) VALUES(:newColor)';
			$sql['selectColor'] = 'SELECT  LAST_INSERT_ID() INTO @colorid'; // colorid 
		}else{
			$sql['selectColor'] = 'SELECT  @colorid:=id FROM color WHERE color=:color'; // 
			}
// 			//INSERT INTO ITEMS
		$sql['insertItem'] = ' INSERT INTO items(title,description,categoryid) 
			VALUES(:title,:description,@categoryid) ';
// 		//ITEM ID	
		$sql['itemid'] = 'SELECT LAST_INSERT_ID() INTO @itemid';
// 		//INSERT INTO ITEM COLOR 
		$sql['insertItemColor']='INSERT INTO itemcolor(itemid,colorid) 
			VALUES(@itemid, @colorid)  ';
// 		//ITEMCOLOR ID
		$sql['id_itemcolor'] = 'SELECT LAST_INSERT_ID() INTO @id_itemcolor';

	//insert into pictures 
	$files =array_filter(glob(rootD() . "/assets/pictures/temp/*",GLOB_BRACE),'is_file');
	foreach ($files as $key) {
	$sql[$key] = "INSERT INTO images(id_itemcolor,link,alt)
	VALUES(@id_itemcolor,:link,:alt)";

}
		


// // 		//INSERT INTO PRICE 
		$sql['insertPrice'] = 'INSERT INTO price(id_itemcolor,price) VALUES(@id_itemcolor,:price) ';
// // //INSERT INTO COUNT
		$sql['insertCount'] = 'INSERT INTO itemcount(id_itemcolor,count) VALUES(@id_itemcolor,:count) ';
		// $endTransaction = 'Commit; ';
		$conn->beginTransaction();

	try {
		foreach ($sql as $stmtName=>&$sqlCommand) {
			$stmt[$stmtName] = $conn->prepare($sqlCommand);
		}
		 //CATEGORY
		 //NEW CATEGORY
if ($_POST['category'] !='' && $_POST['category']=='newCategory') {
	$stmt['insertCategory']->bindValue(':newCategory',$_POST['newCategory']);
	$stmt['insertCategory'] ->execute();
}else{  
 		// BIND CATEGORY
	$stmt['selectCategory']->bindValue(':category',$_POST['category']);
}
		// SELECT CATEGORY ID
	$stmt['selectCategory'] ->execute();
		//COLOR
		//NEW COLOR
if ($_POST['color'] !='' && $_POST['color']=='newColor') {
	$stmt['insertColor']->bindValue(':newColor',$_POST['newColor']);
	$stmt['insertColor'] ->execute();
	
}else{	//BIND COLOR
		$stmt['selectColor']->bindValue(':color',$_POST['color']);
}
		//SELECT COLOR ID
		$stmt['selectColor'] ->execute();

		//INSERT ITEM
		$stmt['insertItem']->bindValue(':title',$_POST['title']);
		$stmt['insertItem']->bindValue(':description',$_POST['description']);
		$stmt['insertItem'] ->execute();
		//SELECT ITEM ID
		$stmt['itemid'] ->execute();
		//INSERT INTO ITEMCOLOR 
		$stmt['insertItemColor'] ->execute();
		// //SELECT ITEMCOLOR ID
		$stmt['id_itemcolor'] ->execute();

		$files =array_filter( glob(rootD() . "/assets/pictures/temp/*",GLOB_BRACE),'is_file');
		//insert pictures
		$sql = $conn->prepare("SELECT * FROM itemcolor");
		$sql->execute();
		$result = $sql->fetchAll();
		$last_id = end($result);
		// print_r($files);
		foreach ($files as $key=>$link) {
			// echo ($link . "<br>");
			$extension =end(explode(".", $link));
			// print_r($extension);
			$target_name = str_replace(' ','_',$_POST['title']);
			// print_r($target_name);
			$target_file =rootD() . "/assets/pictures/" . $target_name ."_"
			.$last_id['itemid'] ."_" . $key .  "." . $extension;
			// print_r($target_file . "<br>");
			$stmt[$link]->bindValue(':link',$target_file);
			$stmt[$link]->bindValue(':alt', "this is picture of ".$target_name);
			$stmt[$link]->execute();
			// echo($target_file . "<br>");
			rename($link,$target_file);
		}


		// //INSERT INTO PRICE 
		$stmt['insertPrice']->bindValue(':price',$_POST['price']);
		$stmt['insertPrice'] ->execute();

		// //INSERT INTO COUNT
		$stmt['insertCount']->bindValue(':count',$_POST['count']);
		$stmt['insertCount'] ->execute();

		$conn->commit();
		getData($conn);
		header("Location:.");
		} 
		catch (PDOException $e) {
			$conn->rollBack();
			error($e);
		}	

 ?>