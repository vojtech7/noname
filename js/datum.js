var datum = new Date(); // aktuální datum
var retezec += datum.getDate() + ". "; // Den v měsíci
retezec += (1 + datum.getMonth()) + ". "; // Měsíce jsou číslovány od nuly
retezec += datum.getFullYear() + ". "; // Rok ve formátu 0000
retezec += "Čas: " + datum.getHours() + ":"; // Hodiny
retezec += datum.getMinutes(); // Minuty
// retezec += ":" + datum.getSeconds(); // Sekundy
retezec += "."; // Tečka za větou
document.write( retezec ); // Výpis řetězce do dokumentu