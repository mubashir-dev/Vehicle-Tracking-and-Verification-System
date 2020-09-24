<form action="" method="POST" id="UpdateBusModel">

<input type="text" name="id" value="<?=$row['bus_id']?>" hidden>
	<div class="form-group">
		<label for="bus">Bus Number </label>
		<input type="text" class="form-control" id="bus" name="bus" value="<?=$row['bus_number']?>">
		<small class="busError"></small>
	</div>

	<div class="form-group">
		<label for="busmodel">Bus Model </label>
		<input type="text" class="form-control" id="busmodel" name="busmodel" value="<?=$row['bus_model']?>">
		<small class="bmError"></small>
	</div>

	<div class="form-group">
		<label for="bustag">Bus Tag Number </label>
		<input type="text" class="form-control" id="bustag" name="bustag" value="<?=$row['bus_tag_number']?>">
		<small class="btError"></small>
	</div>


	<div class="form-group">
		<label for="driver">Select Driver </label>
		<select name="driver" id="driver" class="form-control">
			<option value="" selected>Select Driver</option>
			<?php
			if (!empty($d_list)) { ?>

			<?php foreach ($d_list as $rows) { ?>
            <option <?php  echo ($row['driver_id']== $rows['driver_id']) ? "selected":"";  ?>
                value="<?= $rows['driver_id'] ?>"><?= $rows['driver_name'] ?></option>
            <?php }
			} else { ?>
				<option>Recored Not Found</option>
			<?php } ?>
		</select>
	</div>
	<small class="drError"></small>
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-primary" id="submit_form" onclick="updateBus()">Save changes</button>
	</div>
</form>
