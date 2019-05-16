@extends('admin.base')

@section('content')
<div class="row">
	<div class="col-md-12">
		<h3 class="text-center">Staff</h3>
		<h3 class="text-center">{{ $mess }}</h3>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<a href="{{ route('admin.addStaff') }}" class="btn btn-primary">Add Staff</a>
		<a href="{{ route('admin.staff') }}" class="btn btn-primary">View All</a>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Room</th>
					<th>Ranking</th>
					<th>Project</th>
					<th>Address</th>
					<th>Phone</th>
					<th>Email</th>
					<th colspan="2" width="3%" class="text-center">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($lstSt as $key =>$item)
					<tr id="row{{ $item['id'] }}">
						<td>{{ $item['id'] }}</td>
						<td>{{ $item['name_staff'] }}</td>
						<td>
							{{ $item['rooms_id'] }}
						</td>
						<td>
							{{ $item['rankings_id'] }}
						</td>
						<td>
							{{ $item['projects_id'] }}
						</td>
						<td>{{ $item['address'] }}</td>
						<td>{{ $item['phone'] }}</td>
						<td>{{ $item['email'] }}</td>
						<td>
							{{-- <a href="{{ route('admin.editStaff') }}" class="btn btn-info">Edit</a> --}}
						</td>
						<td class="btn btn-danger btnDelete" id="{{ $item['id'] }}">Delete</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		{{ $link->appends(request()->query())->links() }}
	</div>
</div>
@endsection
@push('js')
	<script type="text/javascript">
		$(function(){
			$('.btnDelete').click(function() {
				let self = $(this);
				let idSt = self.attr('id');
			
				if ($.isNumeric(idSt)) {
					$.ajax({
						url:"{{ route('admin.deleteStaff') }}",
						type: "POST",
						data: {id: idSt},
						beforeSend: function() {
							self.text('Loading ...');
						},
						success: function(result) {
							self.text('Delete');
							result = $.trim(result);
							if (result === 'OK') {
								alert('Delete successful');
								$('#row_'+idSt).hide();
							} else {
								alert('Delete fail');
							}
							return false;
						}
					});
				}
			});
		})
	</script>
@endpush