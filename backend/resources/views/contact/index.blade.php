<table class="table">
	<thead>
		<tr>
			<th scope="col">#</th>
			<th scope="col">First Name</th>
			<th scope="col">Last Name</th>
			<th scope="col">Phone</th>
			<th scope="col"></th>
			<th scope="col"></th>
		</tr>
	</thead>
	<tbody>
		@if ($collection->isEmpty())
		<div>Немає данних для відображення</div>
		@endif
		@foreach ($collection as $item)
		<tr>
			<th scope="row">{{ $item->id }}</th>
			<td> {{ $item['first_name'] }} </td>
			<td>{{ $item['last_name'] }}</td>
			<td>
				<x-button id="add_ph">Add phone</x-button>
			</td>
			<td>
				<form action="{{ route('contacts.destroy', $item->id) }}" method="POST">
					@csrf
					@method('DELETE')
					<x-button type="submit" color="btn-danger" onclick="return confirm('Видалити запис?')">Видалити запис</x-button>
				</form>
			</td>
			<td>
				
			</td>
			<td>
				@foreach ($item['phones'] as $phone)
		<tr id="td_del">
			<td></td>
			<td></td>
			<td></td>
			<td>
				{{ $phone['phone'] }}
			</td>
			<td>
				<form action="{{ route('phones.destroy', $phone->id) }}" method="POST">
					@csrf
					@method('DELETE')
					<x-button type="submit" color="btn-danger" onclick="return confirm('Видалити запис?')">-</x-button>
				</form>
			</td>
		</tr>
		@endforeach
		</td>
		</tr>
		@endforeach
	</tbody>	
</table>
<div>
	{{ $collection->links('vendor.pagination.bootstrap-4') }}
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
	$('#add_ph').on('click', function() {
		var rowHTML = '';
		
		// rowHTML +='@csrf';
		rowHTML +='<tr>';
		rowHTML +='<td></td>';
		rowHTML +='<td></td>';
		rowHTML +='<td></td>';
		rowHTML +='<td>';
		rowHTML +='<form action="{{ route('phones.store') }}" method="POST"><input type="text" class="form-control" placeholder="+380501111111" name="phones[]" aria-label="phone" pattern="/^(\+[0-9)]*)$/">';
		rowHTML +='</td>';
		rowHTML +='<td>';
		rowHTML +='<input type="submit" class="btn btn-primary" name="submit">';
		rowHTML +='<input type="hidden" name="id" value={{ $item->id }}>';
		rowHTML +='</td></form>';
		rowHTML +='</tr>';

		$('#td_del').before(rowHTML);
	});
})
</script>