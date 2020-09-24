<form action="" method="POST">
	<input type="text" name="id" value="<?php echo $row['faculty_id'] ?>" hidden>

	<div class="form-group">
		<label for="factno">Faculty No </label>
		<input type="text" class="form-control" id="factno" name="factno" value="<?= $row['faculty_no'] ?>" disabled>
	</div>
	<div class="form-group">
		<label for="name">Name </label>
		<input type="text" class="form-control" id="name" name="name" value="<?= $row['faculty_name'] ?>" disabled>
	</div>
	<div class="form-group">
		<label for="bus">Bus</label>
		<select name="bus" id="bus" class="form-control" disabled>
			<?php
			if (!empty($b_list)) { ?>

				<?php foreach ($b_list as $rows) { ?>
					<option <?php echo ($row['bus_id'] == $rows['bus_id']) ? "selected" : "";  ?> value="<?= $rows['bus_id'] ?>"><?= $rows['bus_tag_number'] ?></option>
				<?php }
			} else { ?>
				<option>Recored Not Found</option>
			<?php } ?>
		</select>
	</div>
		<div class="form-group">
		<label for="cnic">Cnic </label>
		<input type="text" class="form-control" id="cnic" name="cicn" value="<?= $row['faculty_cnic'] ?>" disabled>
	</div>
	<div class="form-group">
		<label for="dept">Department </label>
		<select name="dept" id="dept" class="form-control" disabled>
			<option value="">Select Department</option>
			<?php
			if (!empty($d_list)) { ?>

				<?php foreach ($d_list as $rows) { ?>
					<option <?php echo ($row['dept_id'] == $rows['dept_id']) ? "selected" : "";  ?> value="<?= $rows['dept_id'] ?>"><?= $rows['dept_name'] ?></option>
				<?php }
			} else { ?>
				<option>Recored Not Found</option>
			<?php } ?>
		</select>
	</div>
	<div class="form-group">
		<label for="route">Route </label>
		<select name="route" id="route" class="form-control" disabled>
			<option value="">Select Route</option>
			<?php
			if (!empty($r_list)) { ?>

				<?php foreach ($r_list as $rows) { ?>
					<option <?php echo ($row['route_id'] == $rows['route_id']) ? "selected" : "";  ?> value="<?= $rows['route_id'] ?>"><?= $rows['route_name'] ?></option>
				<?php }
			} else { ?>
				<option>Recored Not Found</option>
			<?php } ?>
		</select>
	</div>
	<small class="routeError"></small>
	<div class="form-group">
		<label for="contact">Contact</label>
		<input type="text" class="form-control" id="contact" name="contact" value="<?= $row['faculty_contact'] ?>" disabled>
		<small class="contError"></small>
	</div>
	<div class="form-group">
		<label for="address">Address</label>
		<textarea id="address" class="form-control" name="address" rows="3" disabled><?= $row['faculty_address'] ?></textarea>
		<small class="addressError"></small>

	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	</div>
</form>
