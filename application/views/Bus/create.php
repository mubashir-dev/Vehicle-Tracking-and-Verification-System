<form action="" method="POST" id="CreateBusModel">

	<div class="form-group">
		<label for="bus">Bus Number </label>
		<input type="text" class="form-control" id="bus" name="bus">
		<small class="busError"></small>
	</div>

	<div class="form-group">
		<label for="busmodel">Bus Model </label>
		<input type="text" class="form-control" id="busmodel" name="busmodel">
		<small class="bmError"></small>
	</div>

	<div class="form-group">
		<label for="bustag">Bus Tag Number </label>
		<input type="text" class="form-control" id="bustag" name="bustag">
		<small class="btError"></small>
	</div>
	<div class="form-group">
		<label for="driver">Select Driver </label>
		<select name="driver" id="driver" class="form-control">
			<option value="" selected>Select Driver</option>
			<?php
			if (!empty($d_list)) { ?>

				<?php foreach ($d_list as $row) { ?>
					<option value="<?= $row['driver_id'] ?>"><?= $row['driver_name'] ?></option>
				<?php }
			} else { ?>
				<option>Recored Not Found</option>
			<?php } ?>
		</select>
	</div>
	<small class="drError"></small>
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-primary" id="submit_form">Save changes</button>
	</div>
</form>
