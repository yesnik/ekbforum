<?php

if ( !extension_loaded('pdo') ) {
  echo "Error! PDO driver for MySQL not found.";
} else {
  echo "OK! PDO driver for MySQL exists.";
}