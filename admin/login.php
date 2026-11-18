<?php
require '../config.php'; $err='';
if($_SERVER['REQUEST_METHOD']==='POST' && csrf_ok()){
  $st=db()->prepare("SELECT * FROM users WHERE username=?"); $st->execute([trim($_POST['username']??'')]); $u=$st->fetch();
  if($u && password_verify($_POST['password']??'',$u['password_hash'])){ session_regenerate_id(true); $_SESSION['uid']=$u['id']; $_SESSION['uname']=$u['name']; header('Location: index.php'); exit; }
  $err='Username atau password salah.';
}
?><!doctype html><html lang="id"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Login Admin</title>
<script src="https://cdn.tailwindcss.com"></script></head>
<body class="min-h-screen bg-[#0B0F17] flex items-center justify-center p-4">
<form method="post" class="w-full max-w-sm bg-[#FDFCFA] rounded-2xl p-8 shadow-2xl">
<h1 class="text-2xl font-bold text-[#0B0F17]">Login Admin</h1><p class="text-sm text-gray-500 mb-5">Ondo Teknik Machine</p>
<?php if($err): ?><p class="mb-3 text-sm text-red-600"><?=e($err)?></p><?php endif; ?>
<input type="hidden" name="csrf" value="<?=csrf()?>">
<input name="username" placeholder="Username" required class="w-full mb-3 border rounded-lg px-3 py-2">
<input name="password" type="password" placeholder="Password" required class="w-full mb-4 border rounded-lg px-3 py-2">
<button class="w-full bg-[#D97706] text-white font-semibold rounded-lg py-2.5">Masuk</button>
<a href="../index.php" class="block text-center text-sm text-gray-500 mt-4">← Kembali ke website</a></form></body></html>
