<?php
require '../config.php';
if(empty($_SESSION['uid'])){ header('Location: login.php'); exit; }
$pdo=db(); $tab=$_GET['tab']??'leads';
if($_SERVER['REQUEST_METHOD']==='POST' && csrf_ok()){
  $a=$_POST['action']??'';
  if($a==='lead_status') $pdo->prepare("UPDATE leads SET status=? WHERE id=?")->execute([$_POST['status'],(int)$_POST['id']]);
  if($a==='lead_del') $pdo->prepare("DELETE FROM leads WHERE id=?")->execute([(int)$_POST['id']]);
  if($a==='prod_del') $pdo->prepare("DELETE FROM products WHERE id=?")->execute([(int)$_POST['id']]);
  if($a==='prod_add'){ $img=''; if(!empty($_FILES['image']['name']) && preg_match('/\.(webp|jpe?g|png)$/i',$_FILES['image']['name'])){ $img=time().'-'.preg_replace('/[^a-z0-9._-]/i','',basename($_FILES['image']['name'])); move_uploaded_file($_FILES['image']['tmp_name'],__DIR__.'/../assets/'.$img); }
    $pdo->prepare("INSERT INTO products(name,description,image,sort_order) VALUES(?,?,?,?)")->execute([$_POST['name'],$_POST['description'],$img,(int)$_POST['sort_order']]); }
  header('Location: index.php?tab='.($a[0]==='p'?'products':'leads')); exit;
}
$cnt=$pdo->query("SELECT status,COUNT(*) c FROM leads GROUP BY status")->fetchAll(PDO::FETCH_KEY_PAIR);
$leads=$pdo->query("SELECT * FROM leads ORDER BY id DESC")->fetchAll();
$prods=$pdo->query("SELECT * FROM products ORDER BY sort_order,id")->fetchAll();
$tabCls=fn($t)=>$tab===$t?'bg-[#D97706] text-white':'bg-white text-gray-700';
?><!doctype html><html lang="id"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Dashboard Admin</title>
<script src="https://cdn.tailwindcss.com"></script></head>
<body class="bg-[#F7F4EE] text-[#111827]">
<header class="bg-[#0B0F17] text-white px-4 py-3 flex items-center justify-between">
<b>Ondo Teknik · Admin</b><span class="text-sm">Halo, <?=e($_SESSION['uname'])?> · <a class="text-amber-400" href="../index.php" target="_blank">Lihat Website</a> · <a class="text-amber-400" href="logout.php">Keluar</a></span></header>
<main class="max-w-6xl mx-auto p-4">
<div class="grid grid-cols-2 md:grid-cols-4 gap-3 mb-5">
<?php foreach(['baru'=>'Lead Baru','dihubungi'=>'Dihubungi','closing'=>'Closing','batal'=>'Batal'] as $k=>$l): ?>
<div class="bg-white rounded-xl p-4 shadow-sm"><p class="text-xs text-gray-500"><?=$l?></p><p class="text-2xl font-bold"><?=$cnt[$k]??0?></p></div><?php endforeach; ?></div>
<div class="flex gap-2 mb-4"><a href="?tab=leads" class="px-4 py-2 rounded-lg text-sm font-semibold <?=$tabCls('leads')?>">Data Lead (<?=count($leads)?>)</a><a href="?tab=products" class="px-4 py-2 rounded-lg text-sm font-semibold <?=$tabCls('products')?>">Produk (<?=count($prods)?>)</a></div>
<?php if($tab==='leads'): ?>
<div class="bg-white rounded-xl shadow-sm overflow-x-auto"><table class="w-full text-sm"><thead class="bg-gray-50 text-left"><tr><th class="p-3">ID</th><th>Waktu</th><th>Kontak</th><th>Produk</th><th>Catatan</th><th>Status</th><th></th></tr></thead><tbody>
<?php foreach($leads as $l): ?><tr class="border-t align-top"><td class="p-3 font-semibold">#LEAD-<?=str_pad($l['id'],3,'0',STR_PAD_LEFT)?></td><td><?=e($l['created_at'])?></td>
<td><b><?=e($l['name'])?></b><br><a class="text-green-700" target="_blank" href="https://wa.me/<?=e($l['whatsapp'])?>"><?=e($l['whatsapp'])?></a><br><span class="text-gray-500"><?=e($l['company'])?> · <?=e($l['city'])?></span></td>
<td><?=e($l['product'])?></td><td class="max-w-xs"><?=e($l['notes'])?></td>
<td><form method="post"><input type="hidden" name="csrf" value="<?=csrf()?>"><input type="hidden" name="action" value="lead_status"><input type="hidden" name="id" value="<?=$l['id']?>">
<select name="status" onchange="this.form.submit()" class="border rounded px-2 py-1"><?php foreach(['baru','dihubungi','closing','batal'] as $s): ?><option <?=$l['status']===$s?'selected':''?>><?=$s?></option><?php endforeach; ?></select></form></td>
<td><form method="post" onsubmit="return confirm('Hapus lead ini?')"><input type="hidden" name="csrf" value="<?=csrf()?>"><input type="hidden" name="action" value="lead_del"><input type="hidden" name="id" value="<?=$l['id']?>"><button class="text-red-600 px-2">Hapus</button></form></td></tr>
<?php endforeach; if(!$leads): ?><tr><td colspan="7" class="p-6 text-center text-gray-500">Belum ada lead.</td></tr><?php endif; ?></tbody></table></div>
<?php else: ?>
<form method="post" enctype="multipart/form-data" class="bg-white rounded-xl p-4 shadow-sm grid md:grid-cols-4 gap-2 mb-4 text-sm">
<input type="hidden" name="csrf" value="<?=csrf()?>"><input type="hidden" name="action" value="prod_add">
<input name="name" placeholder="Nama produk" required class="border rounded px-2 py-2 md:col-span-2"><input name="sort_order" type="number" placeholder="Urutan" class="border rounded px-2 py-2">
<input name="image" type="file" accept=".webp,.jpg,.jpeg,.png" class="border rounded px-2 py-2"><input name="description" placeholder="Deskripsi singkat" class="border rounded px-2 py-2 md:col-span-3">
<button class="bg-[#D97706] text-white rounded px-3 py-2 font-semibold">Tambah Produk</button></form>
<div class="bg-white rounded-xl shadow-sm overflow-x-auto"><table class="w-full text-sm"><thead class="bg-gray-50 text-left"><tr><th class="p-3">Foto</th><th>Produk</th><th>Deskripsi</th><th></th></tr></thead><tbody>
<?php foreach($prods as $p): ?><tr class="border-t"><td class="p-3"><img src="../assets/<?=e($p['image'])?>" class="w-16 h-12 object-cover rounded bg-gray-100"></td><td><b><?=e($p['name'])?></b><br><span class="text-gray-400 text-xs"><?=e($p['image'])?></span></td><td class="max-w-sm"><?=e($p['description'])?></td>
<td><form method="post" onsubmit="return confirm('Hapus produk?')"><input type="hidden" name="csrf" value="<?=csrf()?>"><input type="hidden" name="action" value="prod_del"><input type="hidden" name="id" value="<?=$p['id']?>"><button class="text-red-600 px-2">Hapus</button></form></td></tr><?php endforeach; ?></tbody></table></div>
<?php endif; ?></main></body></html>
