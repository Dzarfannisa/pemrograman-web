const http = require('http');
const os = require('os');
const url = require('url');
const path = require('path');
const { StringDecoder } = require('string_decoder');

const PORT = 4000;
let logging = false; // mencegah interval dobel

// Halaman utama
function renderHome(res) {
  res.writeHead(200, { 'Content-Type': 'text/html' });
  res.end(`
    <html>
      <head><title>System Info</title></head>
      <body>
        <h1>Informasi Sistem</h1>
        <p><strong>Platform:</strong> ${os.platform()}</p>
        <p><strong>Free Memory:</strong> ${os.freemem()} bytes</p>
      </body>
    </html>
  `);
}

// Server
const server = http.createServer((req, res) => {
  const parsedUrl = url.parse(req.url, true);
  const pathname = parsedUrl.pathname;
  const query = parsedUrl.query;

  // Path Monitoring
  const ext = path.extname(pathname);
  if (ext) {
    console.log(`Ekstensi file terdeteksi: ${ext}`);
  }

  // Routing
  if (pathname === '/') {
    renderHome(res);
  }

  // Query String + Timer 
  else if (pathname === '/info') {
    if (query.log === 'true' && !logging) {
      logging = true;
      setInterval(() => {
        console.log(`Uptime proses: ${process.uptime()} detik`);
      }, 5000);
    }

    res.writeHead(200, { 'Content-Type': 'text/plain' });
    res.end('Logging uptime aktif (cek terminal)');
  }

  // Buffer Decoder 
  if (req.method === 'POST') {
  const decoder = new StringDecoder('utf-8');
  let buffer = '';

  req.on('data', (chunk) => {
    buffer += decoder.write(chunk);
  });

  req.on('end', () => {
    buffer += decoder.end();
    console.log('Data diterima:', buffer);

    res.writeHead(200, { 'Content-Type': 'text/plain' });
    res.end('Data berhasil diterima');
  });
}

//Halaman utama
else if (pathname === '/') {
  renderHome(res);
}
  // 404
  else {
    res.writeHead(404, { 'Content-Type': 'text/plain' });
    res.end('Halaman tidak ditemukan');
  }
});

// Jalankan server
server.listen(PORT, () => {
  console.log(`Server berjalan di http://localhost:${PORT}`);
});