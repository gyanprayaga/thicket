/* scripts for Thicket */

// remove touch delay
document.addEventListener("touchstart", function(){}, true);

logged_in = false;
// initial states

var thicketURL = $('#thicket_site_identifier').val();
var thicketHeight = window.innerHeight;
var thicketChromeHeight = 138;
var thicketTime = new Date().getTime();


$(document).ready(function() {
    $.post(thicketURL+"/includes/engine/modules/session_validate.php", {
        token: 'OtydHVLTLXq3FMCLFbEf'
    }).done(function(data) {
        if (data != 'false') {
            logged_in = true;
            user_id = data;
            $('.show-logged-in').show();
        }
        padlock(".create_video",
            "Sorry, but you need to <a href='"+thicketURL+"/login'>login</a> or <a href='"+thicketURL+"/login#register'>register</a> to publish your own video."
        );
        padlock(".content__comments__content", "<a href='"+thicketURL+"/login'>Login</a> or <a href='"+thicketURL+"/login#register'>register</a> to comment on student creations.");
    });
})

// logged in data
var td_name = $('#thicketdata-name').val();
var td_username = $('#thicketdata-username').val();
var td_uid = $('#thicketdata-uid').val();

function padlock(elem, message) {
    if (logged_in) {} else {
        $(elem).html("<p class='padlocked'>" + message + "</p>");
    }
}

$(function(){ 
    var sortedList = $('.primary-content-box#main li').toArray().sort(function(lhs, rhs){ 
      return parseInt($(rhs).children(".upvote").text(),10) - parseInt($(lhs).children(".upvote").text(),10); 
   });
    $(".primary-content-box#main").html(sortedList).show();
// UPVOTING
$('.upvote').on('click', function() {
        var elem = $(this);
        if (logged_in && (!$(this).hasClass('voted'))) {
            var post_id = $(this).attr('id');
            $.post(thicketURL+"/includes/engine/modules/upvote.php", {
                token: 'OtydHVLTLXq3FMCLFbEf',
                user_id: user_id,
                post_id: post_id
            }).done(function(data) {
                if (data != 'false') {
                    elem.addClass('voted');
                    if (data != 'same') {
                        elem.text(data)
                    }
                } else {
                    t_alert('Something went wrong.')
                }
            });
        } else if ($(this).hasClass('voted')) {
            t_alert('You already voted for this post')
        } else {
            t_alert('You need to login to upvote a post');
        }
    })
    // VIDEO POPUPS
$('.content_trigger').on('click', function() {
    var url = $(this).attr('href');
    $("#video-modal").fadeIn('medium');
    $("#bg_mask").show();
    $("#modal_close_btn").show();
    var video_id = $(this).parent().find('.url_id_holder').val();
    $("#video-modal").html(
        "<iframe width='560' height='315' src='https://www.youtube.com/embed/" +
        video_id +
        "?autoplay=true' frameborder='0' allowfullscreen></iframe>"
    )
    return false;
});

}); 


(function($) {
    $.fn.hasScrollBar = function() {
        return this.get(0).scrollHeight > this.height();
    }
})(jQuery);

function t_alert(message, color) {
        $("#bg_mask").fadeIn('fast');
        $("#modal_close_btn").fadeIn('fast');
        $("body").prepend("<div class='thicket-alert'>" + message + "</div>");
        $('.thicket-alert').delay(100).fadeIn('fast');
    }
    // SEARCH BAR

function highlightSearch(query) {
    var html = $('.primary-content-box').html();
    $('.primary-content-box h3').wrapInTag({
        tag: 'span class=search_highlight',
        words: [query]
    });
}

$.fn.wrapInTag = function(opts) {
    var tag = opts.tag || 'strong',
        words = opts.words || [],
        regex = RegExp(words.join('|'), 'gi'),
        replacement = '<' + tag + '>$&</' + tag + '>';
    return this.html(function() {
        return $(this).text().replace(regex, replacement);
    });
};

