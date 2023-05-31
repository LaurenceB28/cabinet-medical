<?php

define('DSN','mysql:dbname=hospitalE2N;host=127.0.0.1');
define('USER',  'cabinet-medical');
define('PASSWORD',  '8LBjXEG-klmOSRpn');

define('REGEX_DATE','^([0-9]{4})[\/\-]?([0-9]{2})[\/\-]?([0-9]{2})$'); //-REGX BIRTHDATE-//
define('PATTERN_NAME', '^[A-Za-z]{3,30}$'); //-REGX NAME-//
define('REGEX_NO_NUMBER',"^[A-Za-z-éèêëàâäôöûüç' ]+$"); //-REGX NUMBER-//
define('PATTERN_EMAIL', '#[A-Za-z0-9-_\.]+@[a-zA-z0-9]+.[a-zA-Z]{2,3}#'); //-REGX EMAIL-//
