<div class="input-group mb-3 d-flex gap-2">
	<input type="text" class="form-control" placeholder="+380501111111" name="phone" aria-label="phone"
		pattern="/^(\+[0-9)]*)$/">
	<form action="{{ route('phones.destroy', $phone->id) }}" method="POST">
		@csrf
		@method('DELETE')
		<x-button type="submit" color="btn-danger" onclick="return confirm('Видалити запис?')">-</x-button>
	</form>
</div>