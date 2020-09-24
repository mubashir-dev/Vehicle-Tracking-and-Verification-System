<form action="" method="POST" id="CreateStudentModel">
<div class="form-group">
		<label for="sturegon">Student Reg No </label>
		<input type="text" class="form-control" id="sturegon" name="sturegon">
		<small class="sturegonError"></small>
	</div>
	<div class="form-group">
		<label for="name">Name </label>
		<input type="text" class="form-control" id="name" name="name">
		<small class="nameError"></small>
	</div>
	<div class="form-group">
		<label for="dept">Select Department </label>
		<select name="dept" id="dept" class="form-control">
			<option value="" selected>Select Department</option>
			<?php
			if (!empty($d_list)) { ?>

				<?php foreach ($d_list as $row) { ?>
					<option value="<?= $row['dept_id'] ?>"><?= $row['dept_name'] ?></option>
				<?php }
			} else { ?>
				<option>Recored Not Found</option>
			<?php } ?>
		</select>
	</div>
	<small class="deptError"></small>

	<div class="form-group">
		<label for="program">Select Program </label>
		<select name="program" id="program" class="form-control">
			<option value="">Select Program</option>
			<?php
			if (!empty($p_list)) { ?>

				<?php foreach ($p_list as $row) { ?>
					<option value="<?= $row['course_id'] ?>"><?= $row['course_name'] ?></option>
				<?php }
			} else { ?>
				<option>Recored Not Found</option>
			<?php } ?>
		</select>
	</div>
	<small class="progrmError"></small>
	<div class="form-group">
		<label for="semester">Select Semester </label>
		<select name="semester" id="semester" class="form-control">
			<option value="">Select Semester</option>
			<?php
			if (!empty($l_list)) { ?>

				<?php foreach ($l_list as $row) { ?>
					<option value="<?= $row['semester_id'] ?>"><?= $row['semester_level'] ?></option>
				<?php }
			} else { ?>
				<option>Recored Not Found</option>
			<?php } ?>
		</select>
	</div>
	<small class="semesterError"></small>
	<div class="form-group">
		<label for="bus">Select Bus </label>
		<select name="bus" id="bus" class="form-control">
			<option value="">Select Bus</option>
			<?php
			if (!empty($b_list)) { ?>

				<?php foreach ($b_list as $row) { ?>
					<option value="<?= $row['bus_id'] ?>"><?= $row['bus_tag_number'] ?></option>
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

				<?php foreach ($r_list as $row) { ?>
					<option value="<?= $row['route_id'] ?>"><?= $row['route_name'] ?></option>
				<?php }
			} else { ?>
				<option>Recored Not Found</option>
			<?php } ?>
		</select>
	</div>
	<small class="routeError"></small>
	<div class="form-group">
		<label for="contact">Contact</label>
		<input type="text" class="form-control" id="contact" name="contact">
		<small class="contError"></small>
	</div>
	<div class="form-group">
		<label for="address">Address</label>
		<textarea id="address" class="form-control" name="address" rows="3"></textarea>
		<small class="addressError"></small>

	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-primary" id="submit_form">Save changes</button>
	</div>
</form>
