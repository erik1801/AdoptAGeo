const express = require('express');
const bodyParser = require('body-parser');
const app = express();
const PORT = 3000;

app.use(bodyParser.json());

let textData = [];

app.post('/upload', (req, res) => {
    const newData = req.body.data;
    textData.push(newData);
    res.send('Daten erfolgreich hochgeladen');
});

app.get('/getTextData', (req, res) => {
    res.json(textData);
});

app.listen(PORT, () => {
    console.log(`Server läuft auf Port ${PORT}`);
});