# Wireframe dan Daftar Komponen Website

Berdasarkan mockup desain (Desain.png), website terdiri dari halaman berikut:

## Halaman Home
- Header (logo, navigasi, ikon keranjang, profil)
- Hero Section (banner besar dengan call-to-action)
- Product Section (grid produk terbaru/terlaris)
- Footer (link informasi, media sosial, copyright)

## Halaman Produk
- Header (sama seperti home)
- Filter / pencarian produk
- Grid produk dengan kartu (gambar, nama, harga, tombol detail/tambah ke keranjang)
- Footer

## Halaman Detail Produk
- Header
- Gambar produk besar + thumbnail
- Nama produk, harga, deskripsi
- Tombol "Tambah ke Keranjang"
- Produk terkait (related products)
- Footer

## Halaman Login/Register
- Header sederhana (tanpa navigasi penuh)
- Form login (email, password, tombol masuk, link lupa password)
- Form register (nama, email, password, konfirmasi password, tombol daftar)
- Footer

## Dashboard Admin (hanya untuk role admin)
- Sidebar menu (Dashboard, Produk, Users, Orders, Logout)
- Konten utama:
  - Dashboard: ringkasan statistik (total penjualan, total produk, total users)
  - Produk: tabel produk dengan tombol tambah, edit, hapus
  - Users: tabel user dengan role
  - Orders: tabel pesanan
- Footer (opsional)

## Komponen yang Diperlukan
1. Layout utama (app.blade.php) dengan slot untuk header, sidebar, content, footer
2. Header component (nav.blade.php)
3. Footer component (footer.blade.php)
4. Blade views untuk setiap halaman:
   - welcome.blade.php (home)
   - products.index.blade.php
   - products.show.blade.php
   - auth/login.blade.php
   - auth/register.blade.php
   - admin/dashboard.blade.php
   - admin/products/index.blade.php
   - admin/products/create.blade.php
   - admin/products/edit.blade.php
5. Asset folder: css (style.css), js (script.js), images
6. Routes: web.php untuk auth, produk, admin
7. Controllers: ProductController, AuthController (menggunakan Laravel Breeze atau manual), AdminController
8. Models: User, Product, Order (optional)
9. Migration files untuk tabel users, products, orders
10. Seeder untuk data awal (admin user, produk contoh)
