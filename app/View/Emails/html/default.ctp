<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts.Email.html
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
<head>
	<title><?php echo $this->fetch('title'); ?></title>
</head>
<body>
	<?php echo $this->fetch('content'); ?>
	<p>Soma Total: <?php echo $somaTotal?></p>
	<table border="1">
		<tr>
			<th>Vendedor</th>
			<th>Valor da Venda</th>
		</tr>
		<?php foreach($findDaVenda as $venda): ?>
			<tr> 
				<td><?php echo $venda['Comerciante']['nome'];?></td>
				<td><?php echo $venda['Venda']['valor_da_venda'];?></td>
			</tr>    
		<?php endforeach;?>
	</table>
</body>
</html>