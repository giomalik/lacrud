<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie-edge">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
	<!-- Google Fonts -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
	<!-- Bootstrap core CSS -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
	<!-- Material Design Bootstrap -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.15.0/css/mdb.min.css" rel="stylesheet">

	<!-- JQuery -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!-- Bootstrap tooltips -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<!-- MDB core JavaScript -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.15.0/js/mdb.min.js"></script>

	<title>lacrud</title>

	<style type="text/css">
		.container
		{
			padding: 0.5%;
		}
		.btn-info
		{
			margin-left: 82%;
		}
		.btn-edit
		{
			display: inline;
		}
	</style>

</head>
<body>

	<div class="container">
		<h2 class="alert alert-success" > Laracrud </h2>

		<div class="row">
			<a href="" class="btn btn-info mb-4" data-toggle="modal" data-target="#exampleModal">Add New Student</a>
			<div class="col-md-12">

				@if($message = Session::get('success'))

				<div class="alert-success">
					<p>{{$message}}</p>
				</div>

				@endif
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>LastName</th>
							<th>Gender</th>
							<th>Country</th>
							<th>City</th>
							<th>Address</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($students as $key=>$student)
						<tr>
							<td>{{++$key}}</td>
							<td>{{ $student->firstname }}</td>
							<td>{{ $student->lastname }}</td>
							<td>{{ $student->country }}</td>
							<td>{{ $student->gender }}</td>
							<td>{{ $student->city }}</td>
							<td>{{ $student->address }}</td>
							<td>

								<!-- .............. Show Button Start ................... -->
								<a type="button" data-student_id="{{ $student->id }}" data-firstname="{{ $student->firstname }}" data-lastname="{{ $student->lastname }}" data-country="{{ $student->country }}" data-gender="{{ $student->gender }}" data-city="{{ $student->city }}" data-address="{{ $student->address }}" data-toggle="modal" data-target="#exampleModal-show" class="btn btn-warning btn-sm" >Show</a>
								<!-- .............. Show Button End ................... -->
								<!-- <a type="button" class="btn btn-warning btn-sm" >Show</a> -->
								<!-- .............. Edit Button Start ................... -->
								<a type="button" data-student_id="{{ $student->id }}" data-firstname="{{ $student->firstname }}" data-lastname="{{ $student->lastname }}" data-country="{{ $student->country }}" data-gender="{{ $student->gender }}" data-city="{{ $student->city }}" data-address="{{ $student->address }}" data-toggle="modal" data-target="#exampleModal-edit" class="btn btn-info btn-sm" >Edit</a>
								<!-- .............. Edit Button End ................... -->
								<!-- -------------- Delete Button Start ------------- -->
								<a type="button" data-student_id="{{ $student->id }}" data-toggle="modal" data-target="#exampleModal-delete" class="btn btn-danger btn-sm" >Delete</a>
								<!-- -------------- Delete Button End ------------- -->
							</td>
							
						</tr>
						@endforeach
					</tbody>
					{{ $students->links() }}
				</table>

				<!-- .............Add New Student Modal.............. -->

				<!-- Modal -->
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-notify modal-lg modal-right modal-success" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				        <form action="{{ route('student.store') }}" method="post">
				        	@csrf
				        	<div class="input-group">
				        		<div class="input-group-prepend">
				        			<span class="input-group-text">Firstname &amp; Lastname</span>
				        		</div>
				        		<input class="form-control" name="firstname" placeholder="Firstname"></input>
				        		<input class="form-control" name="lastname" placeholder="Lastname"></input>
				        	</div>
				        	<br>
				        	<div class="input-group">
				        		<div class="input-group-prepend">
				        			<span class="input-group-text">Country &amp; City</span>
				        		</div>
				        		<input class="form-control" name="country" placeholder="Country"></input>
				        		<input class="form-control" name="city" placeholder="City"></input>
				        	</div>
				        	<br>
				        	<div class="input-group">
				        		<div class="input-group-prepend">
				        			<span class="input-group-text">Address &amp; Gender</span>
				        		</div>
				        		<textarea class="form-control" name="address" placeholder="Address"></textarea>
				        		<input class="form-control" name="gender" placeholder="Gender"></input>
				        	</div>
				        	<br>

				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
				        <button type="submit" class="btn btn-success">Save Student</button>
				        	</form>
				      </div>
				    </div>
				  </div>
				</div>

				<!-- .............Edit Student Modal.............. -->

				<!-- Modal -->
				<div class="modal fade" id="exampleModal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-notify modal-lg modal-right modal-info" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				        <form action="{{ route('student.update', 'student_id') }}" method="post">
				        	@csrf
				        	@method('PUT')
				        	<div class="input-group">
				        		<div class="input-group-prepend">
				        			<span class="input-group-text">Firstname &amp; Lastname</span>
				        		</div>
				        		<input class="form-control" id="firstname" name="firstname" placeholder="Firstname"></input>
				        		<input class="form-control" id="lastname" name="lastname" placeholder="Lastname"></input>

				        	</div>
				        	<input type="hidden" name="student_id" id="student_id">
				        	<br>
				        	<div class="input-group">
				        		<div class="input-group-prepend">
				        			<span class="input-group-text">Country &amp; City</span>
				        		</div>
				        		<input class="form-control" id="country" name="country" placeholder="Country"></input>
				        		<input class="form-control" id="city" name="city" placeholder="City"></input>
				        	</div>
				        	<br>
				        	<div class="input-group">
				        		<div class="input-group-prepend">
				        			<span class="input-group-text">Address &amp; Gender</span>
				        		</div>
				        		<textarea class="form-control" id="address" name="address" placeholder="Address"></textarea>
				        		<input class="form-control" id="gender" name="gender" placeholder="Gender"></input>
				        	</div>
				        	<br>

				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-warning btn-edit" data-dismiss="modal">Close</button>
				        <button type="submit" class="btn btn-info btn-edit ml-auto">Update Student</button>
				        	</form>
				      </div>
				    </div>
				  </div>
				</div>

				<!-- .............Delete Student Modal.............. -->

				<!-- Modal -->
				<div class="modal fade" id="exampleModal-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-notify modal-right modal-danger" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body" style="background: rgb(255, 0, 0); color: #fff!important; font-weight: bold;">
				        <form action="{{ route('student.destroy', 'student_id') }}" method="post">
				        	@csrf
				        	@method('DELETE')
				        	
				        	<input type="hidden" name="student_id" id="student_id">
				        	<p class="text-center" width="50px">Are You Sure You Want to Delete This Student?</p>
				        	

				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-warning btn-edit" data-dismiss="modal">Cancel</button>
				        <button type="submit" class="btn btn-danger btn-edit ml-auto">Delete Student</button>
				        	</form>
				      </div>
				    </div>
				  </div>
				</div>

				<!-- .............Show Student Modal.............. -->

				<!-- Modal -->
				<div class="modal fade" id="exampleModal-show" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-notify modal-lg modal-right modal-warning" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				        <form action="{{ route('student.show', 'student_id') }}" method="get">
				        	@csrf
				        	<div class="input-group">
				        		<div class="input-group-prepend">
				        			<span class="input-group-text">Firstname &amp; Lastname</span>
				        		</div>
				        		<input class="form-control" id="firstname" name="firstname" placeholder="Firstname" readonly></input>
				        		<input class="form-control" id="lastname" name="lastname" placeholder="Lastname" readonly></input>

				        	</div>
				        	<input type="hidden" name="student_id" id="student_id" readonly>
				        	<br>
				        	<div class="input-group">
				        		<div class="input-group-prepend">
				        			<span class="input-group-text">Country &amp; City</span>
				        		</div>
				        		<input class="form-control" id="country" name="country" placeholder="Country" readonly></input>
				        		<input class="form-control" id="city" name="city" placeholder="City" readonly></input>
				        	</div>
				        	<br>
				        	<div class="input-group">
				        		<div class="input-group-prepend">
				        			<span class="input-group-text">Address &amp; Gender</span>
				        		</div>
				        		<textarea class="form-control" id="address" name="address" placeholder="Address" readonly></textarea>
				        		<input class="form-control" id="gender" name="gender" placeholder="Gender" readonly></input>
				        	</div>
				        	<br>

				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-warning btn-edit" data-dismiss="modal">Close</button>
				        <!-- <button type="submit" class="btn btn-info btn-edit ml-auto">Show Student</button> -->
				        	</form>
				      </div>
				    </div>
				  </div>
				</div>


			</div>
		</div>

	</div>

	<script type="text/javascript">
		$('#exampleModal-edit').on('show.bs.modal', function(event) {
			// body...
			var button = $(event.relatedTarget);
			var firstname = button.data('firstname');
			var lastname = button.data('lastname');
			var country = button.data('country');
			var city = button.data('city');
			var gender = button.data('gender');
			var address = button.data('address');
			var student_id = button.data('student_id');

			var modal = $(this);

			modal.find('.modal-title').text('Edit Student Information');
			modal.find('.modal-body #firstname').val(firstname);
			modal.find('.modal-body #lastname').val(lastname);
			modal.find('.modal-body #country').val(country);
			modal.find('.modal-body #city').val(city);
			modal.find('.modal-body #gender').val(gender);
			modal.find('.modal-body #address').val(address);
			modal.find('.modal-body #student_id').val(student_id);
		});

		$('#exampleModal-delete').on('show.bs.modal', function(event) {
			// body...
			var button = $(event.relatedTarget);
			
			var student_id = button.data('student_id');

			var modal = $(this);

			modal.find('.modal-title').text('Delete Student Information');
			
			modal.find('.modal-body #student_id').val(student_id);
		});

		$('#exampleModal-show').on('show.bs.modal', function(event) {
			// body...
			var button = $(event.relatedTarget);
			var firstname = button.data('firstname');
			var lastname = button.data('lastname');
			var country = button.data('country');
			var city = button.data('city');
			var gender = button.data('gender');
			var address = button.data('address');
			var student_id = button.data('student_id');

			var modal = $(this);

			modal.find('.modal-title').text('View Student Information');
			modal.find('.modal-body #firstname').val(firstname);
			modal.find('.modal-body #lastname').val(lastname);
			modal.find('.modal-body #country').val(country);
			modal.find('.modal-body #city').val(city);
			modal.find('.modal-body #gender').val(gender);
			modal.find('.modal-body #address').val(address);
			modal.find('.modal-body #student_id').val(student_id);
		});
	</script>

</body>

</html>