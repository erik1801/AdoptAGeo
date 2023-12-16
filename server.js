const express = require('express');
const sqlite3 = require('sqlite3').verbose();
const bodyParser = require('body-parser');
const app = express();
const port = 3000;

// Middleware zum Parsen von JSON-Daten
app.use(bodyParser.json());

// SQLite-Datenbank erstellen (falls nicht vorhanden) und Verbindung herstellen
const db = new sqlite3.Database('geocaches.db');

// SQLite-Tabelle für Geocaches erstellen (falls nicht vorhanden)
db.serialize(() => {
  db.run("CREATE TABLE IF NOT EXISTS geocaches (id INTEGER PRIMARY KEY AUTOINCREMENT, geocacheName TEXT, geocacheCode TEXT, location TEXT, coordinates TEXT, size TEXT, difficulty INTEGER, terrain INTEGER, link TEXT)");
});

// Endpunkt für den Geocache-Upload
app.post('/upload', (req, res) => {
  const geocacheData = req.body;

  // SQL-Befehl für das Einfügen von Geocache-Daten
  const sql = 'INSERT INTO geocaches (geocacheName, geocacheCode, location, coordinates, size, difficulty, terrain, link) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';

  // SQL-Parameter für den Befehl
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

  // Geocache-Daten in die Datenbank einfügen
  db.run(sql, params, function (err) {
    if (err) {
      console.error('Fehler beim Hochladen des Geocaches:', err.message);
      res.status(500).send('Interner Serverfehler');
    } else {
      res.send(`Geocache erfolgreich hochgeladen! (ID: ${this.lastID})`);
    }
  });
});

// Endpunkt für das Abrufen aller Geocaches
app.get('/geocaches', (req, res) => {
  // SQL-Befehl für das Abrufen aller Geocache-Daten
  const sql = 'SELECT * FROM geocaches';

  // Geocache-Daten aus der Datenbank abrufen
  db.all(sql, [], (err, rows) => {
    if (err) {
      console.error('Fehler beim Abrufen der Geocaches:', err.message);
      res.status(500).send('Interner Serverfehler');
    } else {
      res.json(rows);
    }
  });
});

// Server starten
app.listen(port, () => {
  console.log(`Server läuft auf http://localhost:${port}`);
});
