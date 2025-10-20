<?php
/**
 * WebEngine CMS
 * https://webenginecms.org/
 * 
 * @version 1.2.0
 * @author Lautaro Angelico <http://lautaroangelico.com/>
 * @copyright (c) 2013-2019 Lautaro Angelico, All Rights Reserved
 * 
 * Licensed under the MIT license
 * http://opensource.org/licenses/MIT
 */

if(isLoggedIn()) redirect();

echo '<div class="page-title"><span>'.lang('module_titles_txt_15',true).'</span></div>';

try {
	
	if(!mconfig('active')) throw new Exception(lang('error_47',true));
	
	if(check_value($_GET['ui']) && check_value($_GET['ue']) && check_value($_GET['key'])) {
		
		# recovery process
		try {
			$Account = new Account();
			$Account->passwordRecoveryVerificationProcess($_GET['ui'], $_GET['ue'], $_GET['key']);
		} catch (Exception $ex) {
			message('error', $ex->getMessage());
		}
		
	} else {
		
		# form submit
		if(check_value($_POST['webengineEmail_submit'])) {
			try {
				$Account = new Account();
				$Account->passwordRecoveryProcess($_POST['webengineEmail_current'], $_SERVER['REMOTE_ADDR']);
			} catch (Exception $ex) {
				message('error', $ex->getMessage());
			}
		}
		
		
	echo '<div class="forgotpassword-container">';
	echo '<div class="forgotpassword-form col-12 col-sm-8 col-md-6 mx-auto">'; 
		echo '<form class="needs-validation p-4 shadow text-light" action="" method="post" novalidate>';

			// Email
			echo '<div class="mb-3">';
			echo '	<label for="webengineEmail" class="form-label">'.lang('forgotpass_txt_1',true).'</label>';
			echo '	<div class="input-group">';
			echo '		<span class="input-group-text"><i class="fa fa-envelope"></i></span>';
			echo '		<input type="email" class="form-control" id="webengineEmail" name="webengineEmail_current" placeholder="Ingrese su correo electrónico" required>';
			echo '		<div class="invalid-feedback">Por favor ingrese un correo válido.</div>';
			echo '	</div>';
			echo '</div>';

			// Botón
			echo '<div class="d-grid">';
			echo '	<button type="submit" name="webengineEmail_submit" value="submit" class="btn btn-primary">'.lang('forgotpass_txt_2',true).'</button>';
			echo '</div>';

		echo '</form>';
	echo '</div>';
	echo '</div>';

	}
	
} catch(Exception $ex) {
	message('error', $ex->getMessage());
}