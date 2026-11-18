<?php
require 'config.php'; header('Content-Type: application/json');
$d=json_decode(file_get_contents('php://input'),true)?:[];
$n=trim($d['name']??''); $wa=preg_replace('/\D/','',$d['whatsapp']??''); $city=trim($d['city']??'');
if($n===''||strlen($wa)<9||$city===''||empty($d['consent'])){ http_response_code(422); echo json_encode(['ok'=>false,'error'=>'Data wajib belum lengkap.']); exit; }
$co=trim($d['company']??''); $pr=trim($d['product']??''); $nt=trim($d['notes']??'');
db()->prepare("INSERT INTO leads(name,whatsapp,company,city,product,notes) VALUES(?,?,?,?,?,?)")->execute([$n,$wa,$co,$city,$pr,$nt]);
$id=db()->lastInsertId();
$code='#LEAD-'.str_pad($id,3,'0',STR_PAD_LEFT);
$msg="Halo CV Ondo Teknik Machine, saya ingin konsultasi/pemesanan.\n\nID: $code\nNama: $n\nWhatsApp: $wa\nPerusahaan: ".($co?:'-')."\nKota: $city\nProduk: ".($pr?:'-')."\nCatatan: ".($nt?:'-');
echo json_encode(['ok'=>true,'code'=>$code,'message'=>$msg,'url'=>'https://wa.me/'.WA_NUMBER.'?text='.rawurlencode($msg)]);
