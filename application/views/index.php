
<?php echo validation_errors(); ?>


		<div class="uk-section uk-padding-remove-top uk-margin-top">
			<div class="uk-container uk-container-xsmall">
				<h3 class="center">Distance & Time Between Two Locations</h3>

<?php
if($this->session->flashdata('info')){
	echo $this->session->flashdata('info');
}
?>

				<?php echo form_open('/'); ?>
					<div class="mt-2">
						<label for="title">Origin</label>
						<input type="text" id="origin" name="origin" class="uk-input" />
					</div>
					<div class="mt-2">
						<label for="text" clas=>Destination</label>
						<input type="text" name="destination" id="destination" class="uk-input" />
					</div>
					<div class="mt-2">
						<input type="submit" name="submit" value="Search" class="uk-button uk-button-secondary mt-2"/>
					</div>
				</form>


			</div>
		</div>
		<hr>
		<div class="uk-section  uk-padding-remove-top uk-margin-top">
			<div class="uk-container uk-container-small">

				<h3 class="center">Search History</h3>
				<div class="uk-overflow-auto">
					<table class="uk-table uk-table-hover ">
						<thead>
							<tr class="uk-text-bold">
								<td>Origin</td>
								<td>Destination</td>
								<td>Distance</td>
								<td>Time</td>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($locations as $location): ?>
							<tr>
								<td><?= $location['origin']; ?></td>
								<td><?= $location['destination']; ?></td>
								<td><?= $location['distance']; ?></td>
								<td><?= $location['duration']; ?></td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>

<script>
	var input = document.getElementById('origin');
	var autocomplete = new google.maps.places.Autocomplete(input);
	var inputtwo = document.getElementById('destination');
	var autocompletetwo = new google.maps.places.Autocomplete(inputtwo);
</script>
