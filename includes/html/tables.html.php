<div class="tables">
	<div class="options">
		<h1>All items</h1>
		<div class="selectors">
			<form action="" method="get">
			<div class="uk-flex">
		<button class="uk-button uk-button-primary " type="button" disabled >Sort</button>
		<button class="uk-button uk-button-default " type="button" >Show All</button>
		<button class="uk-button uk-button-secondary  uk-flex-first " type="button" >Sort by category:</button>
		<div uk-dropdown="mode:click">
			<!-- <div> -->
			<?php foreach($category as $el): ?>
				<label>
				<input type="checkbox" value="<?php htmlout($el['category']) ?>" class="uk-checkbox">
				<?php htmlout($el['category']) ?>
				</label>
				<br>
			<?php endforeach; ?>
			<!-- </div> -->


		</div>
				
			</div>
				
		</form>
			

			
			
			</div>
		</div>
	

	<table class="uk-table uk-table-divider">
	<thead>
		<tr>
			<th>id</th>
			<th>Name</th>
			<th>Short information</th>
			<th>Color</th>
			<th>Category</th>
			<th>Price</th>
			<th>Count</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($elements as $el): ?>
		<tr>
			<td> <?php echo htmlout($el['id']); ?> </td>
			<td> <?php echo htmlout($el['title']); ?></td>
			 <td><?php echo htmlout($el['description']); ?></td> 
			<td><?php echo htmlout($el['color']); ?></td>
			<td><?php echo htmlout($el['category']); ?></td>
			<td>
			<?php echo htmlout($el['price']); ?>
			</td>
			<td>
			 <?php echo htmlout($el['count']); ?> 
			</td>
		</tr>
		
<?php endforeach; ?>

	</tbody>
</table> 
</div>