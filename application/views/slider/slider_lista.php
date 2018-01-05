<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$registros = $datos->num_rows();
$contador = 1;
?>
<div class="row-fluid">
	<div class="span12">
		<?php if($this->session->flashdata('correcto')){ ?>
		<div class="alert alert-success alert-block">
			<button class="close" data-dismiss="success">×</button>
			<strong><?=$this->session->flashdata('correcto')?></strong>
		</div>
		<?php } ?>
		<?php if($this->session->flashdata('error')){ ?>
		<div class="alert alert-error alert-block">
			<button class="close" data-dismiss="alert">×</button>
			<strong><?=$this->session->flashdata('error')?></strong>
		</div>
		<?php } ?>
		<div class="widget-box">
			<div class="widget-content nopadding">
				<table class="table table-bordered data-table">
					<thead>
						<?php if($datos->num_rows < 5){ ?>
						<tr>
							<td colspan="7" style="text-align: right;">
								<a href="registrar_slide" class="btn btn-success"> + Registrar slide</a>&nbsp;&nbsp;&nbsp;
							</td>
						</tr>
						<?php } ?>
						<tr>
							<th>Slider - <?=$registros?></th>
							<th>Orden</th>
							<th>Detalle</th>
							<th>Eliminar</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($datos->result() as $info): ?>
						<tr class="gradeX">
							<td><?=$info->nombre?></td>
							<td style="text-align: center">
								<?=$info->orden?>&nbsp;&nbsp;&nbsp;
								<?php if($registros > 1){ ?>
									<?php if($info->orden == 1 && $registros > 1){ ?>
									<a href="<?=base_url().'baja_slide/'.$info->id_slider_home?>"><i class="icon icon-arrow-down"></i></a>
									<?php }else if($info->orden == 5){ ?>
									<a href="<?=base_url().'sube_slide/'.$info->id_slider_home?>"><i class="icon icon-arrow-up"></i></a>
									<?php }else{ ?>
										<?php if($contador == $registros){ ?>
											<a href="<?=base_url().'sube_slide/'.$info->id_slider_home?>"><i class="icon icon-arrow-up"></i></a>
										<?php }else{ ?>
											<a href="<?=base_url().'sube_slide/'.$info->id_slider_home?>"><i class="icon icon-arrow-up"></i></a>&nbsp;&nbsp;&nbsp;
											<a href="<?=base_url().'baja_slide/'.$info->id_slider_home?>"><i class="icon icon-arrow-down"></i></a>
										<?php } ?>
									<?php } ?>
								<?php } ?>
							</td>
							<td style="text-align: center;"><a title="Editar" href="<?=base_url().'editar_slider/'.$info->id_slider_home?>"><i class="icon-edit icon-2x"></i></a></td>
							<td style="text-align: center;"><a title="Eliminar" href="<?=base_url().'elimina_slider/'.$info->id_slider_home?>"><i class="icon-trash icon-2x"></i></a></td>
						</tr>
						<?php $contador++; endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
