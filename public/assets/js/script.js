// // Home page Script 
// function openPage(pageName, elmnt) {
//     var i, tabcontent, tablinks;
//     tabcontent = document.getElementsByClassName("tabcontent");
//     for (i = 0; i < tabcontent.length; i++) {
//         tabcontent[i].style.display = "none";
//     }
//     tablinks = document.getElementsByClassName("tablink");
//     for (i = 0; i < tablinks.length; i++) {
//         tablinks[i].style.backgroundColor = "";
//     }

//     document.getElementById(pageName).style.display = "block";
//     elmnt.style.backgroundColor = "var(--font-color)";
// }

// // Get the element with id="defaultOpen" and click on it
// document.getElementById("defaultOpen").click();


$('.datepicker').datepicker({
    format: 'mm/dd/yyyy',
    // startDate: '-3d'
});

$('.timepicker').timepicker({
    timeFormat: 'h:mm p',
    interval: 60,
    minTime: '10',
    maxTime: '6:00pm',
    defaultTime: '11',
    startTime: '10:00',
    dynamic: false,
    dropdown: true,
    scrollbar: true
});
// Home