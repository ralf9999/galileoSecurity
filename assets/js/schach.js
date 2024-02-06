const trainingMenu = document.getElementById('training');
const subMenu = document.getElementById('submenu-training');
const marlemschachMenu = document.getElementById("marlemschach");
const helpMenu = document.getElementById("hilfe");
const helpContainer = document.getElementById("help-container");
const zuFeldInput = document.getElementById("zuFeld");
const vonFeldInput = document.getElementById("vonFeld");
const zugButton = document.getElementById("zugButton");
const meldungen = document.getElementById("meldungen");
const exportButton = document.getElementById('exportButton');
const zugVorButton = document.getElementById('zugVor');
const infoIcon = document.querySelector(".info-icon");
const tooltip = document.querySelector(".tooltip");
const partieZuege = document.getElementById('partieZuege'); 
const tabellenBody = document.getElementById('tabellenBody'); 
const tbody = document.querySelector('tbody');
let weisOderSchwarz = 1;
let zugWeis = "";
let zugSchwarz = "";
let zugNummer = 1;
let schachbrett;


function arraySchachBrettAufbauen() {
  // Initialisieren eines leeren Schachbretts mit Schachfiguren-Namen
  schachbrett = new Array(8);
  for (let i = 0; i < 8; i++) {
    schachbrett[i] = new Array(8);
    for (let j = 0; j < 8; j++) {
      schachbrett[i][j] = null; // Initialisieren Sie jedes Feld als null, um anzuzeigen, dass es leer ist.
    }
  }
}

function grafischesSchachBrettAufbauen() {
  const figurenReihenfolge = ["turm", "springer", "laeufer", "dame", "koenig", "laeufer", "springer", "turm"];

  function platziereFigurenreihe(farbe, reihe) {
    figurenReihenfolge.forEach((figur, index) => {
      const position = `${String.fromCharCode(97 + index)}${reihe}`;
      setzeSchachfigurAufGrafikSchachbrett(`${figur}_${farbe}`, position);
      setzeSchachfigurAufVirtuellesSchachbrett(`${figur}_${farbe}`, position);
    });
  }

  for (let i = 1; i <= 8; i++) {
    platziereFigurenreihe("weis", 1);
    setzeSchachfigurAufGrafikSchachbrett(`bauer_weis`, `${String.fromCharCode(97)}2`);
    setzeSchachfigurAufVirtuellesSchachbrett(`bauer_weis`, `${String.fromCharCode(97)}2`);
    setzeSchachfigurAufGrafikSchachbrett(`bauer_weis`, `${String.fromCharCode(97 + i)}2`);
    setzeSchachfigurAufVirtuellesSchachbrett(`bauer_weis`, `${String.fromCharCode(97 + i)}2`);

    platziereFigurenreihe("schwarz", 8);
    setzeSchachfigurAufGrafikSchachbrett(`bauer_schwarz`, `${String.fromCharCode(97)}7`);
    setzeSchachfigurAufVirtuellesSchachbrett(`bauer_schwarz`, `${String.fromCharCode(97)}7`);
    setzeSchachfigurAufGrafikSchachbrett(`bauer_schwarz`, `${String.fromCharCode(97 + i)}7`);
    setzeSchachfigurAufVirtuellesSchachbrett(`bauer_schwarz`, `${String.fromCharCode(97 + i)}7`);
  }
}


function setzeSchachfigurAufVirtuellesSchachbrett(figure, position) {
  let x = 0
  let y = position[1]-1;
  let buchststaben ='abcdefgh';
  x = buchststaben.indexOf(position[0]);
  schachbrett[y][x] = figure;
};

// Funktion zum Überprüfen, welche Schachfigur auf einem Feld steht
function welcheSchachfigurStehtAufFeld(position) {
  let x = position.charCodeAt(0) - 'a'.charCodeAt(0);
  let y = parseInt(position[1]) - 1;

  // Stellen Sie sicher, dass schachbrett definiert ist und die Indizes gültig sind
  if (schachbrett && schachbrett[y] && schachbrett[y][x] !== undefined) {
    return schachbrett[y][x];
  } else {
    console.error('Ungültige Position oder Schachbrett nicht korrekt initialisiert.');
    return null; // oder einen geeigneten Wert zurückgeben, um anzuzeigen, dass die Position ungültig ist
  }
}


