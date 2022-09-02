<?php 
require_once('../connect.php');
require_once('../class/Book.php');
$books = $book->getAllBook();

// echo '<pre>';
// 	print_r($books);
// echo '</pre>';
 ?>
 <style>
	 table{
		 background-color: white;
		 color: black;
	 }
 </style>

<table id="myTable-book" class="table table-bordered table-hover" cellspacing="0" width="100%">
	<thead>
	    <tr>
            
	        <th>Book By</th>
			<th>Email</th>
	        <th>Laboratory</th>
	        <th>Date</th>
	        <th>Start time</th>
			<th>Finish time</th>
			<th>Results</th>
	        <th><center>Action</center></th>
	    </tr>
	</thead>
    <tbody>
    	<?php foreach($books as $b): ?>
    		<tr>
    			
                <td><?= ucwords($b['lecturer']); ?></td>
    			<td><?= $b['email']; ?></td>
				<td><?= $b['RoomReserved']; ?></td>
    			<td><?= ucwords($b['res_date']); ?></td>
				<td><?= $b['finish_time']; ?></td>
    			<td><?= $b['start_time']; ?></td>
				<td><?= $b['results']; ?></td>
    			<td>
    				<center>
    					<button type="button" onclick="deleteBook('<?= $b['reserveId']; ?>');" class="btn btn-danger btn-xs">Cancel
    					<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
    					</button>
    					
                      
                                   
                                   <button type="button" onclick="viewBook('<?= $b['reserveId']; ?>')" class="btn btn-success btn-xs">Accept
    					          <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
    					           </button>
								 

							
						
								

								
                         
    					
    				</center>
    			</td>
    		</tr>
    	<?php endforeach; ?>
    </tbody>
</table>


<!-- for the datatable of employee -->
<script type="text/javascript">
	$(document).ready(function() {
		$('#myTable-book').DataTable();
	});
</script>
