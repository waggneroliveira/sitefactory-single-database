
// Os dados / tempo para os quais queremos fazer a contagem regressiva
var countDownDate = new Date("January 30, 2026 12:00:00").getTime();

// Execute myfunc a cada segundo
var myfunc = setInterval(function() {

    var now = new Date().getTime();
    var timeleft = countDownDate - now;

    // Calculando os dias, horas, minutos e segundos restantes
    var days = Math.floor(timeleft / (1000 * 60 * 60 * 24));
    var hours = Math.floor((timeleft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((timeleft % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((timeleft % (1000 * 60)) / 1000);

    // O resultado é enviado para o elemento específico
    document.getElementById("days").innerHTML = days < 10 ? "0" + days : days
    document.getElementById("hours").innerHTML = hours + ""
    document.getElementById("mins").innerHTML = minutes + ""
        document.getElementById("secs").innerHTML = seconds + "" 

    // Exibir a mensagem quando a contagem regressiva terminar
    if (timeleft < 0) {
        clearInterval(myfunc);
        document.getElementById("days").innerHTML = ""
        document.getElementById("hours").innerHTML = ""
        document.getElementById("mins").innerHTML = ""
        document.getElementById("secs").innerHTML = ""
        // document.getElementById("end").innerHTML = "TIME UP!!";
    }
}, 1000);

//Final cronometro