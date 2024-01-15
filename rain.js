import words from "./words.js";

const main = document.getElementById("main");
let rainDrops = [];
let explodedLetters = [];

const randomColor = () => {
    const red = Math.floor(Math.random() * 256);
    const green = Math.floor(Math.random() * 256);
    const blue = Math.floor(Math.random() * 256);
  
    const color = `rgb(${red}, ${green}, ${blue})`;
  
    return color;
};

const changeTitleColors = () => {
    let titleElement = document.querySelector(".title");

    if (titleElement) {
        titleElement.innerHTML = titleElement.textContent
            .split("")
            .map(letter => `<span class="individual-letter">${letter}</span>`)
            .join("");

        document.querySelectorAll('.individual-letter').forEach(letterElement => {
            letterElement.style.color = randomColor();
        });
    }
} 

const fly = (originalXPos, originalYPos) => {
    document.querySelectorAll('.letter').forEach(letterElement => {
        let xPos = parseInt(originalXPos) + getRandomInt(-50, 50);
        let yPos = parseInt(originalYPos) + getRandomInt(-50, 50);
        letterElement.style.transition = 'left 2s, top 2s';
        letterElement.style.left = xPos + "px";
        if (yPos + 20 >= window.innerHeight - 20) yPos = parseInt(originalYPos) + getRandomInt(-50, -20);
        letterElement.style.top = yPos + "px";
    });
}

const explodeText = (element) => {
    let xPos = parseInt(element.style.left.split("px")[0]) + 8;
    const rect = element.getBoundingClientRect();
    let yPos = rect.top - 18;
    
    let letters = element.textContent.split("");

    main.removeChild(element);
    letters.forEach(letter => {
        let letterElement = document.createElement("p");
        letterElement.textContent = letter;
        letterElement.style.left = xPos + "px";
        letterElement.style.top = yPos + "px";
        letterElement.style.color = randomColor();
        letterElement.classList.add("letter");

        yPos += 17;
        explodedLetters.push(letterElement);
        main.appendChild(letterElement);
    });
    fly(xPos, yPos);
};

const checkBottom = () => {
    rainDrops.forEach(rain => {
        const rect = rain.getBoundingClientRect();
        if ((rect.bottom - rect.height / 20000) >= window.innerHeight) {
            //rain.style.top = window.innerHeight - rect.width + "px";
            //rain.classList.add("horizontal");
            explodeText(rain);
        }
    });

    if (explodedLetters.length >= 100) {
        let lettersToDelete = explodedLetters.splice(0, explodedLetters.length/2);
        lettersToDelete.forEach(letter => {
            main.removeChild(letter);
        });
    }
};

const letItRain = () => {
    let rain = document.createElement("p");
    const randomIndex = Math.floor(Math.random() * words.length);
    rain.textContent = words[randomIndex];
    rain.style.left = Math.random() * window.innerWidth + "px";
    rain.style.color = randomColor();
    rain.classList.add("rain");

    rainDrops.push(rain);
    main.appendChild(rain);
    changeTitleColors();
};

const getRandomInt = (min, max) => {
    return Math.floor(Math.random() * (max - min + 1)) + min;
};

setInterval(checkBottom, 1);
setInterval(letItRain, 1000);