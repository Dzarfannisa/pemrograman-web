const path = require('path');
const fileContoh = '/users/mahasiswa/tugas/index.html';
console.log(`Nama File: ${path.basename(fileContoh)}`);
console.log(`Ekstensi: ${path.extname(fileContoh)}`);
console.log(`Info Lengkap:`, path.parse(fileContoh));
// Menggabungkan path dengan aman
const fullPath = path.join('belajar', 'nodejs', 'app.js');
console.log(`Path Gabungan: ${fullPath}`);