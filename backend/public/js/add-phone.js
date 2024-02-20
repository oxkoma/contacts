document.getElementById('add_btn')
.addEventListener('click', onClickAddPhoneButton);

function createPhoneComponent() {
	
	rootElement = document.createElement('div');
	rootElement.setAttribute('class', 'row');
  
	let contents = '<input type="text" class="form-control" placeholder="+380501111111" name="phones[]" aria-label="phone"	pattern="/^(\+[0-9)]*)$/" required>';
	  
	rootElement.innerHTML = contents;
	
	return rootElement;
  }
  
  function onClickAddPhoneButton(event) {
	console.log('Произошло событие', event.type)
	let container = document.getElementById('contact'),
	
	component = createPhoneComponent(); 
	container.appendChild(component);
  }



  /*const addBtn = document.getElementById('add_btn');
  if (addBtn) {
	addBtn.addEventListener('click', onClickAddPhoneButton);
  }*/
