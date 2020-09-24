<tr id="row-<?php echo $row['student_id'] ?>">
	<td class="modelname"><?php echo $row['fee_id'] ?></td>
	<td class="modelname"><?php echo $row['student_reg_no'] ?></td>
	<td class="modelname"><?php echo $row['student_name'] ?></td>
	<td class="modelfather_name"><?php echo $row['fee_amount'] ?></td>
	<td class="modelfather_name"><?php echo $row['fee_date'] ?></td>
	<!-- <td class="modelemail"><?php  echo $row['status'] ?></td> -->
	<?php
	if($row['status']==0)
	{?>
	<td><a class="btn-sm text-white btn-link btn-warning" href="#" onclick="payStudentFee(<?php echo $row['student_id'] ?>)" data-toggle="modal" data-target="#student_details">Unpaid</a></td>
	
	<?php
	}
	else
	{?>
	<td><a class="btn-sm text-white btn-link btn-success" href="#" onclick="payStudentFee(<?php echo $row['student_id'] ?>)" data-toggle="modal" data-target="#student_details">Paid</a></td>
	<?php
	}
	?>
	
	<td><a class="btn-sm text-white btn-link btn-primary" href="#" onclick="showDetailsForm(<?php echo $row['student_id'] ?>)" data-toggle="modal" data-target="#student_details">View</a></td>
	<!-- <td><a class="btn-sm text-white btn-link btn-warning" href="#" onclick="showUpdateForm(<?php echo $row['student_id'] ?>)" data-toggle="modal" data-target="#updateStudentModel">Edit</a></td>
	<td><a class="btn-sm text-white btn-link btn-danger" href="#" onclick="deleteRecored(<?php echo $row['student_id'] ?>)">Delete</a></td> -->
</tr>
