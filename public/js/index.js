const errorSection = document.querySelector(".errors");

if(errorSection.firstChild){
    setTimeout(() => {
        errorSection.style = `top: ${-errorSection.offsetHeight}`;
        setTimeout(() => {
            while(errorSection.firstChild)
            {
                errorSection.removeChild(errorSection.firstChild);
            }
        }, 1000)
    }, 10000);
}

