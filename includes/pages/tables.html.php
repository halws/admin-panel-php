<div class="tables">
	<table class="centered">
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