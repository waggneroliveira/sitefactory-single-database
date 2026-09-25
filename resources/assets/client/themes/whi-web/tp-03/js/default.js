// Bloquear clique direito
document.addEventListener('contextmenu', function (e) {
    e.preventDefault();
});

// Bloquear teclas de inspeção
document.addEventListener('keydown', function (e) {

    // F12
    if (e.key === 'F12') {
        e.preventDefault();
    }

    // Ctrl+Shift+I
    if (e.ctrlKey && e.shiftKey && e.key === 'I') {
        e.preventDefault();
    }

    // Ctrl+Shift+J
    if (e.ctrlKey && e.shiftKey && e.key === 'J') {
        e.preventDefault();
    }

    // Ctrl+U
    if (e.ctrlKey && e.key === 'u') {
        e.preventDefault();
    }

    // Ctrl+Shift+C
    if (e.ctrlKey && e.shiftKey && e.key === 'C') {
        e.preventDefault();
    }
});

// Detectar DevTools aberto
setInterval(function () {
    const widthThreshold = window.outerWidth - window.innerWidth > 160;
    const heightThreshold = window.outerHeight - window.innerHeight > 160;

    if (widthThreshold || heightThreshold) {
        document.body.innerHTML = '';
    }
}, 1000);