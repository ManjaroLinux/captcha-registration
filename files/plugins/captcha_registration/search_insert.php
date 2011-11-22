<?php

/* ***** mod Captcha Registration ***** */

$files_to_insert = array('register.php');


//-- For file register.php
$search_file['register'] = array(
	'define(\'PUN_ROOT\',',
	'// Load the register.php language file',
	'// Validate email',
	'<p class="buttons"><input type="submit" name="register"'
);


$insert_file['register'] =  array(
	"// [modif] - Mod captcha_registration -->\nsession_start();\n// [modif] - End Mod captcha_registration -->\n",
	"// [modif] - Mod captcha_registration --> - Add language file\nif(file_exists(PUN_ROOT.'lang/'.\$pun_user['language'].'/mod_captcha_registration.php'))\n  require PUN_ROOT.'lang/'.\$pun_user['language'].'/mod_captcha_registration.php';\nelse\n  require PUN_ROOT.'lang/English/mod_captcha_registration.php';\n// [modif] - End Mod captcha_registration -->\n",
	"//[modif] - Mod captcha_registration --> - Validate confirmation code\n	include_once 'plugins/captcha_registration/securimage/securimage.php';\n\n	\$securimage = new Securimage();\n\n	if (\$securimage->check(\$_POST['captcha_securimage_code']) == false) {\n		\$errors[] = \$lang_mod_captcha_registration['Captcha fail'];\n	}\n// [modif] - End Mod captcha_registration\n",
	"<!-- [modif] - Mod captcha_registration -->\n<div class=\"inform\">\n	<fieldset>\n		<legend><?php	echo \$lang_mod_captcha_registration['Captcha title']	?></legend>\n		<div class=\"infldset\">\n			<p><?php echo	sprintf(\$lang_mod_captcha_registration['Captcha info'], \"<a href=\\\"#\\\" onclick=\\\"document.getElementById('captcha_securimage_image').src = 'plugins/captcha_registration/securimage/securimage_show.php?' + Math.random(); return false\\\">\", \"</a>\");?></p>\n			<label class=\"required\">\n				<table border=\"0\">\n					<tr>\n						<td><img id=\"captcha_securimage_image\" src=\"plugins/captcha_registration/securimage/securimage_show.php\" alt=\"CAPTCHA Image\" /></td>\n					</tr>\n					<tr>\n						<td>\n							<strong><?php echo	\$lang_mod_captcha_registration['Captcha question']	?>&nbsp;<span><?php echo \$lang_common['Required'] ?></span></strong><br/>\n							<input type=\"text\" name=\"captcha_securimage_code\" maxlength=\"6\" />\n						</td>\n					</tr>\n				</table>\n			</label>\n		</div>\n	</fieldset>\n</div>\n<!-- [modif] - End Mod captcha_registration -->\n"
);

?>