function setzeSchachfigurAufGrafikSchachbrett(figurenKlasse, aufFeld) {
  // Finde das Zielfeld anhand der Datenkoordinaten
  const zielfeld = document.querySelector(`[data-coordinates="${aufFeld}"]`);

  // Überprüfe, ob das Zielfeld gefunden wurde
  if (!zielfeld) {
    console.log("Ungültige Koordinaten oder Element nicht gefunden.");
    return;
  }

  // Füge die gewünschte Schachfigurenklasse zum Zielfeld hinzu
  zielfeld.classList.add(figurenKlasse);
}

function schachFigurenZiehenArray(figurDieZiehenSoll, vonKoordinaten, zuKoordinaten) {
  // Konvertieren Sie die Koordinaten in Array-Indizes
  const vonX = vonKoordinaten.charCodeAt(0) - 'a'.charCodeAt(0);
  const vonY = parseInt(vonKoordinaten[1]) - 1;
  const zuX = zuKoordinaten.charCodeAt(0) - 'a'.charCodeAt(0);
  const zuY = parseInt(zuKoordinaten[1]) - 1;

  // Überprüfen Sie, ob die Quellposition eine Schachfigur enthält
  const schachfigur = schachbrett[vonY][vonX];
  if (!schachfigur) {
    console.log("Keine Schachfigur auf der Quellposition gefunden.");
    return false;
  }

  // Überprüfen, ob das Zielfeld leer ist oder eine gegnerische Figur enthält
  const zielFeldInhalt = schachbrett[zuY][zuX];

  if (zielFeldInhalt !== null) {
    // Entfernen Sie die Figur auf dem Zielfeld (virtuelles Schachbrett)
    schachbrett[zuY][zuX] = null;

    // Entfernen Sie die Figur auf dem Zielfeld (grafisches Schachbrett)
    const zielfeld = document.querySelector(`[data-coordinates="${zuKoordinaten}"]`);
    if (zielfeld) {
      zielfeld.classList.remove(zielFeldInhalt.toLowerCase());
    }
  }

  // Spezielle Behandlung für die Rochade
  if (figurDieZiehenSoll === 'koenig_weis' && vonKoordinaten === 'e1' && zuKoordinaten === 'g1') {
    // Rochade - König zieht von e1 nach g1
    schachbrett[vonY][vonX] = null;
    schachbrett[zuY][zuX] = 'koenig_weis';

    // Grafisch den König bewegen
    const startfeldKoenig = document.querySelector(`[data-coordinates="e1"]`);
    const zielfeldKoenig = document.querySelector(`[data-coordinates="g1"]`);

    startfeldKoenig.classList.remove('koenig_weis');
    zielfeldKoenig.classList.add('koenig_weis');

    // Rochade - Turm zieht von h1 nach f1
    const startfeldTurm = document.querySelector(`[data-coordinates="h1"]`);
    const zielfeldTurm = document.querySelector(`[data-coordinates="f1"]`);
    
    startfeldTurm.classList.remove('turm_weis');
    zielfeldTurm.classList.add('turm_weis');
    schachbrett[0][7] = null;
    schachbrett[0][5] = 'turm_weis';
  } else if (figurDieZiehenSoll === 'turm_weis' && vonKoordinaten === 'h1' && zuKoordinaten === 'f1') {
    // Rochade - Turm zieht von h1 nach f1
    schachbrett[vonY][vonX] = null;
    schachbrett[zuY][zuX] = 'turm_weis';
    
    // Grafisch den Turm bewegen
    const startfeldTurm = document.querySelector(`[data-coordinates="h1"]`);
    const zielfeldTurm = document.querySelector(`[data-coordinates="f1"]`);

    startfeldTurm.classList.remove('turm_weis');
    zielfeldTurm.classList.add('turm_weis');
  } else {
    // Normale Bewegung
    schachbrett[vonY][vonX] = null;
    schachbrett[zuY][zuX] = schachfigur;

    // Grafisch die Schachfigur bewegen
    const startfeld = document.querySelector(`[data-coordinates="${vonKoordinaten}"]`);
    const zielfeld = document.querySelector(`[data-coordinates="${zuKoordinaten}"]`);

    startfeld.classList.remove(schachfigur.toLowerCase());
    zielfeld.classList.add(schachfigur.toLowerCase());
  }


// Spezielle Behandlung für die Rochade (Schwarz)
if (figurDieZiehenSoll === 'koenig_schwarz' && vonKoordinaten === 'e8' && zuKoordinaten === 'g8') {
  // Rochade - König zieht von e8 nach g8
  schachbrett[vonY][vonX] = null;
  schachbrett[zuY][zuX] = 'koenig_schwarz';

  // Grafisch den König bewegen
  const startfeldKoenig = document.querySelector(`[data-coordinates="e8"]`);
  const zielfeldKoenig = document.querySelector(`[data-coordinates="g8"]`);

  startfeldKoenig.classList.remove('koenig_schwarz');
  zielfeldKoenig.classList.add('koenig_schwarz');

  // Rochade - Turm zieht von h8 nach f8
  const startfeldTurm = document.querySelector(`[data-coordinates="h8"]`);
  const zielfeldTurm = document.querySelector(`[data-coordinates="f8"]`);

  startfeldTurm.classList.remove('turm_schwarz');
  zielfeldTurm.classList.add('turm_schwarz');
  schachbrett[7][7] = null;
  schachbrett[7][5] = 'turm_schwarz';
} else if (figurDieZiehenSoll === 'turm_schwarz' && vonKoordinaten === 'h8' && zuKoordinaten === 'f8') {
  // Rochade - Turm zieht von h8 nach f8
  schachbrett[vonY][vonX] = null;
  schachbrett[zuY][zuX] = 'turm_schwarz';

  // Grafisch den Turm bewegen
  const startfeldTurm = document.querySelector(`[data-coordinates="h8"]`);
  const zielfeldTurm = document.querySelector(`[data-coordinates="f8"]`);

  startfeldTurm.classList.remove('turm_schwarz');
  zielfeldTurm.classList.add('turm_schwarz');

}

  return true;
}


