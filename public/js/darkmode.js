let isDarkMode = localStorage.getItem('darkMode');
const html = document.querySelector('html');
const checkbox = document.querySelector('#toogleButton');

const enableDarkMode = () => {
    html.classList.add('dark');
    localStorage.setItem('darkMode', 'true');
}

const disableDarkMode = () => {
    html.classList.remove('dark');
    localStorage.setItem('darkMode', 'false');
}

if (isDarkMode === 'true') {
    enableDarkMode();
    checkbox.checked = true;
}

checkbox.addEventListener('click', () => {
    isDarkMode = localStorage.getItem('darkMode');
    if (isDarkMode !== 'true') {
        enableDarkMode();
    } else {
        disableDarkMode();
    }
})