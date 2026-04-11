const http = require('http');
const os = require('os');

const PORT = 4000;

const server = http.createServer((req, res) => {
  if (req.url === '/') {
    res.writeHead(200, { 'Content-Type': 'text/html' });

    res.end(`
      <h1>Informasi Sistem Operasi</h1>
      <p>Platform: ${os.platform()}</p>
      <p>Arsitektur: ${os.arch()}</p>
      <p>Total Memori: ${(os.totalmem() / 1024 / 1024 / 1024).toFixed(2)} GB</p>
      <p>Sisa Memori: ${(os.freemem() / 1024 / 1024 / 1024).toFixed(2)} GB</p>
      <h2>Informasi Proses</h2>
      <p>Versi Node.js: ${process.version}</p>
      <p>Uptime: ${process.uptime()} detik</p>
    `);
  } else {
    res.writeHead(404);
    res.end('Not Found');
  }
});

server.listen(PORT, () => {
  console.log(`Server jalan di http://localhost:${PORT}`);
});