function whosTurn(toggle) {
    // PAWN
    if (item.innerText == `${toggle}pawn`) {
      item.style.backgroundColor = 'pink';

      // Berechne die Zielposition für den nächsten Zug
      const targetSquare = toggle === 'w' ? aup + 100 : aup - 100;

      // Überprüfe, ob das Zielfeld leer ist
      if (document.getElementById(`b${targetSquare}`).innerText.length == 0) {
          document.getElementById(`b${targetSquare}`).style.backgroundColor = 'green';

          // Falls der Bauer auf seinem Startfeld ist, kann er zwei Schritte vorwärts gehen
          if ((toggle === 'w' && aup === 200) || (toggle === 'b' && aup === 700)) {
              const doubleStepTargetSquare = toggle === 'w' ? aup + 200 : aup - 200;
              if (document.getElementById(`b${doubleStepTargetSquare}`).innerText.length == 0) {
                  document.getElementById(`b${doubleStepTargetSquare}`).style.backgroundColor = 'green';
              }
          }
      }

      // Überprüfe die diagonalen Schlagzüge
      const leftCaptureSquare = toggle === 'w' ? aup + 99 : aup - 101;
      const rightCaptureSquare = toggle === 'w' ? aup + 101 : aup - 99;

      if (aside > 1 && document.getElementById(`b${leftCaptureSquare}`).innerText.length !== 0) {
          document.getElementById(`b${leftCaptureSquare}`).style.backgroundColor = 'green';
      }

      if (aside < 8 && document.getElementById(`b${rightCaptureSquare}`).innerText.length !== 0) {
          document.getElementById(`b${rightCaptureSquare}`).style.backgroundColor = 'green';
      }
  }

  // Weitere Logik für die Bewegungen von Königen, Türmen, Läufern, Damen und anderen Figuren
  // ...

  item.style.backgroundColor = 'pink';

  // ROOK
  if (item.innerText == `${toggle}rook`) {
      item.style.backgroundColor = 'pink';

      // Überprüfen Sie vertikale Bewegungen
      for (let i = 1; i <= 7; i++) {
          if (aup + i * 100 <= 800 && document.getElementById(`b${a + i * 100}`).innerText.length == 0) {
              document.getElementById(`b${a + i * 100}`).style.backgroundColor = 'green';
          } else {
              break;
          }
      }
      
      for (let i = 1; i <= 7; i++) {
          if (aup - i * 100 >= 100 && document.getElementById(`b${a - i * 100}`).innerText.length == 0) {
              document.getElementById(`b${a - i * 100}`).style.backgroundColor = 'green';
          } else {
              break;
          }
      }

      // Überprüfen Sie horizontale Bewegungen
      for (let i = 1; i <= 7; i++) {
          if (aside + i <= 8 && document.getElementById(`b${a + i}`).innerText.length == 0) {
              document.getElementById(`b${a + i}`).style.backgroundColor = 'green';
          } else {
              break;
          }
      }

      for (let i = 1; i <= 7; i++) {
          if (aside - i >= 1 && document.getElementById(`b${a - i}`).innerText.length == 0) {
              document.getElementById(`b${a - i}`).style.backgroundColor = 'green';
          } else {
              break;
          }
      }
  }
  
  // Weitere Logik für die Bewegungen von Königen, Läufern, Damen und anderen Figuren
  // ...

  item.style.backgroundColor = 'pink';
}




