<tr id="row-<?php echo $row['student_id'] ?>">
	<td class="modelid"><?php echo $row['status_id'] ?></td>
	<td class="modelid"><?php echo $row['student_reg_no'] ?></td>
	<td class="modelname"><?php echo $row['student_name'] ?></td>
	<?php 
	if($row['status']==true)
	{?>
		<td class="modeladdress">Leave Bus</td>
	<?php
	}
	else
	{?>
		<td class="modeladdress">Active</td>
	<?php
	}

	?>
	<td class="modeladdress"><?php echo $row['date'] ?></td>
	<td><a class="btn-sm text-white btn-link btn-primary" href="#"  onclick="showDetailsForm(<?php echo $row['student_id'] ?>)" data-toggle="modal" data-target="#student_details">Activate</a></td>
	<td><a class="btn-sm text-white btn-link btn-warning" href="#"  onclick="showUpdateForm(<?php echo $row['student_id'] ?>)" data-toggle="modal" data-target="#updateStudentModel">Deactivate</a></td>
	<!-- <td><a class="btn-sm text-white btn-link btn-danger" href="#" onclick="deleteRecored(<?php echo $row['student_id']?>)">Delete</a></td> -->
</tr>
