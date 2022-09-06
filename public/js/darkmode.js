// Darkmode automatiquement activé de 18h00 à 8h00 du matin

function darkMode() {

    const date = new Date()
    const hour = date.getHours()

    if(hour > 8 || hour < 18) {
       
        document.documentElement.style.setProperty('--police',
        '#333')
        document.documentElement.style.setProperty('--fond',
        '#fff')
    } else {
        document.documentElement.style.setProperty('--police',
        '#fff')
        document.documentElement.style.setProperty('--fond',
        '#333')
        document.documentElement.style.setProperty('--bgsize',
        'none')
        document.documentElement.style.setProperty('--bgimage',
        'none')
        document.documentElement.style.setProperty('--bgimage',
        'none')
    }
}

darkMode()

