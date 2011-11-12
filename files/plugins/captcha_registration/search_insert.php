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
	"// [modif] - Mod captcha_registration --> - Validate confirmation code\n	if(empty(\$_SESSION['6_letters_code'] ) ||\n	  strcasecmp(\$_SESSION['6_letters_code'], \$_POST['6_letters_code']) != 0)\n	{\n	//Note: the captcha code is compared case insensitively.\n	//if you want case sensitive match, update the check above to\n	// strcmp()\n		\$errors[] = \$lang_mod_captcha_registration['Captcha fail'];\n	}\n// [modif] - End Mod captcha_registration\n",
	"<!-- [modif] - Mod captcha_registration -->\n<div class=\"inform\">\n	<fieldset>\n		<legend><?php	echo \$lang_mod_captcha_registration['Captcha title']	?></legend>\n		<div class=\"infldset\">\n			<p><?php echo	sprintf(\$lang_mod_captcha_registration['Captcha info'], \"<a href='javascript: refreshCaptcha();'>\", \"</a>\");?></p>\n			<label class=\"required\">\n				<table border=\"0\">\n					<tr>\n						<td><img src=\"plugins/captcha_registration/captcha/captcha_code_file.php?rand=<?php echo rand(); ?>\" id='captchaimg' ></td>\n					</tr>\n					<tr>\n						<td>\n							<strong><?php echo	\$lang_mod_captcha_registration['Captcha question']	?>&nbsp;<span><?php echo \$lang_common['Required'] ?></span></strong><br/>\n							<input id=\"6_letters_code\" name=\"6_letters_code\" type=\"text\">\n						</td>\n					</tr>\n				</table>\n			</label>\n\n			<script language='JavaScript' type='text/javascript'>\n				function refreshCaptcha()\n				{\n					var img = document.images['captchaimg'];\n					img.src = img.src.substring(0,img.src.lastIndexOf(\"?\"))+\"?rand=\"+Math.random()*1000;\n				}\n			</script>\n		</div>\n	</fieldset>\n</div>\n<!-- [modif] - End Mod captcha_registration -->"
);

?>
