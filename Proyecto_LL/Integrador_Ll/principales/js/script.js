/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/ClientSide/javascript.js to edit this template
 */
const body = document.querySelector('body'),
        sidebar = body.querySelector('nav'),
        toggle = body.querySelector(".toggle"),
        searchBtn = body.querySelector(".search-box"),
        modeSwitch = body.querySelector(".toggle-switch"),
        modeText = body.querySelector(".mode-text");

toggle.addEventListener("click" , () => {
    sidebar.classList.toggle("close");
})
searchBtn.addEventListener("click" , () => {
    sidebar.classList.remove("close");
})
modeSwitch.addEventListener("click", () => {
    body.classList.toggle("dark");

    if (body.classList.contains("dark")){
    modeText.innerText = "Light mode";
    }else{
            modeText.innerText = "Dark mode";
    }
});

const darkButton = document.getElementById('dark-button');

// Agregar evento click al botón oscuro
darkButton.addEventListener('click', function() {
  // Alternar la clase 'dark' en el body
  document.body.classList.toggle('dark');
});