arraySchachBrettAufbauen();
grafischesSchachBrettAufbauen();  
  

function isGerade(number) {
  return number % 2 === 0;
}


function inhaltDerZelle(zellnummer) {
  // Holen Sie die Tabelle anhand ihrer ID (in diesem Fall "Partiezuege").
  let tabelle = partieZuege;

  // Überprüfen, ob die Tabelle gefunden wurde.
  if (tabelle) {
    // Holen Sie alle Zellen der Tabelle.
    let zellen = tabelle.getElementsByTagName("td");

    // Überprüfen, ob die Zellnummer im gültigen Bereich liegt.
    if (zellnummer >= 0 && zellnummer < zellen.length) {
      // Die Zelle mit der angegebenen Zellnummer auswählen und ihren Inhalt zurückgeben.
      return zellen[zellnummer].textContent;
    } else {
      return "Ungültige Zellnummer";
    }
  } else {
    return "Tabelle nicht gefunden";
  }
}


//**** Ereignisbehandlung */

function eingabefelderAuslesen() {
  let vonFeldWert = vonFeldInput.value.toLowerCase();
  let zuFeldWert = zuFeldInput.value.toLowerCase();
  const figurDieZiehenSoll = welcheSchachfigurStehtAufFeld(vonFeldWert);
  schachFigurenZiehenArray(figurDieZiehenSoll, vonFeldWert ,zuFeldWert); 
}

function eingabefelderValidieren() {
  let vonFeldWert = vonFeldInput.value.trim().toLowerCase();
  let zuFeldWert = zuFeldInput.value.trim().toLowerCase();
  let regex = /^[a-h][1-8]$/;
  let vmeldungen = "";

  if (vonFeldWert && !regex.test(vonFeldWert)) {
      vmeldungen += "Das 'von'-Feld gibt es auf dem Schachbrett nicht.\n";
      vonFeldInput.classList.add("fehlerhaftes-feld");
  } else {
      vonFeldInput.classList.remove("fehlerhaftes-feld");
  }

  if (zuFeldWert && !regex.test(zuFeldWert)) {
      vmeldungen += "Das 'zu'-Feld gibt es auf dem Schachbrett nicht.\n";
      zuFeldInput.classList.add("fehlerhaftes-feld");
  } else {
      zuFeldInput.classList.remove("fehlerhaftes-feld");
  }

  meldungen.innerText = vmeldungen;
}

