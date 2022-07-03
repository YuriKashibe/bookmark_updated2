<?php
$pw = password_hash("test3", PASSWORD_DEFAULT);
echo $pw;
// var_dump(password_verify("test3", $pw));