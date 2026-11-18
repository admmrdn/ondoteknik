<?php
// Konfigurasi database & helper
session_start();
const DB_HOST='localhost', DB_USER='root', DB_PASS='', DB_NAME='saujana_ondoteknik';
const WA_NUMBER='6281212666649';
function db(): PDO {
  static $p=null;
  if(!$p){ $p=new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8mb4',DB_USER,DB_PASS,
    [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]); }
  return $p;
}
function e($s){ return htmlspecialchars((string)$s,ENT_QUOTES,'UTF-8'); }
function rp($n){ return 'Rp '.number_format((float)$n,0,',','.'); }
function csrf(){ return $_SESSION['csrf'] ??= bin2hex(random_bytes(16)); }
function csrf_ok(){ return hash_equals($_SESSION['csrf']??'',$_POST['csrf']??''); }
