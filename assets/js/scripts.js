"use strict";


$(window).on("load", function() {

	// AOS [Start]
	AOS.init();
	// AOS [End]
	
});

$(document).ready(function() {

	// Body Class [Start]
	$(window).on("scroll", function() {
		var windowScroll = $(window).scrollTop();
		if(windowScroll >= 10) {
			$("body").addClass("moved");
		}
		else {
			$("body").removeClass("moved");
		}
	});
	// Body Class [End]

    // Footer [Start]
    function sideBarPadding() {
    	var headerHeight = $("header").height() + 50;
    	$(".sidebar").css("padding-top",headerHeight);
    }

    sideBarPadding();
    window.onresize = function() {
    	sideBarPadding();
    }
    // Footer [End]

    // Login [Start]
	$("#loginForm").validate({
		rules: {
			username: {
				required: true,
				minlength: 2
			},
			password: {
				required: true,
				minlength: 2
			},
		},
		messages: {
			username: {
				required: "Please enter a username",
				minlength: "Your username must consist of at least 2 characters"
			},
			password: {
				required: "Please provide a password",
				minlength: "Your password must be at least 2 characters long"
			}
		}
	});
	// Login [End]

	// CSV Import [Start]
	$("#csvUpload").validate({
		rules: {
			file: {
				required: true,
				extension: "csv"
			}
		},
		messages: {
			file: {
				required: "Please add CSV file",
				minlength: "A file is must to be uploaded"
			}
		}
	});
	// CSV Import [End]

});