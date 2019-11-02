
$('.aboutBtn').on('click', function() {
	window.location.href = "about";
})
$('.coursesBtn').on('click', function() {
	window.location.href = "courses";
})
// $('.missionBtn').on('click', function(){
// 	window.location.href = "about#mission";
// 	$(document).scrollTop(900);
// })
// $('.visionBtn').on('click', function(){
// 	window.location.href = "about#vision";
// 	$(document).scrollTop(1300);
// })
// $('.historyBtn').on('click', function(){
// 	window.location.href = "about#history";
// 	$(document).scrollTop(650);
// })

// $('.abmBtn').on('click', function() {
// 	window.location.href = "courses#abm";
// 	$(document).scrollTop(650);
// })
// $('.humssBtn').on('click', function() {
// 	window.location.href = "courses#humss";
// 	$(document).scrollTop(1350);
// })
// $('.stemBtn').on('click', function() {
// 	window.location.href = "courses#stem";
// 	$(document).scrollTop(1900);
// })
if (window.location.href.includes("vision")) {
	$(document).scrollTop(1300);
}
if (window.location.href.includes("mission")) {
	$(document).scrollTop(900);
}
if (window.location.href.includes("history")) {
	$(document).scrollTop(650);
}
if (window.location.href.includes("abm")) {
	$(document).scrollTop(650);
}
if (window.location.href.includes("humss")) {
	$(document).scrollTop(1350);
}
if (window.location.href.includes("stem")) {
	$(document).scrollTop(1900);
}



// FOR LOGIN FORM MODAL

$('.openLoginForm').click(function(){
	$('.username').val("");
	$('.password').val("");
	$('.loginwarning').hide();
})

