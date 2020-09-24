<tr id="row-<?php echo $row['driver_id'] ?>">
	<td><?php echo $row['driver_id'] ?></td>
	<td class="modelid"><?php echo $row['driver_name'] ?></td>
	<td class="modelid"><?php echo $row['driver_contact'] ?></td>
	<td class="modelid"><?php echo $row['driver_address'] ?></td>
	
	<!-- <td><a class="btn-sm text-white btn-link btn-primary" href="#"  onclick="showDetailsForm(<?php echo $row['dept_id'] ?>)" data-toggle="modal" data-target="#student_details">View</a></td> -->
	<td><a class="btn-sm text-white btn-link btn-warning" href="#"  onclick="showUpdateForm(<?php echo $row['driver_id'] ?>)" data-toggle="modal" data-target="#updateStudentModel">Edit</a></td>
	<td><a class="btn-sm text-white btn-link btn-danger" href="#" onclick="deleteRecored(<?php echo $row['driver_id']?>)">Delete</a></td>
</tr>
