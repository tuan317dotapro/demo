@extends('admin.base')

@section('content')

<div class="row">
	<div class="col-md-12">
		<h2 class="text-center">Add Staff</h2>
	</div>
</div>

@if ($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif

<div class="alert alert-danger">
	<h3>{{ $mess }}</h3>
</div>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $( function() {
    	$('.date').datepicker({
    		format: 'd/m/Y'
    	});        
    });
</script>
<form action="{{ route('admin.handleAddStaff') }}" method="POST" enctype="multipart/form-data">
	@csrf
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="nameStaff">Name: </label>
				<input type="text" class="form-control" name="nameStaff" id="nameStaff">
			</div>

			<div class="form-group border-top">
				<label for="room">Room</label>
				<select name="room" id="" class="form-control">
					@foreach($rooms as $key => $item)
						<option value="{{ $item['id'] }}">
							{{ $item['room_name'] }}
						</option>
					@endforeach
				</select>
			</div>

			<div class="form-group border-top">
				<label for="ranking">Ranking</label>
				<select name="ranking" id="" class="form-control">
					@foreach($rankings as $key => $item)
						<option value="{{ $item['id'] }}">
							{{ $item['ranking_name'] }}
						</option>
					@endforeach
				</select>
			</div>

			<div class="form-group border-top">
				<label for="project">Project</label>
				<select name="project" id="" class="form-control">
					@foreach($projects as $key => $item)
						<option value="{{ $item['id'] }}">
							{{ $item['project_name'] }}
						</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="birth">Birth</label>
				<input type="date" name="birth" id="birth" class="form-control">
			</div>
			<div class="form-group">
				<label for="gender">Gender</label>
				<input type="text" name="gender" id="gender" class="form-control">
			</div>
			<div class="form-group">
				<label for="address">Address</label>
				<input type="text" name="address" id="address" class="form-control">
			</div>
			<div class="form-group">
				<label for="phone">Phone</label>
				<input type="number" name="phone" id="phone" class="form-control">
			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" name="email" id="email" class="form-control">
			</div>
		</div>
		<div class="col-md-6 offset-md-3 mt-3 mb-3">
			<button type="submit" class="btn btn-primary btn-block">Submit</button>
		</div>
	</div>
</form>

@endsection