// Funktion zum Anzeigen/Verstecken des Untermenüs
function toggleSubMenu() {
    // Überprüfe, ob das Untermenü vorhanden ist und toggle (anzeigen/verstecken) es entsprechend
    if (subMenu) {
      subMenu.classList.toggle('show');
    }
}

trainingMenu.addEventListener('click', toggleSubMenu);

trainingMenu.addEventListener('keydown', function(event) {
  // Überprüfe, ob die gedrückte Taste die Eingabetaste (Enter) ist
  if (event.key === 'Enter') {
    toggleSubMenu();
  }
});

marlemschachMenu.addEventListener("click", function(event) {
  openLinkInNewWindow("https://www.marlem-software.de/marlemblog/2024/01/14/marlem-spielt-schach/");
});


marlemschachMenu.addEventListener("keydown", function(event) {
  if (event.key === 'Enter') {
    openLinkInNewWindow("https://www.marlem-software.de/marlemblog/2024/01/14/marlem-spielt-schach/");
  }
});

helpMenu.addEventListener("click", function(event) {
  helpContainer.style.display = 'block'; 
});


zuFeldInput.addEventListener("blur", function(event) {
  eingabefelderValidieren();
});


zugButton.addEventListener("click", function(event) {
  event.preventDefault(); // Verhindert das Standardformularevent
   eingabefelderAuslesen();
   if (!isGerade(weisOderSchwarz)){
      zugWeis = zuFeldInput.value;
   } else{
    zugSchwarz = zuFeldInput.value;
    zugInsPartieFormular(zugNummer, zugWeis.toLowerCase(), zugSchwarz.toLowerCase()); 
    zugNummer++;
   }
   zuFeldInput.value = "";
   vonFeldInput.value = "";
   weisOderSchwarz++;
   vonFeldInput.focus();
});

exportButton.addEventListener('click', function() {
  exportToPGN();
});


function zugInsPartieFormular(zugNummer, weißZug, schwarzZug) {
  let tbody = document.getElementById('tabellenBody');
  let newRow = tbody.insertRow();
  let figurDieZiehenSollWeiß = null;
  let figurDieZiehenSollScharz = null;

  figurDieZiehenSollWeiß = welcheSchachfigurStehtAufFeld(weißZug).split("_");
  figurDieZiehenSollWeiß = figurDieZiehenSollWeiß[0];
  figurDieZiehenSollWeiß = figurDieZiehenSollWeiß.charAt(0).toUpperCase() + figurDieZiehenSollWeiß.slice(1);

  if (figurDieZiehenSollWeiß.charAt(0) !== 'B') {
    weißZug = figurDieZiehenSollWeiß.charAt(0) + weißZug;
  }

  figurDieZiehenSollScharz = welcheSchachfigurStehtAufFeld(schwarzZug).split("_");
  figurDieZiehenSollScharz = figurDieZiehenSollScharz[0];
  figurDieZiehenSollScharz = figurDieZiehenSollScharz.charAt(0).toUpperCase() + figurDieZiehenSollScharz.slice(1);

  if (figurDieZiehenSollScharz.charAt(0) !== 'B') {
    schwarzZug = figurDieZiehenSollScharz.charAt(0) + schwarzZug;
  }

  // Überprüfe auf kurze Rochade
  weißZug = weißZug.replace("Kg1", "0-0");
  schwarzZug = schwarzZug.replace("Kg8", "0-0");

  // Zellen für die neue Zeile
  let cell1 = newRow.insertCell(0);
  let cell2 = newRow.insertCell(1);
  let cell3 = newRow.insertCell(2);

  cell1.innerHTML = zugNummer;
  cell2.innerHTML = weißZug;
  cell3.innerHTML = schwarzZug;
}

