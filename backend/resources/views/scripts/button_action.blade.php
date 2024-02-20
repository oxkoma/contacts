<script>
$(document).ready(function() {
	var i = 0;
	$('#add_btn').on('click', function() {
		++i;
		var content = '';
		content +='<div class="d-flex gap-1 div'+i+'" id="el'+i+'">';
		content +='<input type="text" class="form-control" placeholder="+380501111111" name="phones[phone'+i+']" aria-label="phone" pattern="/^(\+[0-9)]*)$/">';
		content +='<button class="btn btn-danger del" id="'+i+'">-</button>';
		content +='</div>';
		$('#phone-el').append(content);
	});
	$('.del').on('click', function(event) {
	event.preventDefault();
	alert(event);
		var id = $(this).attr("id");
		alert('#el'+id);
		$('#el'+id).remove();
	});
})

</script>