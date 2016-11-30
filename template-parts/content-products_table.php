<?php
/**
 * 
 * Template for displaying a nutritional table inside the product's page
 */

	// ACF Fields
	
	// Product Table
	$header = get_field("table-header");
	$footer = get_field("table-footer");
	
	// Valor Energétio
	$energetic_qtd = get_field("energetico-qtd");
	$energetic_vd = get_field("energetico-vd");
	
	// Carboidratos
	$carbs_qtd = get_field("carbs-qtd");
	$carbs_vd = get_field("carbs-vd");
	
	// Proteínas
	$protein_qtd = get_field("protein-qtd");
	$protein_vd = get_field("protein-vd");
	
	// Gorduras totais
	$fat_total_qtd = get_field("fat-total-qtd");
	$fat_total_vd = get_field("fat-total-vd");
	
	// Gorduras saturadas
	$fat_sat_qtd = get_field("fat-sat-qtd");
	$fat_sat_vd = get_field("fat-sat-vd");
	
	// Gorduras trans
	$fat_trans_qtd = get_field("fat-trans-qtd");
	$fat_trans_vd = get_field("fat-trans-vd");
	
	// Fibras
	$fiber_qtd = get_field("fiber-qtd");
	$fiber_vd = get_field("fiber-vd");
	
	// Sódio
	$sodium_qtd = get_field("sodium-qtd");
	$sodium_vd = get_field("sodium-vd");

?>

<table class="table table-bordered table-custom" >
	<tr>
		<th colspan="6">
			<p>INFORMAÇÃO NUTRICIONAL</p>
		</th>
	</tr>
	<tr>
		<th colspan="6">
			<p><?php echo $header; ?></p>
		</th>
	</tr>
	<tr>
		<td colspan="2">&nbsp;</td>
		<td colspan="2">Qtd.</td>
		<td colspan="2">%VD (*)</td>
	</tr>
	<tr>
		<td colspan="2">Valor energético</td>
		<td colspan="2"><?php echo $energetic_qtd; ?></td>
		<td colspan="2"><?php echo $energetic_vd; ?></td>
	</tr>
	<tr>
		<td colspan="2">Carboidratos</td>
		<td colspan="2"><?php echo $carbs_qtd; ?></td>
		<td colspan="2"><?php echo $carbs_vd; ?></td>
	</tr>
	<tr>
		<td colspan="2">Proteínas</td>
		<td colspan="2"><?php echo $protein_qtd; ?></td>
		<td colspan="2"><?php echo $protein_vd; ?></td>
	</tr>
	<tr>
		<td colspan="2">Gorduras totais</td>
		<td colspan="2"><?php echo $fat_total_qtd; ?></td>
		<td colspan="2"><?php echo $fat_total_vd; ?></td>
	</tr>
	<tr>
		<td colspan="2">Gorduras saturadas</td>
		<td colspan="2"><?php echo $fat_sat_qtd; ?></td>
		<td colspan="2"><?php echo $fat_sat_vd; ?></td>
	</tr>
	<tr>
		<td colspan="2">Gorduras trans</td>
		<td colspan="2"><?php echo $fat_trans_qtd; ?></td>
		<td colspan="2"><?php echo $fat_trans_vd; ?></td>
	</tr>
	<tr>
		<td colspan="2">Fibra alimentar</td>
		<td colspan="2"><?php echo $fiber_qtd; ?></td>
		<td colspan="2"><?php echo $fiber_vd; ?></td>
	</tr>
	<tr>
		<td colspan="2">Sódio</td>
		<td colspan="2"><?php echo $sodium_qtd; ?></td>
		<td colspan="2"><?php echo $sodium_vd; ?></td>
	</tr>
	<tr class="table-footer">
		<td colspan="6">
			<p><?php echo $footer; ?></p>
		</td>
	</tr>
</table>