<?php 
	if (isset($_POST['action']) && isset($_POST['action']=='addelement')) {
	try {
		$startTransaction = 'BEGIN;';


		$selectCategory = 'SELECT  @categoryid:=id FROM usecategory WHERE category=:category'; // category select;

		$selectColor = 'SELECT  @colorid:=id FROM color WHERE color=:color';
		

		$insertItem = 'INSERT INTO items(title,description,categoryid) 
			VALUES(:title,:description,@categoryid)';

		$itemid = 'SELECT LAST_INSERT_ID() INTO @itemid';

		$insertColor='INSERT INTO itemcolor(itemid,colorid) 
			VALUES(@itemid, @colorid)  ';
		$itemcolorid = 'SELECT LAST_INSERT_ID() INTO @itemcolorid';

		// $insertIntoCategory = 'INSERT INTO itemcolor(itemid,colorid) 
		// 	VALUES(@LAST_INSERTED_ID, :colorid)';
		$insertPrice = 'INSERT INTO price(itemcolorid,price) VALUES(@itemcolorid,:price) ';
		$insertCount = 'INSERT INTO count(itemcolorid,count) VALUES(@itemcolorid,:count) ';
		$endTransaction = 'Commit;';

		

			// $insert = 'INSERT INTO '
		} catch (PDOException $e) {
			error($e);
		}	}
 ?>