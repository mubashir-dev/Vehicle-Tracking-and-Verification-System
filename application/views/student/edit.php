<form action="" method="POST" id="UpdateStudentModel">
    <input type="text" name="id" value="<?php echo $row['student_id'] ?>" hidden>
	<div class="form-group">
		<label for="sturegon">Student Reg No </label>
		<input type="text" class="form-control" id="sturegon" name="sturegon" value="<?=$row['student_reg_no']?>">
		<small class="sturegonError"></small>
	</div>
    <div class="form-group">
        <label for="name">Name </label>
        <input type="text" class="form-control" id="name" name="name" value="<?=$row['student_name']?>">
        <small class="nameError"></small>
    </div>
    <div class="form-group">
        <label for="dept">Select Department </label>
        <select name="dept" id="dept" class="form-control">
            <option value="">Select Department</option>
            <?php
			if (!empty($d_list)) { ?>

            <?php foreach ($d_list as $rows) { ?>
            <option <?php  echo ($row['dept_id']== $rows['dept_id']) ? "selected":"";  ?>
                value="<?= $rows['dept_id'] ?>"><?= $rows['dept_name'] ?></option>
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

            <?php foreach ($p_list as $rows) { ?>
            <option <?php  echo ($row['course_id']== $rows['course_id']) ? "selected":"";  ?>
                value="<?= $rows['course_id'] ?>"><?= $rows['course_name'] ?></option>
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

            <?php foreach ($l_list as $rows) { ?>
            <option <?php  echo ($row['semester_id']== $rows['semester_id']) ? "selected":"";  ?>
                value="<?= $rows['semester_id'] ?>"><?= $rows['semester_level'] ?>th</option>
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

				<?php foreach ($b_list as $rows) { ?>
					<option <?php  echo ($row['bus_id']== $rows['bus_id']) ? "selected":"";  ?>
                	value="<?= $row['bus_id'] ?>"><?= $row['bus_tag_number'] ?></option>
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
            <option <?php  echo ($row['route_id']== $rows['route_id']) ? "selected":"";  ?>
                value="<?= $rows['route_id'] ?>"><?= $rows['route_name'] ?></option>
            <?php }
			} else { ?>
            <option>Recored Not Found</option>
            <?php } ?>
        </select>
    </div>
    <small class="routeError"></small>
    <div class="form-group">
        <label for="contact">Contact</label>
        <input type="text" class="form-control" id="contact" name="contact" value="<?=$row['student_contact']?>">
        <small class="contError"></small>
    </div>
    <div class="form-group">
        <label for="address">Address</label>
        <textarea id="address" class="form-control" name="address" rows="3"><?= $row['student_address'] ?></textarea>
        <small class="addressError"></small>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		<a href="#" class="btn btn-primary" id="submit_form_update" onclick="updateStudent()">Update changes</a>

	</div>
</form>
