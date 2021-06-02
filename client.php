<!DOCTYPE html>
<html>
	<head>
		<title>PROYECTO CP</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="function.js"></script>
	</head>
	<body>
		<div class="container">
			<br />
			
			<h3 align="center">Proyecto: Web Service</h3>
			<br />
			<div align="right" style="margin-bottom:5px;">
				<button type="button" name="add_button" id="add_button" class="btn btn-success btn-xs">Agregar</button>
			</div>

			<div class="table-responsive"> <!-- TABLA PRINCIPAL-->
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
                            <th>Matrícula</th>
                            <th>Nombre</th>
							<th>Apellido</th>
                            <th>Estado</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>
		</div>
	</body>
</html>

<div id="apicrudModal" class="modal fade" role="dialog"> <!-- VENTANA PARA AGREGAR/MODIFICAR ALUMNO -->
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" id="form">
				<div class="modal-header">
		        	<button type="button" class="close" data-dismiss="modal">&times;</button>
		        	<h4 class="modal-title">Agregar alumnno</h4>
		      	</div>
		      	<div class="modal-body">
		      		<div class="form-group">
			        	<label>Matricula</label>
			        	<input type="text" name="mat" id="mat" class="form-control" />
			        </div>
			        <div class="form-group">
			        	<label>Nombre</label>
			        	<input type="text" name="nombre" id="nombre" class="form-control" />
			        </div>
                    <div class="form-group">
			        	<label>Apellido</label>
			        	<input type="text" name="apellido" id="apellido" class="form-control" />
			        </div>
                    <div class="form-group">
			        	<label>Estado</label>
			        	<input type="text" name="estado" id="estado" class="form-control" />
			        </div>
			    </div>
			    <div class="modal-footer">
			    	<input type="submit" name="button_action" id="button_action" class="btn btn-info" value="Insert" />
			    	<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
	      		</div>
			</form>
		</div>
  	</div>
</div>

