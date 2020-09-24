<form action="" method="POST">
	<input type="text" name="id" value="<?php echo $row['student_id'] ?>" hidden>
	<div class="form-group">
		<label for="sturegon">Student Reg No </label>
		<input type="text" class="form-control" id="sturegon" name="sturegon" value="<?=$row['student_reg_no']?>" disabled>
	</div>
	<div class="form-group">
		<label for="name">Name </label>
		<input type="text" class="form-control" id="name" name="name" value="<?= $row['student_name'] ?>" disabled>
		<small class="nameError"></small>
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
	<small class="deptError"></small>

	<div class="form-group">
		<label for="program">Program </label>
		<select name="program" id="program" class="form-control" disabled>
			<option value="">Select Program</option>
			<?php
			if (!empty($p_list)) { ?>

				<?php foreach ($p_list as $rows) { ?>
					<option <?php echo ($row['course_id'] == $rows['course_id']) ? "selected" : "";  ?> value="<?= $rows['course_id'] ?>"><?= $rows['course_name'] ?></option>
				<?php }
			} else { ?>
				<option>Recored Not Found</option>
			<?php } ?>
		</select>
	</div>
	<small class="progrmError"></small>
	<div class="form-group">
		<label for="semester">Semester </label>
		<select name="semester" id="semester" class="form-control" disabled>
			<option value="">Select Semester</option>
			<?php
			if (!empty($l_list)) { ?>

				<?php foreach ($l_list as $rows) { ?>
					<option <?php echo ($row['semester_id'] == $rows['semester_id']) ? "selected" : "";  ?> value="<?= $rows['semester_id'] ?>"><?= $rows['semester_level'] ?>th</option>
				<?php }
			} else { ?>
				<option>Recored Not Found</option>
			<?php } ?>
		</select>
	</div>
	<small class="semesterError"></small>
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
		<input type="text" class="form-control" id="contact" name="contact" value="<?= $row['student_contact'] ?>" disabled>
		<small class="contError"></small>
	</div>
	<div class="form-group">
		<label for="address">Address</label>
		<textarea id="address" class="form-control" name="address" rows="3" disabled><?= $row['student_address'] ?></textarea>
		<small class="addressError"></small>

	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	</div>
</form>
