//Dark mode

const icon = document.getElementById("icon");

if(localStorage.getItem("theme") == null) {
	localStorage.setItem("theme", "light");
}

let localData = localStorage.getItem("theme");

if(localData == "light") {
	icon.src = "/images/moon.png";
	document.documentElement.style.setProperty('--police','#333');
	document.documentElement.style.setProperty('--fond','none');
	document.documentElement.style.setProperty('--bgsize','21px 21px');
    document.documentElement.style.setProperty('--bgimage','repeating-radial-gradient(circle at center center, transparent 0px, transparent 13px,rgba(0,0,0,0.03) 13px, rgba(0,0,0,0.03) 24px,transparent 24px, transparent 62px,rgba(0,0,0,0.03) 62px, rgba(0,0,0,0.03) 96px),repeating-radial-gradient(circle at center center, rgb(255,255,255) 0px, rgb(255,255,255) 14px,rgb(255,255,255) 14px, rgb(255,255,255) 18px,rgb(255,255,255) 18px, rgb(255,255,255) 28px,rgb(255,255,255) 28px, rgb(255,255,255) 32px)');
	
	document.body.classList.remove("dark-theme");
	
	} else if (localData == "dark") {
		icon.src = "/images/sun.png";
		document.documentElement.style.setProperty('--police','#fff');
		document.documentElement.style.setProperty('--fond','#333');
		document.documentElement.style.setProperty('--bgsize','none');
		document.documentElement.style.setProperty('--bgimage','none');
		document.body.classList.add("dark-theme");
	}

icon.onclick = function() {
	document.body.classList.toggle("dark-theme");
	if(document.body.classList.contains("dark-theme")) {
		icon.src="/images/sun.png";
		document.documentElement.style.setProperty('--police','#fff');
        document.documentElement.style.setProperty('--fond','#333');
        document.documentElement.style.setProperty('--bgsize','none');
        document.documentElement.style.setProperty('--bgimage','none');
		localStorage.setItem("theme", "dark");
	} else {
		icon.src="/images/moon.png";
		document.documentElement.style.setProperty('--police','#333');
		document.documentElement.style.setProperty('--fond','none');
		document.documentElement.style.setProperty('--bgsize','21px 21px');
        document.documentElement.style.setProperty('--bgimage','repeating-radial-gradient(circle at center center, transparent 0px, transparent 13px,rgba(0,0,0,0.03) 13px, rgba(0,0,0,0.03) 24px,transparent 24px, transparent 62px,rgba(0,0,0,0.03) 62px, rgba(0,0,0,0.03) 96px),repeating-radial-gradient(circle at center center, rgb(255,255,255) 0px, rgb(255,255,255) 14px,rgb(255,255,255) 14px, rgb(255,255,255) 18px,rgb(255,255,255) 18px, rgb(255,255,255) 28px,rgb(255,255,255) 28px, rgb(255,255,255) 32px)');
		localStorage.setItem("theme", "light");
	}
}



// const icon = document.getElementById("icon");

// icon.onclick = function() {
// 	document.body.classList.toggle("dark-theme");
// 	if(document.body.classList.contains("dark-theme")) {
// 		icon.src="/images/sun.png";
// 		localStorage.setItem("theme", "dark");
// 		document.documentElement.style.setProperty('--police','#fff')
//         document.documentElement.style.setProperty('--fond','#333')
//         document.documentElement.style.setProperty('--bgsize','none')
//         document.documentElement.style.setProperty('--bgimage','none')
// 	} else {
// 		icon.src="/images/moon.png";
// 		document.documentElement.style.setProperty('--police','#333')
// 		document.documentElement.style.setProperty('--fond','none')
// 		document.documentElement.style.setProperty('--bgsize','21px 21px')
//         document.documentElement.style.setProperty('--bgimage','repeating-radial-gradient(circle at center center, transparent 0px, transparent 13px,rgba(0,0,0,0.03) 13px, rgba(0,0,0,0.03) 24px,transparent 24px, transparent 62px,rgba(0,0,0,0.03) 62px, rgba(0,0,0,0.03) 96px),repeating-radial-gradient(circle at center center, rgb(255,255,255) 0px, rgb(255,255,255) 14px,rgb(255,255,255) 14px, rgb(255,255,255) 18px,rgb(255,255,255) 18px, rgb(255,255,255) 28px,rgb(255,255,255) 28px, rgb(255,255,255) 32px)')
// 	}
// }


