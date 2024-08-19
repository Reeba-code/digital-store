const express = require('express');
const http = require('http');
const WebSocket = require('ws');
const bodyParser = require('body-parser');
const app = express();
const server = http.createServer(app);
const wss = new WebSocket.Server({ server });

app.use(bodyParser.json());
app.use(express.static('public'));

let products = [];

app.get('/products', (req, res) => {
    res.json(products);
});

app.post('/products', (req, res) => {
    const product = req.body;
    products.push(product);
    broadcast(JSON.stringify({ type: 'PRODUCT_ADDED', product }));
    res.status(201).json(product);
});

wss.on('connection', (ws) => {
    ws.send(JSON.stringify({ type: 'INITIAL_PRODUCTS', products }));
});

function broadcast(data) {
    wss.clients.forEach((client) => {
        if (client.readyState === WebSocket.OPEN) {
            client.send(data);
        }
    });
}

server.listen(3000, () => {
    console.log('Server is running on port 3000');
});
// twilio phone number +16694004634 SID AC5d02c681a2374e13458dd0e9ab7be9a9 auth Token c3c0d4361901f96f9a163459ed7b673e