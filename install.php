<?php
// Jalankan sekali: http://localhost/nusantara-power/install.php  (HAPUS setelah selesai)
$pdo=new PDO('mysql:host=localhost;charset=utf8mb4','root','',[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
$pdo->exec("CREATE DATABASE IF NOT EXISTS saujana_ondoteknik CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
$pdo->exec("USE saujana_ondoteknik");
$pdo->exec("CREATE TABLE IF NOT EXISTS users(id INT AUTO_INCREMENT PRIMARY KEY,username VARCHAR(50) UNIQUE,password_hash VARCHAR(255),name VARCHAR(100))");
$pdo->exec("CREATE TABLE IF NOT EXISTS products(id INT AUTO_INCREMENT PRIMARY KEY,name VARCHAR(150),description TEXT,image VARCHAR(150),sort_order INT DEFAULT 0)");
$pdo->exec("CREATE TABLE IF NOT EXISTS leads(id INT AUTO_INCREMENT PRIMARY KEY,name VARCHAR(100),whatsapp VARCHAR(25),company VARCHAR(120),city VARCHAR(100),product VARCHAR(150),notes TEXT,status ENUM('baru','dihubungi','closing','batal') DEFAULT 'baru',created_at DATETIME DEFAULT CURRENT_TIMESTAMP)");
if(!$pdo->query("SELECT COUNT(*) FROM users")->fetchColumn())
  $pdo->prepare("INSERT INTO users(username,password_hash,name) VALUES('admin',?,'Administrator')")->execute([password_hash('admin123',PASSWORD_DEFAULT)]);
if(!$pdo->query("SELECT COUNT(*) FROM products")->fetchColumn()){
 $s=$pdo->prepare("INSERT INTO products(name,description,image,sort_order) VALUES(?,?,?,?)");
 foreach([
 ['Fire Pump','Pompa portable untuk pemadaman kebakaran, penggerak Big Gun Rain, dan mendorong air jarak jauh.','firepump-problade.webp'],
 ['Springkler Big Gun Rain','Penyiraman pertanian, pembibitan, pertambangan, dan perkebunan. Jangkauan 30–80 meter, putaran 360°.','springkler.webp'],
 ['Sprayer Portable','Alat penyemprot hama dan pestisida yang juga dapat digunakan sebagai alat stem.','sprayer.webp'],
 ['Mesin Giling Padi & Penepung','Mengolah gabah menjadi beras dan dapat digunakan untuk penepungan biji-bijian.','giling-padi.webp'],
 ['Mesin Coper / Kompos','Menghancurkan kayu, daun, dan ranting untuk bahan kompos maupun pakan ternak.','mesin-coper.webp'],
 ['Mesin Damkar 25 HP','Pompa air portabel bermesin dua silinder untuk pemadaman dan pasokan air bertekanan tinggi.','mesin-damkar-25hp.webp'],
 ['Mesin Damkar 8 HP','Pompa air portabel untuk menyedot sumber air dan menyalurkannya melalui selang.','mesin-damkar-8hp.webp'],
 ['Pompa Irigasi','Mengalirkan air dari sungai, sumur, saluran, atau kolam ke sawah, ladang, dan kebun.','workshop-2.webp'],
 ['Engine & Industrial Mini','Engine penggerak serbaguna dan unit pompa/mesin ringkas untuk industri serta pertanian.','workshop-3.webp'],
 ] as $i=>$r){ $r[]=$i; $s->execute($r); }
}
echo "Instalasi selesai. Login admin: admin / admin123 (segera ganti). Hapus install.php.";
