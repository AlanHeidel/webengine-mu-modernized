<?php
/**
 * WebEngine
 * http://muengine.net/
 * 
 * @version 1.0.9
 * @author Lautaro Angelico <http://lautaroangelico.com/>
 * @copyright (c) 2013-2017 Lautaro Angelico, All Rights Reserved
 * 
 * Licensed under the MIT license
 * http://opensource.org/licenses/MIT
 */

if(isLoggedIn()) redirect();

echo '<div class="page-title"><span>'.lang('module_titles_txt_2',true).'</span></div>';

try {
	
	if(!mconfig('active')) throw new Exception(lang('error_47',true));
	
	// Login Process
	if(check_value($_POST['webengineLogin_submit'])) {
		try {
			$userLogin = new login();
			$userLogin->validateLogin($_POST['webengineLogin_user'],$_POST['webengineLogin_pwd']);
		} catch (Exception $ex) {
			message('error', $ex->getMessage());
		}
	}
	
	echo '<div class="login-container">';
	echo '<div class="login-form col-12 col-sm-8 col-md-6 mx-auto">'; // centrado y tamaño más cómodo
		echo '<form class="needs-validation p-4 shadow text-light" action="" method="post" novalidate>';

			// Usuario
			echo '<div class="mb-3">';
			echo '	<label for="webengineLogin1" class="form-label">Usuario</label>';
			echo '	<div class="input-group">';
			echo '		<span class="input-group-text"><i class="fa fa-user"></i></span>';
			echo '		<input type="text" class="form-control" id="webengineLogin1" name="webengineLogin_user" placeholder="Ingrese su usuario" required>';
			echo '		<div class="invalid-feedback">Por favor ingrese su Usuario.</div>';
			echo '	</div>';
			echo '</div>';

			// Password
			echo '<div class="mb-3">';
			echo '	<label for="webengineLogin2" class="form-label">Contraseña</label>';
			echo '	<div class="input-group">';
			echo '		<span class="input-group-text"><i class="fa fa-lock"></i></span>';
			echo '		<input type="password" class="form-control" id="webengineLogin2" name="webengineLogin_pwd" placeholder="Ingrese su contraseña" required>';
			echo '		<div class="invalid-feedback">Por favor ingrese su Contraseña.</div>';
			echo '	</div>';
			echo '</div>';

			// Olvidaste tu contraseña
			echo '<div class="text-end mb-3">';
			echo '	<a href="'.__BASE_URL__.'forgotpassword/" class="link-light small">'.lang('login_txt_4',true).'</a>';
			echo '</div>';

			// Botón de Login
			echo '<div class="d-grid">';
			echo '	<button type="submit" name="webengineLogin_submit" value="submit" class="btn btn-primary">'.lang('login_txt_3',true).'</button>';
			echo '</div>';

		echo '</form>';
	echo '</div>';
	echo '</div>';


} catch(Exception $ex) {
	message('error', $ex->getMessage());
}