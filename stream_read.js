const fs = require('fs');
const { StringDecoder } = require('string_decoder');
const decoder = new StringDecoder('utf8');
const readableStream = fs.createReadStream('./data_besar.txt', { highWaterMark: 16 });
readableStream.on('data', (buffer) => {
// StringDecoder memastikan karakter multi-byte tidak terpotong antar chunk
const teks = decoder.write(buffer);

console.log('--- Menerima Potongan Data (16 bytes) ---');
console.log(teks);
});