function exportToPGN() {
  // Initialisieren des PGN-Strings mit den Event- und Date-Informationen
  let pgn = "[Event \"\"]\n[Site \"\"]\n[Date \"" + getCurrentDate() + "\"]\n[Round \"\"]\n[White \"\"]\n[Black \"\"]\n[Result \"\"]\n\n";

  // Durchlaufen aller Tabellenzeilen
  for (var i = 0; i < tbody.rows.length; i++) {
    let row = tbody.rows[i];

    // Extrahieren der Zelleninhalte
    let nr = row.cells[0].textContent;
    let whiteMove = row.cells[1].textContent.replace('S', 'N').replace('L', 'B').replace('D', 'Q').replace('T', 'R');
    let blackMove = row.cells[2].textContent.replace('S', 'N').replace('L', 'B').replace('D', 'Q').replace('T', 'R');

    // Hinzufügen der Züge zur PGN-Notation
    pgn += nr + '. ' + whiteMove + ' ' + blackMove + ' ';
  }

  // Erstellen einer Blob mit dem PGN-String
  let blob = new Blob([pgn], { type: 'text/plain' });

  // Erstellen eines Blob-URLs
  let url = URL.createObjectURL(blob);

  // Erstellen eines Anchor-Elements zum Herunterladen der Datei
  let a = document.createElement('a');
  a.href = url;
  a.download = 'partie.pgn'; // Hier können Sie den Dateinamen ändern

  // Klicken Sie auf das Anchor-Element, um die Datei herunterzuladen
  a.click();

  // Freigeben des URL-Objekts, um Speicher freizugeben
  URL.revokeObjectURL(url);
}


document.getElementById('importButton').addEventListener('click', function() {
  // Zugriff auf das Datei-Eingabe-Element
  var fileInput = document.getElementById('fileInput');
  
  // Eventlistener für die Änderung des Datei-Eingabe-Elements
  fileInput.addEventListener('change', function(e) {
    var file = e.target.files[0];
    
    if (file) {
      // Datei lesen
      var reader = new FileReader();
      reader.onload = function(e) {
        var pgnData = e.target.result;
        
        // Hier kannst du die pgnData verwenden, um die importierte PGN zu verarbeiten
        processPGN(pgnData);
      };
      
      reader.readAsText(file);
    }
  });
  
  // Klicken Sie auf das Datei-Eingabe-Element, um die Datei auszuwählen
  fileInput.click();
});

function processPGN(pgnData) {
  // Hier kannst du den PGN-Text verarbeiten, z.B. die Schachpartie anzeigen oder analysieren
    // Verwende einen regulären Ausdruck, um den Kopf zu entfernen
  const pgnWithoutHeader = pgnData.replace(/\[.*?\]\s*/g, '');

  // Zerlege die bereinigte PGN in Züge (angenommen, die Züge sind in der PGN-Datei in der Standardnotation)
  const moves = pgnWithoutHeader.split(/\d+\./).filter(Boolean).map(move => move.trim());

  // Zugriff auf das Tabellen-Body-Element
  const tbody = document.getElementById('tabellenBody');

  // Durchlaufe die Züge und füge sie in die Tabelle ein
  for (let i = 0; i < moves.length; i++) {
    const move = moves[i];
    const parts = move.split(/\s+/);

    if (parts.length >= 2) {
      const weissZug = parts[0];
      const schwarzZug = parts[1];

      // Zellen für die neue Zeile
      const newRow = tbody.insertRow();
      const cell1 = newRow.insertCell(0);
      const cell2 = newRow.insertCell(1);
      const cell3 = newRow.insertCell(2);

      // Fülle die Zellen mit den Zügen
      cell1.innerHTML = i + 1;
      cell2.innerHTML = weissZug;
      cell3.innerHTML = schwarzZug;
    }
  }
}




function getCurrentDate() {
  var today = new Date();
  var day = today.getDate();
  var month = today.getMonth() + 1; // Januar ist 0
  var year = today.getFullYear();

  // Formatieren des Datums als "TT.MM.YYYY"
  return (day < 10 ? "0" : "") + day + "." + (month < 10 ? "0" : "") + month + "." + year;
}

//                 Menü
function openLinkInNewWindow(url) {
  window.open(url, '_blank');
}

