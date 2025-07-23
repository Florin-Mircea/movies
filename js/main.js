let $movieRuntimeToggler = document.getElementById('movie-runtime-toggler');
let $movieRuntime = document.getElementById('movie-runtime');
let isMinutes = true;

function    parseRuntime()  {
    let hours = runtime/60;
    let rhours = Math.floor(hours);
    let minutes = (hours - rhours) * 60;
    let rminutes = Math.round(minutes);

    return  rhours + "h, " + rminutes + "min.";
}

if($movieRuntimeToggler)    {

    $movieRuntimeToggler.addEventListener('click', function(event)   {
    let movieRuntime = $movieRuntime.dataset.runtime;
    let returnVal;

    if(isMinutes)   {
        returnVal = parseRuntime(movieRuntime);
    }   else    {
        movieRuntime + ' min.';
    }

    returnVal = parseRuntime(movieRuntime);

    isMinutes = !isMinutes;
    $movieRuntime.innerHTML = returnVal;

    });
}

let $timeOnSite = document.getElementById('time-on-site');
let timeCounter = 0;
window.setInterval(function(){
    timeCounter++;
    $timeOnSite.innerText = timeCounter;

    if(timeCounter === 60)   {
        alert('Salut! Am observat ca stai cam mult pe site. Ai intrebari? Contacteaza-ne la...');
    }
}, 1000);