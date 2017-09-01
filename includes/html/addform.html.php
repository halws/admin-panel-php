
<div class="addform">
	<form action="?additem" method="post" id="formAdd" class="uk-width-1-2">
		<fieldset class="uk-fieldset  uk-width-1-1">
			<legend class="uk-legend">Add new element</legend>
			<!-- TITLE -->
			<div class="uk-margin">
			<input  name="title" type="text" class="uk-input uk-form-width-1-1" placeholder="Title" required  >
			<!-- DESCRIPTION-->
		</div>
		<div class="uk-margin">
		<textarea name="description" placeholder="Description" cols="30" rows="5" class="uk-textarea uk-form-width-1-1" required "></textarea>
		</div>
		<!-- COLOR -->
		<div class="uk-margin">
			<select name="color" class="color-select uk-select uk-form-width-1-1">
				<option value="" disabled selected > Select color</option>
				<?php foreach($color as $row): ?>
					<option value="<?php echo $row['color']; ?>">
					<?php echo $row['color']; ?></option>
			<?php endforeach; ?>
				<option value="newColor">New color</option>
			</select>
		</div>
		<!-- NEW COLOR -->
		<div class="uk-margin">
			<input id="newColor" name="newColor" type="text" class="uk-input uk-form-width-1-1" placeholder="Select option: new color" disabled ">
		</div>
		<!-- CATEGORY -->
		<div class="uk-margin">
		<select name="category"  class=" category-select uk-select uk-form-width-1-1" placeholder="Select category">
			<option value="" disabled selected>Select category</option>
			<?php foreach($category as $row): ?>
			<option value="<?php echo $row['category']; ?>">
			<?php echo $row['category']; ?></option>
			<?php endforeach; ?>
			<option value="newCategory">New category</option>
		</select>
		</div>
		<!-- NEW CATEGORY -->
		<div class="uk-margin">
			<input id="newCategory" name="newCategory" type="text" class="uk-input uk-form-width-1-1" placeholder="Select option: new category" disabled  
			 >
		</div>
		<!-- PRICE -->
		<div class="uk-margin">
			<input name="price" type="number" class="uk-input uk-form-width-1-1" placeholder="Price">
		</div>
		<!-- COUNT -->
		<div class="uk-margin">
			<input name="count" type="number" class="uk-input uk-form-width-1-1" placeholder="Count" >
		</div>
		<div>
			<input type="submit" value="Send" class="uk-button  uk-button-primary" 
			id="additemSubmit" >
		</div>

		</fieldset>

	</form>
	<div class=" uk-width-1-2 dragDrop">
		<form  method="post" action="index.php" enctype="multipart/form-data" class="box uk-placeholder uk-text-center">
        <div class="box__input">
            <label for="file" class="uk-margin"><strong>Choose a file</strong>
            <span class="uk-hidden"> or drag it here</span>.</label><br>
            <input class="box__file uk-margin" type="file" name="files[]" id="file" 
            data-multiple-caption="{count} files selected" multiple />
            <br>
            <button class="box__button uk-button uk-button-default" type="submit">Upload</button>
        </div>
        <div class="box__uploading">Uploading&hellip;</div>
        <div class="box__success uk-alert-success uk-hidden">Done!</div>
        <div class="box__error uk-alert-danger uk-width-auto uk-hidden">Error! <span></span></div>
        <!-- <progress id="progressbar" class="uk-progress" value="0" max="100" visible></progress> -->
    </form>
    	
    </div>
    <!-- <div id="submit" class="uk-margin uk-form-width-1-2">
	</div> -->

</div>