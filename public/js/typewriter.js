const adminText = document.getElementById('admin-type-writer');

new Typewriter(adminText, {
    deleteSpeed: 30,
    loop: true
})
.changeDelay(80)
.typeString('Gérez les ')
.pauseFor(600)
.typeString('<span style="color:#008080; font-weight: 600">Techniciens<span>')
.deleteChars(11)
.pauseFor(800)
.typeString('<span style="color:#853f85; font-weight: 600">Partenaires<span>')
.deleteChars(11)
.pauseFor(800)
.typeString('<span style="color:#856a57; font-weight: 600">Structures<span>')
.deleteChars(10)
.pauseFor(800)
.typeString('<span style="color:#81a1ba; font-weight: 600">Modules<span>')
.pauseFor(5000)
.start()

techniciens
partenaires
structures
modules 