$("#modal_close_btn, #bg_mask").on('click', function() {
    $("#video-modal").html('');
    $("#video-modal").hide();
    $(".thicket-alert").fadeOut('medium').remove(); // in case there is an alert popup
    $("#bg_mask").fadeOut('medium');
    $("#modal_close_btn").hide();
});
// EXPLORE POPUP
$(".explore-trigger").on('click', function() {
    if (!$(this).hasClass('clicked')) {
    	var explore_content = "<a class='explore-popup__subjects__subject' href='#'>Link</a>";
    	explore_content += "<a class='explore-popup__subjects__subject' href='#'>Another link</a>";
    	explore_content += "<a class='explore-popup__subjects__subject' href='#'>Final link</a>";
    	explore_content += "<form method='get' action='"+thicketURL+"/search'><input type='search' class='explore-popup__search' placeholder='Search videos' name='q' results='5'></form>";
        $(".header__nav--left").append(
            "<div id='explore-popup'><h2 class='explore-popup__header'>Cool dropdown</h2><p class='explore-popup__lead'>Fancy dropdown with links and search form</p><div class='explore-popup__subjects'>"+explore_content+"</div>"
        );
        $(this).toggleClass('clicked');
    } else {
        $('#explore-popup').remove();
        $(this).toggleClass('clicked');
    }
});

// CHAT FUNCTIONALITY

$('.content__sidebar__close').on('click',function() {
	$('.content__sidebar').addClass('minimized');
	$('.open-sidebar').fadeIn('medium');
});

// getting the right chat data height
var thicketSidebarDataHeight = thicketHeight - thicketChromeHeight;
if (thicketHeight) {
	$('.content__sidebar__data').css('height',thicketSidebarDataHeight+'px');
}

$('.open-sidebar').text('Open chat'); // text for sidebar opener

$('.open-sidebar').on('click',function() {
	$(this).fadeOut('fast');
	$('.content__sidebar').removeClass('minimized');
	$('.content__sidebar__input').focus();
});

var first_message = false;

if (td_uid) {
$('.content__sidebar__data').scrollTop($('.content__sidebar__data')[0].scrollHeight);
	setInterval(function() {	      
		// scrolling to bottom
		$('.content__sidebar__data').scrollTop($('.content__sidebar__data')[0].scrollHeight);

	    // fetch messages
	   $.get( thicketURL+"/includes/engine/modules/chat_get.php", { time:thicketTime }, function( data ) {
		  $('.content__sidebar__data').html(data);
		});      

		$('.content__sidebar__data').css('opacity','1');
		

	}, 500);
}

// message handling
$('.content__sidebar__input').keypress(function (e) {
  var elem = $(this);
  if (e.which == 13) {
    var text = elem.val().replace(/(<([^>]+)>)/ig,"");

    // check if passes replace()
    if ($.trim(text) == '' || elem.val().indexOf('<!--') !== -1) {
	    t_alert('Invalid message text. Please try again.','black');
		elem.val('');
		return false;
    }
    else {
	    var short_name = td_name.substring(0, td_name.indexOf(' '));
	    var current_time = (new Date).getTime();

		 $.post(thicketURL+'/includes/engine/modules/chat_post.php',
		  {
		    sender:short_name,
		    user_id:td_uid,
		    content:text,
		    location:'1',
		    time:current_time
		  }).done(function(data) {
                if (data == 'success') {
                    
                } else {
                    t_alert('The message could not be sent due to a server error.')
                }
            });

		if (first_message) {
			short_name = '';
		}
	    //$('.content__sidebar__data').append('<span class=chat__message><span class=chat__message__sender>'+short_name+'</span><span class=chat__message__text>'+text+'</span></span>');

		// setting variables & deleting textarea data
	    first_message = true;
		elem.val('');
	    return false;    //<---- Add this line
	}
  }
});

// GOOGLE LOGIN
function onSignIn(googleUser) {
        $('#ga_login').delay(1000).fadeOut();
        var profile = googleUser.getBasicProfile();
        $('#username').val(profile.getEmail())
    }
    // REGISTER VALIDATION & SUBMISSION
