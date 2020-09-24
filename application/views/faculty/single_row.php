<tr id="row-<?php echo $row['faculty_id'] ?>">
    <td class="modelid"><?php echo $row['faculty_id'] ?></td>
    <td class="modelemail"><?php echo $row['faculty_name'] ?></td>
    <td class="modelfather_name"><?php echo $row['bus_tag_number'] ?></td>
    <!-- <td class="modeladdress"><?php echo $row['faculty_cnic'] ?>th</td> -->
    <td class="modeladdress"><?php echo $row['dept_name'] ?></td>
    <!-- <td class="modelname"><?php echo $row['faculty_no'] ?></td> -->
    <!-- <td class="modeladdress"><?php echo $row['faculty_contact'] ?></td> -->
    <td class="modeladdress"><?php echo $row['route_name'] ?></td>
    <!-- <td class="modeladdress"><?php echo $row['faculty_address'] ?></td> -->
    <td><a class="btn-sm text-white btn-link btn-primary" href="#"  onclick="showDetailsForm(<?php echo $row['faculty_id'] ?>)" data-toggle="modal" data-target="#faculty_details">View</a></td>
	<td><a class="btn-sm text-white btn-link btn-warning" href="#"  onclick="showUpdateForm(<?php echo $row['faculty_id'] ?>)" data-toggle="modal" data-target="#updateFacultyModel">Edit</a></td>
	<td><a class="btn-sm text-white btn-link btn-danger" href="#" onclick="deleteRecored(<?php echo $row['faculty_id'] ?>)" data-toggle="modal" data-target="#deleteConfirm">Delete</a></td>
</tr>
