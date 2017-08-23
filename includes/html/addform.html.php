
<div class="addform">
	<form action="addelement" method="post">
		<fieldset class="uk-fieldset">
			<legend class="uk-legend">Add new element</legend>
			<!-- TITLE -->
			<div class="uk-margin">
			<input type="text" class="uk-input uk-form-width-large" placeholder="Title">
			<!-- DESCRIPTION-->
		</div>
		<div class="uk-margin">
		<textarea name="description" placeholder="Description" cols="30" rows="5" class="uk-textarea uk-form-width-large"></textarea>
		</div>
		<!-- COLOR -->
		<div class="uk-margin">
			<select name="color" class="uk-select uk-form-width-large">
				<?php foreach($selected as $row): ?>
					<option name=" <?php echo $row['color']; ?> " id="">
					<?php echo $row['color']; ?></option>
			<?php endforeach; ?>
				<option>New color</option>
			</select>
		</div>
		<!-- NEW COLOR -->
		<div class="uk-margin">
			<input type="text" class="uk-input uk-form-width-large" placeholder="New color" disabled>
		</div>
		<!-- CATEGORY -->
		<div class="uk-margin">
		<select name="category"  class="uk-select uk-form-width-large">
			<?php foreach($selected as $row): ?>
			<option value="<?php echo $row['category']; ?>">
			<?php echo $row['category']; ?></option>
			<?php endforeach; ?>
			<option>New category</option>
		</select>
		</div>
		<!-- NEW CATEGORY -->
		<div class="uk-margin">
			<input type="text" class="uk-input uk-form-width-large" placeholder="New category" disabled>
		</div>
		<!-- PRICE -->
		<div class="uk-margin">
			<input type="text" class="uk-input uk-form-width-large" placeholder="Price">
		</div>
		<!-- COUNT -->
		<div class="uk-margin">
			<input type="text" class="uk-input uk-form-width-large" placeholder="Count">
		</div>

		</fieldset>

	</form>
</div>