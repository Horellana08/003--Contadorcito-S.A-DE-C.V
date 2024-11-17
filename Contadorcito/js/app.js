const apiBase = 'http://localhost/contadorcito/api/v1/';

async function fetchEmpresas() {
    const response = await fetch(apiBase + 'empresas');
    const data = await response.json();
    console.log(data);
}

// Llamada a la función cuando se carga la página
document.addEventListener('DOMContentLoaded', fetchEmpresas);