var register = false;
$(".login-intent-switcher").on('click', function() {
    register = true;
    $('.content__main--right .content__main__lead').html(
        "<form method='post' action='"+thicketURL+"/includes/engine/modules/form_process.php' class='login-form signup-form' id='signup-form' novalidate><p style='color:red;font-weight:400;font-size:1em' id='form_error' class='hidden'></p> <p class='content__main__paragraph'> <label for='name_s' class='login-form__label'>Name</label> <input id='name_s' name='name_s' class='login-form__input' style='width:220px' required> </p> <p class='content__main__paragraph'> <label for='username_s' class='login-form__label'>Email address</label> <input id='username_s' name='username_s' class='login-form__input' type='email' style='width:220px' required> </p> <p class='content__main__paragraph'> <label for='password_s' class='login-form__label'>Password</label> <input id='password_s' name='password_s' style='width:220px' class='login-form__input' type='password' required> <label for='password_cs' class='login-form__label'>Confirm password</label> <input id='password_cs' name='password_cs' style='width:220px' class='login-form__input' type='password' required> <input type='hidden' name='csrf_token' value=''> </p> <input class='login-form__submit' id='signup_submit' type='submit' value='Register'></form><p class='hidden' id='submit_result'></p>"
    );
    $('#name_s').focus();
    $('#ga_signup_holder').show();
    $('.content__main--left').css('opacity', '.3');
    $('.content__main--left .login-form__submit').css('pointerEvents',
        'none');
    $('.content__main--left').click(function() {
        $(this).css('opacity', '1')
        $(this).css('pointerEvents', 'all')
        $('.content__main--left .login-form__submit').css(
            'pointerEvents', 'all');
    });
    $("#signup-form").on('submit', function() {
        var name = $('#name_s').val();
        var email = $('#username_s').val();
        var password = $('#password_s').val();
        var password_confirm = $('#password_cs').val();
        if (name && email && password && password_confirm) {
            var nameEx = /^[a-zA-Z ]+$/;
            var passEx = /^(?=.*\d)(?=.*[a-zA-Z]).{6,16}$/;
            if (password != password_confirm) {
                $(document).scrollTop(0);
                $('#form_error').fadeIn().text(
                    'The passwords do not match.');
                blink('#form_error')
            } else if (!isValidEmailAddress(email)) {
                $('#form_error').fadeIn().text(
                    'Please enter a valid email address.');
                blink('#form_error')
            } else if (!nameEx.test(name)) {
                $('#form_error').fadeIn().text(
                    'Your name can only have letters.');
                blink('#form_error');
            } else if (!passEx.test(password)) {
                $('#form_error').fadeIn().text(
                    'Your password needs to be between 6 and 16 characters and have at least one number.'
                );
                blink('#form_error');
            } else {
                $('#form_error').fadeOut();
                // creating the new user
                $.post(
                    thicketURL+"/includes/engine/modules/form_process_register.php", {
                        name: name,
                        username: email,
                        password: password
                    }).done(function(data) {
                    if (data == 'success') {
                        $(
                            '#signup-form, #ga_signup_holder'
                        ).fadeOut('fast');
                        $('#submit_result').fadeIn().html(
                            'Welcome to Thicket, <b class=regular>' +
                            name +
                            '</b>! You can now login to your account.'
                        )
                    } else if (data == 'user exists') {
                        $('#submit_result').fadeIn().text(
                            'There is a user with that email already.'
                        );
                    } else {
                        $('#submit_result').fadeIn().text(
                            'The form could not be submitted. Please try again.'
                        )
                    }
                });
            }
        } else {
            $(document).scrollTop(0);
            $('#form_error').fadeIn().text(
                'All fields are required to register.');
        }
        // comment out when debugging php
        return false;
    });
});

function blink(elem) {
    $(elem).animate({
        opacity: 0
    }, 200, "linear", function() {
        $(this).animate({
            opacity: 1
        }, 200);
    });
}

function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(
        /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i
    );
    return pattern.test(emailAddress);
}

function onRegister(googleUser) {
    if (register) {
        $('#ga_signup').hide();
        var profile = googleUser.getBasicProfile();
        $('#name_s').val(profile.getName())
        $('#username_s').val(profile.getEmail())
    }
}

// admin dashboard 

function appendDelete() {
	$('.rest_of_content').each(function() {
	var id = $(this).attr('id');
	$(this).prepend('<span class="delete_post_admin" id="'+id+'">Remove</span>');
	});
	$('.delete_post_admin').on('click',function() {
		var elem = $(this);
		var id = $(this).attr('id');
				
		// delete post
		$.post(thicketURL+"/includes/engine/modules/delete_post.php", {
			post_id: id
		}).done(function(data) {
			if (data != 'false') {
				t_alert('The post was successfully deleted.');
				elem.parent().fadeOut('fast');
			}
		});			
	});

}

$('.admin_view_switcher').on('click',function() {
	var title = $(this).attr('id');
	if (!$(this).hasClass('active')) {
		$('.active').removeClass('active');
		$(this).addClass('active');
	}
	$('.admin-screen').hide();
	$('#'+title+'_screen').show();	
});

$('#open-structure').on('click',function() {
	$('.thicket-case, .aligned-cta').hide();
	$('.th_builder input[type=text], .th_builder textarea').val('');
	$('.th_builder').fadeIn();
});


// when going to production, use: http://jscompress.com/ 