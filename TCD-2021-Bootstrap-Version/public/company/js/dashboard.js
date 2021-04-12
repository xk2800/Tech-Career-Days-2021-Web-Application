const ALPHAORDER = document.querySelector("#alphabatical-order");
const SUBDATE = document.querySelector("#submission-date");

const FIELDICON1 = document.querySelector("#field-icon1");
const FIELDICON2 = document.querySelector("#field-icon2");

ALPHAORDER.addEventListener("click", function (e) {

    if($("input[name='sort-type']:checked").val() == "alphabatical-order") {

        FIELDICON1.classList.toggle("active");
        FIELDICON2.classList.remove("active");

    }

});

SUBDATE.addEventListener("click", function (e) {

    if($("input[name='sort-type']:checked").val() == "submission-date") {

        FIELDICON2.classList.toggle("active");
        FIELDICON1.classList.remove("active");
        
    }

});

function tableLoaderOff(){

    var loader = document.querySelector("#table-body");
    loader.classList.remove("active");

    var loaderOnOff = document.querySelector("#table-loader");
    loaderOnOff.classList.remove("active");

}

function toggleLoader(){

    var loader = document.querySelector("#table-body");
    loader.classList.add("active");

    var loaderOnOff = document.querySelector("#table-loader");
    loaderOnOff.classList.add("active");

}

function toggle() {

    var blur = document.getElementById('background-dimmed');
    blur.classList.toggle('active');

    var popup = document.getElementById('popup');
    popup.classList.toggle('active');

    var loader = document.querySelector("#table-body");
    loader.classList.add("active");

}

function toggleSearch() {

    var blur = document.getElementById('background-dimmed');
    blur.classList.toggle('active');

    var popupSearch = document.getElementById('popup-search');
    popupSearch.classList.toggle('active');

}

function toggleDownload() {

    var blur = document.getElementById('background-dimmed');
    blur.classList.toggle('active');

    var popupDownload = document.getElementById('popup-download');
    popupDownload.classList.toggle('active');

}

function loadMoreLoading(){

    var loadMoreIcon = document.querySelector(".load-more-icon");
    loadMoreIcon.classList.toggle('active');

}

function calcCheckboxes(){

    var checkboxes = document.getElementsByName('id[]');

    var i = 0 ;

    for (var checkbox of checkboxes) {
        
        if(checkbox.checked){

            i++;

        }
    
    }

    document.querySelector("#selected").innerHTML = i + " Selected";

}

var btn = $('#button');
$(window).scroll(function() {
    
    if($(window).scrollTop() > 40) {

        btn.addClass('show');

    }else{

        btn.removeClass('show');

    }

});

btn.on('click', function(e) {

    e.preventDefault();
    $('html, body').animate({scrollTop:0}, '300');

});

//Preventing <a> from refreshing the page or going on top of the page
$('.load-more').click(function(e) {

    e.preventDefault();

});

$('#save').click(function(e) {

    e.preventDefault();

});

/* $('#download').click(function(e) {

    e.preventDefault();

}); */

$('.filter').click(function(e) {

    e.preventDefault();

});

$('.bulk-download').click(function(e) {

    e.preventDefault();

});

$('#exit-popup').click(function(e) {

    e.preventDefault();

});

// js for loading animation fading out 
$(window).on("load",function(){

    $(".loader-wrapper").fadeOut(500);

});