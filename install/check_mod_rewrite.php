<?php
if (array_key_exists('HTTP_MOD_REWRITE', $_SERVER)) {
  echo 'OK! mod_rewrite module enabled.';
} else {
  echo <<<EOL
ERROR! mod_rewrite module disabled. Enable it.

<i>On Ubuntu</i>:
Activate the mod_rewrite module with
  <b>sudo a2enmod rewrite</b>

and restart the apache
  <b>sudo service apache2 restart</b>
EOL;
}
