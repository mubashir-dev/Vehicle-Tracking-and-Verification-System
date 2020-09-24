<form action="" method="POST" id="UpdateFacultyModel">
	<input type="text" name="id" value="<?php echo $row['faculty_id'] ?>" hidden>

	<div class="form-group">
		<label for="name">Name </label>
		<input type="text" class="form-control" id="name" name="name" value="<?php echo $row['faculty_name'] ?>">
		<small class="nameError"></small>
	</div>
	<div class="form-group">
		<label for="faculty_no">Faculty Number </label>
		<input type="text" class="form-control" id="faculty_no" name="faculty_no" value="<?php echo $row['faculty_no'] ?>">
		<small class="factError"></small>
	</div>
	<div class="form-group">
		<label for="dept">Select Department </label>
		<select name="dept" id="dept" class="form-control">
			<option value="" selected>Select Department</option>
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
	<small class="deptError"></small>
	<div class="form-group">
		<label for="bus">Select Bus </label>
		<select name="bus" id="bus" class="form-control">
			<option value="">Select Bus</option>
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
	<small class="busError"></small>
	<div class="form-group">
		<label for="route">Select Route </label>
		<select name="route" id="route" class="form-control">
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
		<label for="cnic">Cnic</label>
		<input type="text" class="form-control" id="cnic" name="cnic" value="<?= $row['faculty_cnic'] ?>">
		<small class="cnicError"></small>
	</div>
	<div class="form-group">
		<label for="contact">Contact</label>
		<input type="text" class="form-control" id="contact" name="contact" value="<?= $row['faculty_contact'] ?>">
		<small class="contError"></small>
	</div>
	<div class="form-group">
		<label for="address">Address</label>
		<textarea id="address" class="form-control" name="address" rows="3"><?= $row['faculty_address'] ?></textarea>
		<small class="addressError"></small>

	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		<!-- <button type="submit" ></button> -->
		<a href="#" class="btn btn-primary" id="submit_form_update" onclick="updateFaculty()">Update changes</a>
	</div>
</form>
