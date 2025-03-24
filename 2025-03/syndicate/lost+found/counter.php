<?php

$document_root = $_SERVER['DOCUMENT_ROOT'];

// Load counter from file
if (file_exists($document_root . '/counter.txt')) {
  $counter = file_get_contents($document_root . '/counter.txt');
} else {
  $counter = 0;
}
$counter += 1;

// Increase counter for unique calls
if (!isset($_COOKIE['counter'])) {
  file_put_contents($document_root . '/counter.txt', $counter);
  setcookie('counter', '1', (time() + 86400));
}

// Output counter
echo file_get_contents($document_root . '/counter.txt');