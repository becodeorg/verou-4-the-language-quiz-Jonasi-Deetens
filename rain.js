const main = document.getElementById("main");
let rainDrops = [];
const words = [
    'avontuur',
    'vieren',
    'beslissing',
    'olifant',
    'familie',
    'prachtig',
    'harmonie',
    'identiteit',
    'reis',
    'kennis',
    'taal',
    'magnifiek',
    'verhaal',
    'operatie',
    'aangenaam',
    'hoeveelheid',
    'betrouwbaar',
    'symfonie',
    'rustig',
    'uniek',
    'overwinning',
    'schitterend',
    'bamboe',
    'vangen',
    'heerlijk',
    'enorm',
    'fantastisch',
    'gebaar',
    'melodie',
    'oneindig',
    'gezellig',
    'kilometer',
    'lavendel',
    'majestueus',
    'nostalgie',
    'gelegenheid',
    'passie',
    'citaat',
    'stralend',
    'spectrum',
    'verleiden',
    'eensgezind',
    'onderneming',
    'wijsheid',
    'xenofobie',
    'jeugdig',
    'zeppelin',
    'nauwkeurig',
    'ademen',
    'waterval',
    'verblindend',
    'excentriek',
    'fluctueren',
    'glorieus',
    'hypnotiseren',
    'verlichten',
    'juxtaposeren',
    'kaleidoscoop',
    'doolhof',
    'melancholie',
    'nevel',
    'oase',
    'top',
    'visionair',
    'veerkrachtig',
    'serenade',
    'rust',
    'paraplu',
    'levendig',
    'grillig',
    'odyssee',
    'verlangen',
    'bries',
    'zalig',
    'kameleon',
    'heerlijk',
    'betoverend',
    'frivool',
    'glinsteren',
    'harmonieus',
    'iriserend',
    'uitbundig',
    'kinetisch',
    'sappig',
    'welluidend',
    'vaag',
    'weelderig',
    'raadselachtig',
    'ontmoeting',
    'luxueus',
    'bezorgdheid',
    'schaamteloos',
    'groen',
    'aantrekkelijk',
    'gastvrij',
    'hoogtepunt',
    'sfeer',
    'wervelwind',
    'levendig'
  ];

const randomColor = () => {
    const red = Math.floor(Math.random() * 256);
    const green = Math.floor(Math.random() * 256);
    const blue = Math.floor(Math.random() * 256);
  
    const color = `rgb(${red}, ${green}, ${blue})`;
  
    return color;
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
    checkBottom();
}

const checkBottom = () => {
    rainDrops.forEach(rain => {
        const rect = rain.getBoundingClientRect();
        if (rect.bottom >= window.innerHeight-30) {
            rain.style.top = window.innerHeight - rect.height + "px";
            rain.classList.add("horizontal");
        }
    });
};

setInterval(letItRain, 500);