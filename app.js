const dns = require('dns');
const crypto = require('crypto');
const fs = require('fs');
const http = require('http');

const FILE = 'security_log.txt';
const PORT = 3000;

// 1. Ambil IP dari github.com
dns.lookup('github.com', (err, address) => {
    if (err) throw err;

    console.log("IP:", address);

    // 2. Hash IP
    const hash = crypto.createHash('sha256')
        .update(address)
        .digest('hex');

    const timestamp = new Date().toLocaleString();

    const log = `${timestamp} - ${hash}\n`;

    // 3. Simpan ke file
    fs.appendFile(FILE, log, (err) => {
        if (err) throw err;
        console.log("Data tersimpan!");
    });
});

// 4. Buat HTTP server
const server = http.createServer((req, res) => {

    console.info(`User akses: ${req.url}`);

    if (req.url === '/') {

        fs.readFile(FILE, 'utf8', (err, data) => {
            if (err) {
                res.end("File belum ada");
                return;
            }

            const rows = data.trim().split('\n');

            let htmlRows = '';

            rows.forEach(row => {
                const [time, hash] = row.split(' - ');
                htmlRows += `<tr>
                                <td>${time}</td>
                                <td>${hash}</td>
                             </tr>`;
            });

            const html = `
                <h2>Security Log</h2>
                <table border="1">
                    <tr>
                        <th>Timestamp</th>
                        <th>Hash</th>
                    </tr>
                    ${htmlRows}
                </table>
            `;

            res.writeHead(200, {'Content-Type': 'text/html'});
            res.end(html);
        });

    } else {
        res.end("404 Not Found");
    }
});

server.listen(PORT, () => {
    console.log(`Server jalan di http://localhost:${PORT}`);
});