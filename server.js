const express = require('express');
const sqlite3 = require('sqlite3').verbose();
const bodyParser = require('body-parser');
const app = express();
const port = 3000;

app.use(bodyParser.json());

const db = new sqlite3.Database('geocaches.db');

db.serialize(() => {
  db.run("CREATE TABLE IF NOT EXISTS geocaches (id INTEGER PRIMARY KEY AUTOINCREMENT, geocacheName TEXT, geocacheCode TEXT, location TEXT, coordinates TEXT, size TEXT, difficulty INTEGER, terrain INTEGER, link TEXT)");
});

app.post('/upload', (req, res) => {
  const geocacheData = req.body;

  const sql = 'INSERT INTO geocaches (geocacheName, geocacheCode, location, coordinates, size, difficulty, terrain, link) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';

  const params = [
    geocacheData.geocacheName,
    geocacheData.geocacheCode,
    geocacheData.location,
    geocacheData.coordinates,
    geocacheData.size,
    geocacheData.difficulty,
    geocacheData.terrain,
    geocacheData.link,
  ];

  db.run(sql, params, function (err) {
    if (err) {
      console.error('Fehler beim Hochladen des Geocaches:', err.message);
      res.status(500).send('Interner Serverfehler');
    } else {
      res.send(`Geocache erfolgreich hochgeladen! (ID: ${this.lastID})`);
    }
  });
});

app.get('/geocaches', (req, res) => {
  const sql = 'SELECT * FROM geocaches';

  db.all(sql, [], (err, rows) => {
    if (err) {
      console.error('Fehler beim Abrufen der Geocaches:', err.message);
      res.status(500).send('Interner Serverfehler');
    } else {
      res.json(rows);
    }
  });
});

app.listen(port, () => {
  console.log(`Server läuft auf http://localhost:${port}`);
});
