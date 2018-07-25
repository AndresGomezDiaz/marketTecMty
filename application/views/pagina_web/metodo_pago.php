<section id="content">
<div class="content-wrap">
	<div class="container clearfix">
		<!-- Aqui inicia contenido -->
		<form id="billing-form" name="billing-form" class="nobottommargin" action="#" method="post">
		<div class="row clearfix">
			<h3 class="">¿A que causa quieres donar?</h3>
			<div class="col-md-6">
				<div class="col_full">
					<label for="shipping-form-name">Causa:</label>
					<select class="selectpicker sm-form-control">
						<option>Lideres del mañana</option>
						<option>Red de filantropía</option>
						<option>Becas de talento académico</option>
					</select>
				</div>
			</div>
			<div class="col-md-6">
				<div class="col_full">
					<label for="shipping-form-lname">Campus al que dirige su donativo:</label>
					<select class="selectpicker sm-form-control">
						<option>Chihuahua</option>
						<option>Laguna</option>
						<option>Monterrey</option>
					</select>
				</div>
			</div>
		</div>
		<div class="row clearfix">
			<div class="col-md-6">
				<h3>Selecciona el método depago</h3>
					<div class="col_full">
						<label for="billing-form-name">Tipo de tarjeta:</label>
						<select class="selectpicker sm-form-control">
							<option>Visa</option>
							<option>Master Card</option>
							<option>American Express</option>
						</select>
					</div>

					<div class="col_half">
						<label for="billing-form-name">Nombre del tarjetabiente:</label>
						<input type="text" id="billing-form-lname" name="billing-form-lname" value="" class="sm-form-control" />
					</div>

					<div class="col_half col_last">
						<label for="billing-form-lname">Teléfono:</label>
						<input type="text" id="billing-form-lname" name="billing-form-lname" value="" class="sm-form-control" />
					</div>

					<div class="clear"></div>

					<div class="col_half">
						<label for="billing-form-name">Calle y número:</label>
						<input type="text" id="billing-form-lname" name="billing-form-lname" value="" class="sm-form-control" />
					</div>

					<div class="col_half col_last">
						<label for="billing-form-lname">Código postal:</label>
						<input type="text" id="billing-form-lname" name="billing-form-lname" value="" class="sm-form-control" />
					</div>

					<div class="clear"></div>

					<div class="col_half">
						<label for="billing-form-name">Numero de tarjeta:</label>
						<input type="text" id="billing-form-lname" name="billing-form-lname" value="" class="sm-form-control" />
					</div>

					<div class="col_half col_last">
						<div class="col_one_third">
							<label for="billing-form-name">Mes:</label>
							<select class="selectpicker sm-form-control">
								<option>Visa</option>
								<option>Master Card</option>
								<option>American Express</option>
							</select>
						</div>
						<div class="col_one_third">
							<label for="billing-form-name">Año:</label>
							<select class="selectpicker sm-form-control">
								<option>Visa</option>
								<option>Master Card</option>
								<option>American Express</option>
							</select>
						</div>
						<div class="col_one_third col_last">
							<label for="billing-form-lname">CVV:</label>
							<input type="text" id="billing-form-lname" name="billing-form-lname" value="" class="sm-form-control" />
						</div>

					</div>

					<div class="clear"></div>
			</div>
			<div class="col-md-6">
				<h3 class="">Datos de contacto</h3>
					<div class="col_half">
						<label for="shipping-form-name">Nombre(s):</label>
						<input type="text" id="shipping-form-name" name="shipping-form-name" value="" class="sm-form-control" />
					</div>

					<div class="col_half col_last">
						<label for="shipping-form-lname">Apellidos:</label>
						<input type="text" id="shipping-form-lname" name="shipping-form-lname" value="" class="sm-form-control" />
					</div>

					<div class="clear"></div>

					<div class="col_half">
						<label for="shipping-form-name">Email:</label>
						<input type="text" id="shipping-form-name" name="shipping-form-name" value="" class="sm-form-control" />
					</div>

					<div class="col_half col_last">
						<label for="shipping-form-lname">Confirmar email:</label>
						<input type="text" id="shipping-form-lname" name="shipping-form-lname" value="" class="sm-form-control" />
					</div>

					<div class="clear"></div>

					<div class="col_half">
						<label for="shipping-form-name">Requiere factura:</label>
						<div class="switch">
							<input id="switch-toggle-2" class="switch-toggle switch-toggle-round" type="checkbox">
							<label for="switch-toggle-2"></label>
						</div>
					</div>

					<div class="col_half col_last">
						<label for="shipping-form-lname">Seleccione el campus:</label>
						<select class="selectpicker sm-form-control">
							<option>Visa</option>
							<option>Master Card</option>
							<option>American Express</option>
						</select>
					</div>
					<div class="clear"></div>

					<div class="col_half">
						<label for="shipping-form-name">Total a pagar:</label>
						<input type="text" id="shipping-form-lname" name="shipping-form-lname" value="50.00"  readonly="readonly" class="sm-form-control" />
					</div>

					<div class="col_half col_last">
						<br />
						<a href="<?=base_url()?>" class="button button-3d fright">Pagar</a>
					</div>

			</div>
		</div>
		</form>
	</div>
</div>
</section>
