PRD: Website Perusahaan untuk Penjualan & Akuisisi Pelanggan
Versi: 1.0 (Draft) · Tanggal: 18 November 2026 · Status: Menunggu konten dari folder aset
1. Ringkasan Produk
Website perusahaan yang berfungsi sebagai etalase digital sekaligus mesin penjualan. Tampilan elegan dan premium, alur pembelian singkat, dan nyaman dipakai di ponsel. Seluruh konten (logo, foto produk, teks, harga, testimoni) diambil dari folder aset yang disiapkan pemilik, lalu langsung dipublikasikan ke tautan (link) yang bisa dibagikan.
2. Tujuan & Indikator Keberhasilan
Tujuan	Indikator (KPI)	Target Awal
Meningkatkan penjualan	Conversion rate (pengunjung → pembeli/lead)	2–4%
Menarik pelanggan baru	Pengunjung unik per bulan	Sesuai kampanye
Mempermudah pembelian	Waktu dari buka halaman → checkout/chat pesan	< 2 menit
Kepercayaan merek	Bounce rate	< 50%
Performa	Skor Lighthouse mobile	≥ 90
3. Target Pengguna
•	Calon pelanggan baru: datang dari Instagram, Google, atau rekomendasi. Ingin cepat paham produk dan harga.
•	Pelanggan lama: ingin memesan ulang dengan cepat.
•	Pelanggan B2B (opsional): butuh penawaran dan katalog.
•	Admin/pemilik: ingin mengubah konten dan melihat pesanan dengan mudah.
Konteks utama: pengguna di Indonesia, mayoritas lewat ponsel, terbiasa dengan WhatsApp, transfer bank, QRIS, dan e-wallet.
4. Ruang Lingkup
Termasuk (MVP)
1.	Beranda: hero dengan nilai jual utama, tombol ajakan (CTA) "Beli Sekarang", produk unggulan, keunggulan perusahaan, testimoni, dan CTA penutup.
2.	Katalog produk: grid foto, filter kategori, pencarian, dan urutan harga/terlaris.
3.	Detail produk: galeri foto, deskripsi, harga, varian, stok, tombol beli, dan FAQ singkat.
4.	Keranjang & checkout ringkas: tanpa wajib daftar akun (guest checkout), ringkasan pesanan, ongkir, dan pilihan pembayaran.
5.	Tombol WhatsApp: pesan otomatis berisi nama produk dan jumlah (jalur pembelian tercepat).
6.	Tentang Kami: cerita perusahaan, visi, legalitas, dan tim.
7.	Kontak & Lokasi: formulir, WhatsApp, email, peta, dan jam operasional.
8.	Halaman legal: kebijakan privasi, syarat & ketentuan, serta pengembalian barang.
9.	SEO dasar & analitik.
Tahap Lanjutan (Fase 2)
Akun pelanggan dan riwayat pesanan, blog/artikel, program voucher dan poin, multi-bahasa (ID/EN), dashboard admin penuh, serta integrasi stok dan marketplace.
Di Luar Lingkup
Aplikasi mobile native dan sistem akuntansi.
5. Kebutuhan Fungsional
ID	Kebutuhan	Prioritas
F-01	Menampilkan produk dan harga dari data folder aset	Wajib
F-02	Pencarian dan filter kategori	Wajib
F-03	Keranjang belanja (tambah, ubah jumlah, hapus)	Wajib
F-04	Checkout tamu dengan validasi alamat dan nomor HP	Wajib
F-05	Pembayaran: transfer bank, QRIS, e-wallet, atau COD (sesuai pilihan pemilik)	Wajib
F-06	Tombol "Pesan via WhatsApp" dengan pesan otomatis	Wajib
F-07	Notifikasi pesanan ke email/WhatsApp pemilik	Wajib
F-08	Formulir kontak/penawaran	Wajib
F-09	Testimoni dan ulasan pelanggan	Tinggi
F-10	Kalkulasi ongkos kirim	Tinggi
F-11	Kode promo/voucher	Sedang
F-12	Lacak pesanan	Sedang
6. Kebutuhan Non-Fungsional
•	Performa: halaman termuat < 2,5 detik di jaringan 4G; gambar dikompresi (WebP) dan dimuat bertahap (lazy load).
•	Responsif: mobile-first, nyaman di ponsel, tablet, dan desktop.
•	Keamanan: HTTPS, perlindungan formulir dari spam, data pelanggan tidak disimpan tanpa persetujuan (sesuai UU PDP).
•	Aksesibilitas: kontras warna cukup, teks terbaca, navigasi keyboard.
•	SEO: judul dan deskripsi tiap halaman, struktur heading benar, sitemap, dan data terstruktur produk.
•	Ketersediaan: dipublikasikan ke tautan yang dapat dibagikan dan dapat dihubungkan ke domain sendiri.
7. Arah Desain (Elegan & Premium)
•	Nuansa: bersih, lega, mewah tetapi hangat; banyak ruang kosong, foto produk besar dan tajam.
•	Warna: palet 2–3 warna dari logo perusahaan (disarankan netral gelap/krem dengan satu warna aksen emas atau warna merek). Akan disesuaikan dengan logo di folder aset.
•	Tipografi: judul serif elegan dipadukan teks sans-serif yang mudah dibaca.
•	Interaksi: animasi halus saat gulir dan hover, tanpa efek berlebihan yang memperlambat halaman.
•	Prinsip konversi: satu CTA utama per layar, harga dan tombol beli selalu terlihat, bukti sosial (testimoni, jumlah pelanggan, logo klien) di dekat tombol beli, serta tombol WhatsApp melayang di pojok layar.
8. Perjalanan Pelanggan (User Flow)
1.	Pelanggan membuka tautan website → membaca nilai jual di hero.
2.	Menelusuri katalog → membuka detail produk.
3.	Menekan Beli Sekarang → keranjang → checkout tamu (isi nama, HP, alamat).
4.	Memilih pembayaran → menerima konfirmasi di layar dan WhatsApp/email.
5.	Alternatif cepat: menekan Pesan via WhatsApp dari halaman produk mana pun.
9. Sumber Konten dari Folder Aset
Struktur folder yang disarankan:
•	logo/ — logo (PNG/SVG, latar transparan)
•	produk/ — satu subfolder per produk (foto + info.txt berisi nama, harga, deskripsi, varian, stok)
•	tentang/ — cerita perusahaan, foto tim/kantor
•	testimoni/ — teks dan foto pelanggan
•	kontak.txt — alamat, WhatsApp, email, jam operasional, media sosial
Catatan: isi folder belum saya terima di percakapan ini. Konten final akan diambil begitu folder diunggah.
10. Integrasi & Publikasi
•	Website dipublikasikan sebagai halaman dengan tautan langsung yang bisa dibagikan ke pelanggan.
•	Opsional: sambungkan ke domain sendiri (mis. namaperusahaan.com).
•	Integrasi: WhatsApp (tautan pesan otomatis), Google Analytics/Meta Pixel (opsional), peta Google, dan payment gateway (Midtrans/Xendit) bila dipilih.
11. Risiko & Asumsi
Risiko / Asumsi	Mitigasi
Foto produk kualitas rendah	Kompres dan seragamkan rasio; sarankan foto ulang untuk produk utama
Payment gateway memerlukan akun bisnis terverifikasi	Mulai dengan transfer bank + WhatsApp, tambahkan gateway di Fase 2
Data produk tidak lengkap	Gunakan template info.txt di atas
Pesanan tanpa dashboard admin	Pesanan dikirim ke WhatsApp/email pemilik pada MVP
12. Rencana Rilis
Tahap	Isi	Perkiraan
1. Persiapan	Terima folder aset, finalisasi palet warna	1–2 hari
2. Desain & pembangunan	Semua halaman MVP	3–5 hari
3. Uji	Uji di ponsel/desktop, uji alur beli	1–2 hari
4. Rilis	Publikasi ke tautan, sambung domain	1 hari
13. Pertanyaan Terbuka
1.	Nama perusahaan, bidang usaha, dan produk/jasa yang dijual?
2.	Metode pembayaran apa yang ingin diaktifkan?
3.	Apakah pengiriman ke seluruh Indonesia, dan siapa kurirnya?
4.	Sudah punya domain sendiri?
5.	Apakah ada website atau gaya desain yang Anda sukai sebagai referensi?
