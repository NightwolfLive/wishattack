// Aktuelles Datum abrufen
const currentDate = new Date();

// Start- und Enddatum festlegen
const startDate = new Date('2024-09-27');
const endDate = new Date('2024-10-11');

// Schaltfläche und Link abrufen
const joinBtn = document.getElementById('joinBtn');
const joinLink = document.getElementById('joinLink');

// Funktion zum Aktualisieren des Button-Zustands und des Links
function updateButtonState() {
    if (currentDate >= startDate && currentDate <= endDate) {
        joinBtn.classList.remove('disabled');
        joinBtn.classList.add('enabled');
        joinLink.href = "join.html";
    } else {
        joinBtn.classList.remove('enabled');
        joinBtn.classList.add('disabled');
        joinLink.href = "#";
    }
}

// Funktion beim Laden der Seite aufrufen
updateButtonState();



// Funktion, um einen zufälligen Index zu generieren
function getRandomIndex(max) {
    return Math.floor(Math.random() * max);
  }
  
  // Array mit den möglichen Bildendungen
  const imageExtensions = ['png'];
  
  // Array, um bereits ausgewählte Bilder zu speichern
  const usedImages = [];
  
  // Funktion, um ein zufälliges, noch nicht ausgewähltes Bild auszuwählen
  function getRandomImage() {
    const imageDirectory = 'images/gallery/';
    const maxImages = 23; // Passe an deine Bildanzahl an
  
    let randomImage;
    do {
      const randomIndex = getRandomIndex(maxImages) + 1;
      const randomExtensionIndex = getRandomIndex(imageExtensions.length);
      const randomExtension = imageExtensions[randomExtensionIndex];
      randomImage = imageDirectory + randomIndex + '.' + randomExtension;
    } while (usedImages.includes(randomImage));
  
    usedImages.push(randomImage);
    return randomImage;
  }
  
  // Hole die beiden Bild-Elemente
  const imageElement1 = document.getElementById('image1');
  const imageElement2 = document.getElementById('image2');
  
  // Setze die src-Attribute der Bilder auf zufällige Bilder
  imageElement1.src = getRandomImage();
  imageElement2.src = getRandomImage();
  
  