<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>Carga Persona</h1>

<?php $attributes = array( 'id' => 'personaForm'); ?>

<?php echo form_open('CpersonaController/guardar', $attributes); ?>

<?php echo validation_errors(); ?>
		<table align="center">
		<tr>

				<td><label>DNI</label></td>
				<td>
					<input type="text" name="dni" maxlength="8">
				</td>

			</tr>

			<tr>

				<td><label>Nombre</label></td>
				<td>
					<input type="text" name="nombre">
				</td>

			</tr>
				<tr>

				<td><label>Apellido paterno</td>
				<td>
					<input type="text" name="appaterno">
				</td>

			</tr>
				<tr>

				<td><label>Apellido Materno</label></td>
				<td>
					<input type="text" name="apmaterno">
				</td>

			</tr>
				<tr>

				<td><label>Email</label></td>
				<td>
					<input type="text" name="email">
				</td>

			</tr>
				<tr>

				<td><label>Fecha</label></td>
				<td>
					<input type="date" name="register_date">
					<?php  echo $this->calendar->generate();?>
				</td>
				</tr>


				<tr>

				<td><label>usuario</label></td>
				<td>
					<input type="text" name="nomusuario">
				</td>

			</tr>
			<tr>

				<td><label>clave</label></td>
				<td>
					<input type="password" name="clave">
				</td>

			</tr>


				<tr>
					<td colspan="2">
					<input type="submit" value="ingresar">
					</td>
				</tr>



		</table>
</form>
</body>
</html>