// Funktion, um einen zufälligen Index zu generieren
function getRandomIndex(max) {
    return Math.floor(Math.random() * max);
  }
  
  // Array mit den möglichen Bildendungen
  const imageExtensions = ['webp'];
  
  // Array, um bereits ausgewählte Bilder zu speichern
  const usedImages = [];
  
  // Funktion, um ein zufälliges, noch nicht ausgewähltes Bild auszuwählen
  function getRandomImage() {
    const imageDirectory = 'Images/gallery/';
    const maxImages = 2; // Passe an deine Bildanzahl an
  
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