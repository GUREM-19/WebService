$(document).ready(function(){

	fetch_data();

	let updateStatus =0;
	let matricula = '';

	function fetch_data()
	{
		//READ DATA
		$.ajax({
			url:"crud.php",
			success:function(data)
			{
				$('tbody').html(data);
			}
		})
	}
	//CONF POP-UP
	$('#add_button').click(function(){
		$('#button_action').val('Agregar');
		$('.modal-title').text('Agregar alumno');
		$('#apicrudModal').modal('show');
		$('#mat').val("");
		$('#nombre').val("");
		$('#apellido').val("");
		$('#estado').val("");
		updateStatus = 0;
		console.log(updateStatus);
	});
	//POP-UP ALERT
	$('#form').on('submit', function(event){
		event.preventDefault();
		if($('#mat').val() == '')
		{
			alert("Ingresa la matrícula");
		}
		else if($('#nombre').val() == '')
		{
			alert("Ingresa el nombre del alumno");
		}
        else if($('#apellido').val() == '')
		{
			alert("Ingresa el apellido del alumno");
		}
        else if($('#estado').val() == '')
		{
			alert("Ingresa el estado");
		}
		else
		{
			if(updateStatus == 0){
				add();
			}
			else{
				update();
			}
		}
	});

	const add = () =>{
		//CREATE HANDLER
		$.ajax({
			url:"crud.php",
			method:"POST",
			data:$('#form').serialize(),
			success:function()
			{
				fetch_data();
				$('#form')[0].reset();
				$('#apicrudModal').modal('hide');
				
			}
		});
	}

	const update =() =>{
		//UPDATE HANDLER
		$.ajax({
			url:"crud.php",
			method:"PUT",
			data:{mat:matricula,
				matricula: $('#mat').val(),
				nombre: $('#nombre').val(),
				apellido: $('#apellido').val(),
				estado: $('#estado').val()
			},
			dataType:"json",
			success:function(data)
			{
				fetch_data();
				$('#mat').val("");
				$('#nombre').val("");
				$('#apellido').val("");
				$('#estado').val("");
				$('#apicrudModal').modal('hide');
				
			}
		});

	}
	//POP UP UPDATE
	$(document).on('click', '.edit', function(){
		matricula = $(this).attr("id");
		updateStatus =1;
		$('#button_action').val('Modificar');
		$('.modal-title').text('Editar');

	});
	//DELETE HANDLER
	$(document).on('click', '.delete', function(){
		matricula = $(this).attr("id");
		if(confirm("¿Estas seguro que quieres eliminar este registro?"))
		{
			$.ajax({
				url:"crud.php?matricula=" + matricula,
				method:"DELETE",
				data:{matricula:matricula},
				success:function()
				{
					fetch_data();
				}
			});
		}
	});

});