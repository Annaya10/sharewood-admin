var optsuccess = {
    "closeButton": true,
    "debug": false,
    "positionClass": "toast-bottom-right",
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "5000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "slideDown",
    "hideMethod": "slideUp"
};

var opterror = {
    "closeButton": true,
    "debug": false,
    "positionClass": "toast-bottom-right",
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "5000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "slideDown",
    "hideMethod": "slideUp"
};

function shareFacebook(url, title) {
    window.open('https://www.facebook.com/share.php?u=' + url + '&title=' + title, 'sharer', 'toolbar=0,status=0,width=548,height=325,top=170,left=400');
}
function shareLinkedin(url, title, text, site_name) {
    window.open('https://www.linkedin.com/shareArticle?mini=true&url=' + url + '&title=' + title + '&summary=' + text + '&source=' + site_name);
}
function shareTwitter(url, title) {
    window.open('https://twitter.com/intent/tweet?text=' + title + '&url=' + url);
}
function shareGoogle(url, title) {
    window.open('https://plus.google.com/share?url=' + url + '&title=' + title, 'sharer', 'toolbar=0,status=0,width=548,height=325,top=170,left=400');
}
function sharePinterest(url, image, title) {
    window.open('https://pinterest.com/pin/create/button/?url=' + url + '&media=' + image + '&description=' + title, 'sharer', 'toolbar=0,status=0,width=548,height=325,top=170,left=400');
}
function shareWhatsapp(title) {
    document.location = 'whatsapp://send?text=' + title;
}
$(document).ready(function () {



    if ((typeof recaptcha !== 'undefined') && recaptcha) {
        var frmAjax = '';
        $(document).on('click', '.frmAjax button[type="submit"]', function (e) {
            e.preventDefault();
            frmAjax = $(this).parents('.frmAjax');

            if (frmAjax.valid()) {
                if ($("#g-recaptcha-response").val()) {
                    frmAjax.submit();
                }
                else
                    grecaptcha.execute();
            }
        })
        onSubmit = function (token) {
            frmAjax.submit();
        }
    } else {
        $(document).on('click', '.frmAjax button[type="submit"]', function (e) {
            let frm = $(this).parents('.frmAjax');
            $(frm).validate({
                errorPlacement: function () {
                    return false;  // suppresses error message text
                }
            });
        })
    }




    $(document).on('submit', '.frmAjax', function (e) {
        e.preventDefault();
        needToConfirm = true;
        var frmbtn = $(this).find("button[type='submit']");
        // console.log(frmbtn);
        var frmIcon = frmbtn.find("i");
        frmIcon.removeClass("hidden");
        frmbtn.attr("disabled", true);
        // console.log(frmIcon); return;
        var frmMsg = $(this).find("div.alertMsg:first");
        var frm = this;

        frmMsg.hide();
        $.ajax({
            url: $(this).attr('action'),
            data: new FormData(frm),
            processData: false,
            contentType: false,
            dataType: 'JSON',
            method: 'POST',

            error: function (rs) {
                console.log(rs);
            },
            success: function (rs) {
                // console.log(rs); return;
                if (rs.session_login === 1) {
                    localStorage.setItem("session_arr", rs.session_arr);
                }
                if (rs.status == 1) {
                    if (rs.formSuccess == 1) {
                        frm.reset();
                        $(".popup").fadeOut();
                        $("body").removeClass("flow");
                        // $(this).parents('.popup').find('form').attr('action', '');
                        setTimeout(function () {
                            location.reload();
                        }, 1000)
                    }
                    toastr.success(rs.msg, '', optsuccess);
                    setTimeout(function () {
                        frm.reset();
                        frmIcon.addClass("hidden");
                        if (rs.redirect_url) {
                            window.location.href = rs.redirect_url;
                        } else {
                            frmbtn.attr("disabled", false);
                        }

                    }, 3000);
                } else {
                    toastr.error(rs.msg, opterror);
                    setTimeout(function () {
                        if (rs.hide_msg)
                            frmMsg.slideUp(500);
                        frmbtn.attr("disabled", false);
                        frmIcon.addClass("hidden");
                        if (rs.redirect_url)
                            window.location.href = rs.redirect_url;
                    }, 3000);
                }
            },
            complete: function (rs) {
                needToConfirm = false;
            }
        });
    });

    $("#price").ionRangeSlider({
        hide_min_max: true,
        hide_from_to: true,
        min: 1,
        max: 500,
        from: 40,
        to: 480,
        type: 'double',
        prettify: function (num) {
            return '$'+num;
        },
        onFinish: function (num){
            var min_val = num.from;
            var max_val = num.to;

            $("#min_cost").val(min_val);
            $("#max_cost").val(max_val);

            var cost = [min_val, max_val];

            console.log(cost);
            filter_products();

            return '$' + num;



        },
        // prefix: "$",
        grid: true
    });


    
    $('.common_cat_selector').click(function () {
        filter_products();
    });


    function filter_products() {
       
        $('#sort_products').html('<div class="lds-ring"><i class="fa fa-spinner fa-spin"></i><div>');
        // alert('store_product()');
        let category = get_filter('category');
        // let level = get_filter('level');
        // let language = get_filter('language');
        var min_cost = $("#min_cost").val();
        var max_cost = $("#max_cost").val();

        // alert(category);
        $.ajax({
            method: 'POST',
            dataType: 'JSON',
            url: base_url + 'Products/filter_products',
            data: { min_cost: min_cost, max_cost: max_cost, category: category},
            error: function (rs) {
                console.log(rs);
            },
            success: function (data) {
    
                $('#sort_products').html(data.html);
                // if (data.total >= 6) {
                //     $("#loadMoreTopics").show();
                // }
                // $('.rateYo').rateYo({
                //     rating: 4.0,
                //     fullStar: true,
                //     readOnly: true,
                //     normalFill: '#ddd',
                //     ratedFill: '#ffc000',
                //     starWidth: '14px',
                //     spacing: '2px'
                // });
                // $(".filters").removeClass("active");
            }
    
        });
    }
    
    
    function get_filter(class_name) {
            var filter = [];
            $('.' + class_name + ':checked').each(function () {
                filter.push($(this).val());
            });
            return filter;
        }
    //////////////////////////////////DREAM CLOSET CONFG////////////////////////////////////////////////

    $("#price_dc").ionRangeSlider({
        hide_min_max: true,
        hide_from_to: true,
        min: 1,
        max: 500,
        from: 40,
        to: 480,
        type: 'double',
        prettify: function (num) {
            return '$'+num;
        },
        onFinish: function (num){
            var min_val_dc = num.from;
            var max_val_dc = num.to;

            $("#min_cost_dc").val(min_val_dc);
            $("#max_cost_dc").val(max_val_dc);

            var cost = [min_val_dc, max_val_dc];

            console.log(cost);
            filter_dream_closet();

            return '$' + num;



        },
        // prefix: "$",
        grid: true
    });


    
    $('.common_brand_selector').click(function () {
        filter_dream_closet();
    });


    function filter_dream_closet() {
       
        $('#sort_dream_closet').html('<div class="lds-ring"><i class="fa fa-spinner fa-spin"></i><div>');
        // alert('store_product()');
        let brand = get_filter('brand');
        // let level = get_filter('level');
        // let language = get_filter('language');
        var min_cost_dc = $("#min_cost_dc").val();
        var max_cost_dc = $("#max_cost_dc").val();

        // alert(category);
        $.ajax({
            method: 'POST',
            dataType: 'JSON',
            url: base_url + 'Products/filter_dream_closet',
            data: { min_cost_dc: min_cost_dc, max_cost_dc: max_cost_dc, brand: brand},
            error: function (rs) {
                console.log(rs);
            },
            success: function (data) {
    
                $('#sort_dream_closet').html(data.html);
                // if (data.total >= 6) {
                //     $("#loadMoreTopics").show();
                // }
                // $('.rateYo').rateYo({
                //     rating: 4.0,
                //     fullStar: true,
                //     readOnly: true,
                //     normalFill: '#ddd',
                //     ratedFill: '#ffc000',
                //     starWidth: '14px',
                //     spacing: '2px'
                // });
                // $(".filters").removeClass("active");
            }
    
        });
    }



    //////////////////////////////////////////////////////////////////////////////////////////////////////////
        $(".qtypluscart").click(function (e) {
            e.preventDefault();
            $(this).attr("disabled", true);
            var parnt = $(this).parent().children(".qty");
            var currentVal = parnt.val();
            if (!isNaN(currentVal)) {
              parnt.val(parseInt(currentVal) + 1);
            } else {
              parnt.val(0);
            }
            $(this).closest(".cart_form").submit();
          });
          // This button will decrement the value till 0
          $(".qtyminuscart").click(function (e) {
            e.preventDefault();
            $(this).attr("disabled", true);
            var parnt = $(this).parent().children(".qty");
            var currentVal = parnt.val();
            if (!isNaN(currentVal) && currentVal > 1) {
              parnt.val(parseInt(currentVal) - 1);
            } else {
              parnt.val(1);
            }
            $(this).closest(".cart_form").submit();
          });
    

////////////////////////////////////////////////////////////////////////////////////

$(document).ready(function () {
    $("#same_address").on("click", function () {
        console.log("hi")
        if (this.checked) {
            $("#ship_fname").val($("#fname").val());
            $("#ship_lname").val($("#lname").val());
            $("#ship_email").val($("#email").val());
            $("#ship_phone").val($("#phone").val());
            $("#ship_city").val($("#city").val());
            $("#ship_zip").val($("#postal_code").val());
            $("#ship_country").val($("#country").val());
            $("#ship_address").val($("#address").val());
            $("#ship_state").html($("#state").html());
            // $("#chk_ship_state").val($("#chk_state").val());
        }
        else {
            $("#ship_fname").val('');
            $("#ship_lname").val('');
            $("#ship_email").val('');
            $("#ship_phone").val('');
            $("#ship_city").val('');
            $("#ship_zip").val('');
            $("#ship_country").val('');
            $("#ship_address").html('');
            $("#ship_state").val('');
        }
    });
});


 

$(document).on('change', '#country', function () {
    let country_id = $(this).val();
    $.ajax({
        url: base_url + 'Ajax/get_states/' + country_id,
        dataType: 'JSON',
        method: 'GET',
        success: function (rs) {
            if (rs != '') {
                $("#state").html(rs);
            }

        },
        error: function (rs) {
            console.log(rs);
        },
        complete: function (rs) {
            // console.log(rs);
        }
    })
});


$(document).on('change', '#ship_country', function () {
    let country_id = $(this).val();
    $.ajax({
        url: base_url + 'Ajax/get_states/' + country_id,
        dataType: 'JSON',
        method: 'GET',
        success: function (rs) {
            if (rs != '') {
                $("#ship_state").html(rs);
            }

        },
        error: function (rs) {
            console.log(rs);
        },
        complete: function (rs) {
            // console.log(rs);
        }
    })
});





});



