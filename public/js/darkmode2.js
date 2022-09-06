// darkMode()

// const checkbox = document.getElementById('checkbox');

// checkbox.addEventListener('change', () => {
// 	document.body.classList.toggle('dark');
// });


const icon = document.getElementById("icon");

icon.onclick = function() {
	document.body.classList.toggle("dark-theme");
	if(document.body.classList.contains("dark-theme")) {
		icon.src="/images/sun.png";
		document.documentElement.style.setProperty('--police','#fff')
        document.documentElement.style.setProperty('--fond','#333')
        document.documentElement.style.setProperty('--bgsize','none')
        document.documentElement.style.setProperty('--bgimage','none')
	} else {
		icon.src="/images/moon.png";
		document.documentElement.style.setProperty('--police','#333')
		document.documentElement.style.setProperty('--bgsize','none')
        document.documentElement.style.setProperty('--bgimage','none')
	}
}
