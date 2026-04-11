video_stream.js
const http = require('http');
const fs = require('fs');
http.createServer((req, res) => {
res.writeHead(200, {'Content-Type': 'video/mp4'});
// Membaca video dan langsung menyambungkannya (pipe) ke respon HTTP
const readStream = fs.createReadStream('./video_kuliah.mp4');
readStream.pipe(res);
}).listen(8080);