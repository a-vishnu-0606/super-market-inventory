<?php include 'db_connect.php' ?>
<div class="container-fluid">
	<div class="col-lg-12">
		<div class="row mt-3">
		<button class="col-md-1 float-right btn btn-primary btn-sm" id="new_sales"><b> New Sales</b></button>
		</div>
		<div class="row mb-3 mt-3">
			<div class="col-md-12">
				<div class="card">
				<div class="card-header">
						<h4><b>Sales</b></h4>
					</div>
					<div class="card-body">
						
						<table class="table table-bordered">
							<thead>
								<th class="text-center"><b>S.no</b></th>
								<th class="text-center"><b>Date</b></th>
								<th class="text-center"><b>Reference</b></th>
								<th class="text-center"><b>Customer</b></th>
								<th class="text-center"><b>Action</b></th>
							</thead>
							<tbody>
							<?php 
								$customer = $conn->query("SELECT * FROM customer_list order by name asc");
								while($row=$customer->fetch_assoc()):
									$cus_arr[$row['id']] = $row['name'];
								endwhile;
									$cus_arr[0] = "GUEST";

								$i = 1;
								$sales = $conn->query("SELECT * FROM sales_list  order by date(date_updated) desc");
								while($row=$sales->fetch_assoc()):
							?>
								<tr>
									<td class="text-center"><b><?php echo $i++ ?></b></td>
									<td class=""><b><?php echo date("M d, Y",strtotime($row['date_updated'])) ?></b></td>
									<td class=""><b><?php echo $row['ref_no'] ?></b></td>
									<td class=""><b><?php echo isset($cus_arr[$row['customer_id']])? $cus_arr[$row['customer_id']] :'N/A' ?></b></td>
									<td class="text-center">
										<a class="btn btn-sm btn-primary" href="index.php?page=pos&id=<?php echo $row['id'] ?>"><b>Edit</b></a>
										<a class="btn btn-sm btn-danger delete_sales" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><b>Delete</b></a>
									</td>
								</tr>
							<?php endwhile; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<script>
	$('table').dataTable({
		"ordering": false,
    "bLengthChange": false,
	"searching": false,
	"info": false,
		"paging": false,
	})
	$('#new_sales').click(function(){
		location.href = "index.php?page=pos"
	})
	$('.delete_sales').click(function(){
		_conf("Are you sure to delete this data?","delete_sales",[$(this).attr('data-id')])
	})
	function delete_sales($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_sales',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>
