const http = require('http');
const querystring = require('querystring');
http.createServer((req, res) => {
const urlParts = req.url.split('?');
const params = querystring.parse(urlParts[1]); // Mengubah string "?name=Ali"menjadi objek
if (req.url.startsWith('/delay')) {
const waktuJeda = params.ms || 2000; // default 2 detik
setTimeout(() => {
res.writeHead(200, {'Content-Type': 'text/html'});
res.end(`<h1>Halo ${params.nama || 'User'}!</h1><p>Respon ini tertunda
${waktuJeda}ms.</p>`);
}, waktuJeda);
} else {
res.end('Gunakan /delay?nama=Andi&ms=3000');
}
}).listen(3000);