$(document).on("click", ".next_btn", function (e) {
	e.preventDefault();
	// alert("hi");
	var curntField = $(this).parents("fieldset");
	// alert(curntField);
	var form = $(this).parents("form");
	// alert(form);
	// console.log();
	form.validate({
		rules: {
			first_name: {
				required: true,
			},
			middle_name: {
				required: true,
			},
			last_name: {
				required: true,
			},
			user_email: {
				required: true,
			},
			date_of_application: {
				required: true,
			},
			street_address: {
				required: true,
			},
			zip: {
				required: true,
			},
			cell_phone: {
				required: true,
			},
			applicant_city: {
				required: true,
			},
			// ////////next page
			high_school_name: {
				required: true,
			},
			high_school_city: {
				required: true,
			},
			school_from: {
				required: true,
			},
			school_to: {
				required: true,
			},
			graduated_school: {
				required: true,
			},
			college_name: {
				required: true,
			},
			college_city: {
				required: true,
			},
			college_from: {
				required: true,
			},
			college_to: {
				required: true,
			},
			college_graduated: {
				required: true,
			},
			history_from: {
				required: true,
			},
			history_to: {
				required: true,
			},
			company_name: {
				required: true,
			},
			telephone: {
				required: true,
			},
			starting_salary: {
				required: true,
			},
			ending_salary: {
				required: true,
			},
			supervisor: {
				required: true,
			},
			type_business: {
				required: true,
			},
			may_we_contact: {
				required: true,
			},
		},
		errorPlacement: function () {
			return false; // suppresses error message text
		},
	});
	if (form.valid() === true) {
		var nextField = curntField.next("fieldset");
		$(".option_lbl >ul>li")
			.eq($("fieldset").index(nextField))
			.addClass("active");
		curntField.hide();
		nextField.show();

		$("html, body").animate(
			{
				scrollTop: nextField.offset().top - 300,
			},
			100
		);
	} else {
		$("html, body").animate(
			{
				scrollTop: $(".error").offset().top - 300,
			},
			100
		);
	}
});
