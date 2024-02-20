<div>
	
	@if ($errors->any())
		@include('info-msg.error_valid')
	@endif
	@if (Session::has('error'))
		@include('info-msg.error')
	@endif
	@if (Session::has('success'))
		@include('info-msg.success')
	@endif

	<h2>Створити контакт</h2>
	<form action="{{ route('contacts.store') }}" method="POST" class="input-group mb-3 d-flex gap-2" id="contact">
		@csrf
		<div>
			<input type="text" class="form-control" placeholder="First name" name="first_name" aria-label="first_name" value="{{ old('first_name') }}">
		</div>
		<div>
			<input type="text" class="form-control" placeholder="Last name" name="last_name" aria-label="last_name" value="{{ old('last_name') }}">
		</div>
		<div id='phone-el'>
			<input type="text" class="form-control" placeholder="+380501111111" id="phone" name="phones[]"
				aria-label="phone" pattern="/^(\+[0-9)]*)$/" value="{{ old('phone') }}">
		</div>
		<div id="btn_group">
			<x-button type="button" id="add_btn" name="add">+</x-button>
			<!-- <x-button type="button" name="remove" color="btn-danger">-</x-button> -->
			<x-button type="submit">Submit</x-button>
		</div>
	</form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
	var i = 0;
	$('#add_btn').on('click', function() {
		++i;
		var content = '';
		content +='<div class="d-flex gap-1 mb-1">';
		content +='<div id="el'+i+'">';
		content +='<input type="text" class="form-control" placeholder="+380501111111" name="phones[]" aria-label="phone" pattern="/^(\+[0-9)]*)$/">';
		content +='</div>';
		content +='<div>';
		content +='<button class="btn btn-danger del" id="'+i+'">-</button>';
		content +='</div>';
		content +='</div>';
		$('#phone-el').append(content);
	});

	$(document).on('click', '.del', function(){
		var id = $(this).attr("id");
		$('#el'+id).parent('div').remove();
	});
})
</script>