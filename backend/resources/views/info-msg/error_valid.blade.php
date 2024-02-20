<div class="alert alert-danger">
	<strong>Упс!</strong> Проблеми з введенням даних.<br><br>
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>