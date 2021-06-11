var word = "Bem-vindos ao";
var word2 = "Airport Controller!";
var word3 = "Não deixe mais os voos atrasarem!";

var i = 0;
tempo_espera = setTimeout(function () {
  var timer = setInterval(function () {
    document.getElementById("h2").innerHTML += word[i];
    i++;
    if (i > word.length - 1) {
      clearInterval(timer);
    }
  }, 80);
}, 200);

var i2 = 0;
tempo_espera2 = setTimeout(function () {
  var timer2 = setInterval(function () {
    document.getElementById("h1").innerHTML += word2[i2];
    i2++;
    if (i2 > word2.length - 1) {
      clearInterval(timer2);
    }
  }, 100);
}, 1000);

var i3 = 0;
tempo_espera3 = setTimeout(function () {
  var timer3 = setInterval(function () {
    document.getElementById("h3").innerHTML += word3[i3];
    i3++;
    if (i3 > word3.length - 1) {
      clearInterval(timer3);
    }
  }, 50);
}, 2800);
