jQuery(document).ready(function($) {
	$('#register_partner').click(function (e) {
		e.preventDefault();
		let originalButtonText = $('#register_partner').val();
		$('#register_partner').val('Prašau palauk...');
		let formData = new FormData($('#part_frm')[0]);
		formData.append('action', 'register_partner');
		$.ajax({
			url: ajax_object.ajax_url,
			method: 'post',
			data: formData,
			contentType: false,
			processData: false,
			success: function (r) {
				// console.log(r);
				if (r == 'ok') {
					$('#part_frm')[0].reset();
					$('#register_partner').val(originalButtonText);
					// alert('Employee Inserted Successfully');
					Swal.fire({
						icon: 'success',
						title: 'Sėkmingai užregistruokite partnerį'
					})
				} else {
					Swal.fire({
						icon: 'error',
						title: r
					})
				}
			}
		});
	});

	$(document).on('click','#delete-part', function (e) {
		e.preventDefault();
		let dataId = $(this).attr('data-id');
		Swal.fire({
			title: "Ar esi tikras?",
			text: "Negalėsite to grąžinti!",
			icon: "warning",
			showCancelButton: true,
			cancelButtonText: 'Atšaukti',
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Taip, Ištrinkite"
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					url: ajax_object.ajax_url,
					method: 'post',
					data: {
						part_del_id:dataId
					},
					success: function (r) {
						console.log(r);
						if (r === 'ok') {
							Swal.fire({
								icon: 'success',
								title: 'Partneris sėkmingai ištrintas'
							})
						} else {
							Swal.fire({
								icon: 'error',
								title: r
							})
						}
					}
				})
			}
		})
	})
	/**
	 * Update Partner
	 */
	$(document).on('click', '#update_partner', function (e) {
		e.preventDefault();
		let originalBtnText = $(this).val();
		$('#update_partner').val('Prašau palauk...')
		let formData = new FormData($('#part_frm')[0]);
		formData.append('action', 'update_partner');
		$.ajax({
			url: ajax_object.ajax_url,
			method: 'post',
			data: formData,
			contentType: false,
			processData: false,
			success: function (r) {
				console.log(r);
				if (r == 'ok') {
					$('#update_partner').val(originalBtnText);
					Swal.fire({
						icon: 'success',
						title: 'Sėkmingai atnaujintas partneris'
					})
				} else {
					Swal.fire({
						icon: 'error',
						title: r
					})
				}

			}
			
		})
		
	})

	/*Assign accept jquery code*/
	$(document).on('click','#assign_accept', function (e) {
		e.preventDefault();
		let getId = $(this).attr('data-id'),
			partnarId = $(this).attr('partner-id'),
			page_status = $('#hid_status').val();
		console.log(page_status);
		Swal.fire({
			title: "Ar tu tikra?",
			text: "Negalėsite to grąžinti!",
			icon: "warning",
			showCancelButton: true,
			cancelButtonText: 'Atšaukti',
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Taip, priimk"
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					url: ajax_object.ajax_url,
					method: 'POST',
					data: {
						assign_id: getId,
						partnar_id: partnarId,
					},
					success: function (re) {
						try {
							// If re is a string, manually parse it
							var response = typeof re === 'string' ? JSON.parse(re) : re;
							console.log(response); // Check if the parsing was successful

							if (response.r === 'ok') {
								console.log(response.message);
								Swal.fire({
									icon: 'success',
									title: response.message
								});
								// refreshOrderTable();
								setTimeout(function () {
									location.reload();
								}, 1200);
							} else {
								Swal.fire({
									icon: 'error',
									title: response.message
								});
							}
						} catch (e) {
							console.error('Error parsing response:', e);
							Swal.fire({
								icon: 'error',
								title: 'An error occurred while processing your request.'
							});
						}
					}


				})
				
			}
		});
	})

	$(document).on('click', '#assign_decline', function (e) {
		e.preventDefault();
		let getId = $(this).attr('data-id'),
			partnarId = $(this).attr('partner-id');
		Swal.fire({
			title: "Ar tu tikra?",
			text: "Negalėsite to grąžinti!",
			icon: "warning",
			showCancelButton: true,
			cancelButtonText: 'Atšaukti',
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Taip, priimk"
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					url: ajax_object.ajax_url,
					method: 'POST',
					data: {
						de_assign_id: getId,
						de_partnar_id: partnarId,
					},
					success: function (re) {
						try {
							// If re is a string, manually parse it
							var response = typeof re === 'string' ? JSON.parse(re) : re;
							console.log(response); // Check if the parsing was successful

							if (response.r === 'ok') {
								console.log(response.message);
								Swal.fire({
									icon: 'success',
									title: response.message
								});
								setTimeout(function () {
									location.reload();
								}, 1200);
							} else {
								Swal.fire({
									icon: 'error',
									title: response.message
								});
							}
						} catch (e) {
							console.error('Error parsing response:', e);
							Swal.fire({
								icon: 'error',
								title: 'An error occurred while processing your request.'
							});
						}
					}
				})

			}
		});
	})


	$(document).on('click', '#admin-complete, #admin-revision', function (e) {
		e.preventDefault();
		let $this = $(this);
		let originalBtnText = $this.html();
		$this.html('palauk...');
		let orderID = $this.attr('data-id');
		let action = $this.attr('id') === 'admin-complete' ? 'admin_approve' : 'review_order';

		$.ajax({
			url: ajax_object.ajax_url,
			method: 'post',
			data: {
				action: 'handle_admin_order_action', // Add this line
				[action]: orderID
			},
			success: function (r) {
				console.log(r);
				$this.html(originalBtnText);
				location.reload();
			}
		});

	});

	
	/**
	 * See Partner Details Using ajax
	 * */ 

	$(document).on('click','#part_details', function (e) {
		partnerID = $(this).attr('data-id');
		console.log(partnerID);
		$("#name").text('');
		$("#ID").text('');
		$("#el").text('');
		$("#teli").text('');
		$("#imo").text('');
		$("#pvm").text('');
		$("#brezin").attr('src', '');
		$('#nuotrau').attr('src', '');

		e.preventDefault();
		$.ajax({
			url: ajax_object.ajax_url,
			method: 'get',
			contentType: "application/json",
			dataType: 'json',
			data:{
				part_id : partnerID
		},
			success:function (r) {
				console.log(r);
				$("#name").text(r.vardas + ' '+r.pavarde);
				$("#ID").text(r.ID);
				$("#el").text(r.el);
				$("#teli").text(r.telifono);
				$("#imo").text(r.imones);
				$("#pvm").text(r.pvm);
				$("#brezin").attr('src', r.brezin);
				$('#nuotrau').attr('src', r.nuotrau);
	
			}

		})
	})


	$(document).on('click', '#ass_complete', function (e) {
		e.preventDefault();
		e.preventDefault();
		let getId = $(this).attr('data-id'),
			partnarId = $(this).attr('partner-id');
		
		$.ajax({
			url: ajax_object.ajax_url,
			method: 'POST',
			data: {
				com_assign_id: getId,
				com_partnar_id: partnarId,
			},
			success: function (re) {
				try {
					// If re is a string, manually parse it
					var response = typeof re === 'string' ? JSON.parse(re) : re;
					console.log(response); // Check if the parsing was successful

					if (response.r === 'ok') {
						// console.log(response.message);
						Swal.fire({
							icon: 'success',
							title: response.message
						});
						setTimeout(function () {
							location.reload();
						}, 1200);							
					} else {
						Swal.fire({
							icon: 'error',
							title: response.message
						});
					}
				} catch (e) {
					console.error('Error parsing response:', e);
					Swal.fire({
						icon: 'error',
						title: 'An error occurred while processing your request.'
					});
				}
			}
		})
	})

});




(function($){"use strict";$("#sidebar_menu").metisMenu();$("#admin_profile_active").metisMenu();$(".open_miniSide").click(function(){$(".sidebar").toggleClass("mini_sidebar");$(".main_content ").toggleClass("full_main_content");$(".footer_part ").toggleClass("full_footer");});$(window).on('scroll',function(){var scroll=$(window).scrollTop();if(scroll<400){$('#back-top').fadeOut(500);}else{$('#back-top').fadeIn(500);}});$('#back-top a').on("click",function(){$('body,html').animate({scrollTop:0},1000);return false;});$("#sidebar_menu").find("a").removeClass("active");$("#sidebar_menu").find("li").removeClass("mm-active");$("#sidebar_menu").find("li ul").removeClass("mm-show");var current=window.location.pathname
$("#sidebar_menu >li a").filter(function(){var link=$(this).attr("href");if(link){if(current.indexOf(link)!=-1){$(this).parents().parents().children('ul.mm-collapse').addClass('mm-show').closest('li').addClass('mm-active');$(this).addClass('active');return false;}}});$('.bell_notification_clicker').on('click',function(){$('.Menu_NOtification_Wrap').toggleClass('active');});$(document).click(function(event){if(!$(event.target).closest(".bell_notification_clicker ,.Menu_NOtification_Wrap").length){$("body").find(".Menu_NOtification_Wrap").removeClass("active");}});$('.CHATBOX_open').on('click',function(){$('.CHAT_MESSAGE_POPUPBOX').toggleClass('active');});$('.MSEESAGE_CHATBOX_CLOSE').on('click',function(){$('.CHAT_MESSAGE_POPUPBOX').removeClass('active');});$(document).click(function(event){if(!$(event.target).closest(".CHAT_MESSAGE_POPUPBOX, .CHATBOX_open").length){$("body").find(".CHAT_MESSAGE_POPUPBOX").removeClass("active");}});$('.serach_button').on('click',function(){$('.serach_field-area ').addClass('active');});$(document).click(function(event){if(!$(event.target).closest(".serach_button, .serach_field-area").length){$("body").find(".serach_field-area").removeClass("active");}});$(document).ready(function(){var proBar=$('#bar1');if(proBar.length){proBar.barfiller({barColor:'#FFBF43',duration:2000});}
var proBar=$('#bar2');if(proBar.length){proBar.barfiller({barColor:'#508FF4',duration:2100});}
var proBar=$('#bar3');if(proBar.length){proBar.barfiller({barColor:'#4BE69D',duration:2200});}
var proBar=$('#bar4');if(proBar.length){proBar.barfiller({barColor:'#3B5DE7',duration:2200});}
var proBar=$('#bar5');if(proBar.length){proBar.barfiller({barColor:'#3BE769',duration:2200});}
var proBar=$('#bar6');if(proBar.length){proBar.barfiller({barColor:'#3BE7E7',duration:2200});}
var proBar=$('#bar7');if(proBar.length){proBar.barfiller({barColor:'#FFB822',duration:2200});}});$(".close_icon").click(function(){$(this).parents(".hide_content").slideToggle("0");});var count=$('.counter');if(count.length){count.counterUp({delay:100,time:5000});}
$(document).ready(function(){var date_picker=$('#start_datepicker');if(date_picker.length){date_picker.datepicker();}
var date_picker=$('#end_datepicker');if(date_picker.length){date_picker.datepicker();}});var delay=500;$(".progress-bar").each(function(i){$(this).delay(delay*i).animate({width:$(this).attr('aria-valuenow')+'%'},delay);$(this).prop('Counter',0).animate({Counter:$(this).text()},{duration:delay,easing:'swing',step:function(now){$(this).text(Math.ceil(now)+'%');}});});$('.sidebar_icon').on('click',function(){$('.sidebar').toggleClass('active_sidebar');});$('.sidebar_close_icon i').on('click',function(){$('.sidebar').removeClass('active_sidebar');});$('.troggle_icon').on('click',function(){$('.setting_navbar_bar').toggleClass('active_menu');});$('.custom_select').click(function(){if($(this).hasClass('active')){$(this).removeClass('active');}else{$('.custom_select.active').removeClass('active');$(this).addClass('active');}});$(document).click(function(event){if(!$(event.target).closest(".custom_select").length){$("body").find(".custom_select").removeClass("active");}});$(document).click(function(event){if(!$(event.target).closest(".sidebar_icon, .sidebar").length){$("body").find(".sidebar").removeClass("active_sidebar");}});$("#checkAll").click(function(){$('input:checkbox').not(this).prop('checked',this.checked);});var summerNote=$('#summernote');if(summerNote.length){summerNote.summernote({placeholder:'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',tabsize:2,height:305});}
var summerNote=$('.lms_summernote');if(summerNote.length){summerNote.summernote({placeholder:'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',tabsize:2,height:305});}
var summerNote=$('.lms_summernote');if(summerNote.length){summerNote.summernote({placeholder:'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',tabsize:2,height:305});}
$('.input-file').each(function(){var $input=$(this),$label=$input.next('.js-labelFile'),labelVal=$label.html();$input.on('change',function(element){var fileName='';if(element.target.value)fileName=element.target.value.split('\\').pop();fileName?$label.addClass('has-file').find('.js-fileName').html(fileName):$label.removeClass('has-file').html(labelVal);});});$('.input-file2').each(function(){var $input=$(this),$label=$input.next('.js-labelFile1'),labelVal=$label.html();$input.on('change',function(element){var fileName='';if(element.target.value)fileName=element.target.value.split('\\').pop();fileName?$label.addClass('has-file').find('.js-fileName1').html(fileName):$label.removeClass('has-file').html(labelVal);});});var bootstrapTag=$("#meta_keywords");if(bootstrapTag.length){bootstrapTag.tagsinput();}
if($('.lms_table_active').length){$('.lms_table_active').DataTable({bLengthChange:false,"bDestroy":true,language:{search:"<i class='ti-search'></i>",searchPlaceholder:'Quick Search',paginate:{next:"<i class='ti-arrow-right'></i>",previous:"<i class='ti-arrow-left'></i>"}},columnDefs:[{visible:false}],responsive:true,searching:false,});}
if($('.lms_table_active2').length){$('.lms_table_active2').DataTable({bLengthChange:false,"bDestroy":false,language:{search:"<i class='ti-search'></i>",searchPlaceholder:'Quick Search',paginate:{next:"<i class='ti-arrow-right'></i>",previous:"<i class='ti-arrow-left'></i>"}},columnDefs:[{visible:false}],responsive:true,searching:false,info:false,paging:false});}
if($('.lms_table_active3').length){$('.lms_table_active3').DataTable({bLengthChange:false,"bDestroy":false,language:{search:"<i class='ti-search'></i>",searchPlaceholder:'Quick Search',paginate:{next:"<i class='ti-arrow-right'></i>",previous:"<i class='ti-arrow-left'></i>"}},columnDefs:[{visible:false}],responsive:true,searching:false,info:true,paging:true});}
$('.layout_style').click(function(){if($(this).hasClass('layout_style_selected')){$(this).removeClass('layout_style_selected');}else{$('.layout_style.layout_style_selected').removeClass('layout_style_selected');$(this).addClass('layout_style_selected');}});$('.switcher_wrap li.Horizontal').click(function(){$('.sidebar').addClass('hide_vertical_menu');$('.main_content ').addClass('main_content_padding_hide');$('.horizontal_menu').addClass('horizontal_menu_active');$('.main_content_iner').addClass('main_content_iner_padding');$('.footer_part').addClass('pl-0');});$('.switcher_wrap li.vertical').click(function(){$('.sidebar').removeClass('hide_vertical_menu');$('.main_content ').removeClass('main_content_padding_hide');$('.horizontal_menu').removeClass('horizontal_menu_active');$('.main_content_iner').removeClass('main_content_iner_padding');$('.footer_part').removeClass('pl-0');});$('.switcher_wrap li').click(function(){$('li').removeClass("active");$(this).addClass("active");});$('.custom_lms_choose li').click(function(){$('li').removeClass("selected_lang");$(this).addClass("selected_lang");});$('.spin_icon_clicker').on('click',function(e){$('.switcher_slide_wrapper').toggleClass("swith_show");e.preventDefault();});if($('#webticker-dark-icons').length){$("#webticker-dark-icons").webTicker({height:'auto',duplicate:true,startEmpty:false,rssfrequency:5});}
if($('#webticker-dark1').length){$("#webticker-dark1").webTicker({height:'auto',duplicate:true,startEmpty:false,rssfrequency:5});}
if($('#webticker-dark2').length){$("#webticker-dark2").webTicker({height:'auto',duplicate:true,startEmpty:false,rssfrequency:5,direction:'right'});}
if($('#webticker-dark3').length){$("#webticker-dark3").webTicker({height:'auto',startEmpty:false,rssfrequency:5});}
if($('#webticker-white1').length){$("#webticker-white1").webTicker({height:'auto',duplicate:true,startEmpty:false,rssfrequency:5,direction:'right'});}
if($('#webticker-white-icons').length){$("#webticker-white-icons").webTicker({height:'auto',duplicate:true,startEmpty:false,rssfrequency:5,});}
if($('#webticker-white2').length){$("#webticker-white2").webTicker({height:'auto',duplicate:true,startEmpty:false,rssfrequency:5,});}
if($('#webticker-white3').length){$("#webticker-white3").webTicker({height:'auto',duplicate:true,startEmpty:false,rssfrequency:5,direction:'right'});}
$(document).ready(function(){$(function(){"use strict";$(".pCard_add").click(function(){$(".pCard_card").toggleClass("pCard_on");$(".pCard_add i").toggleClass("fa-minus");});});});}(jQuery));
$('.select2').select2();
$('#partners, #order_lists').dataTable({
	 responsive: true,
});

$(document).off().on('click', '#assign', function (e) {
	e.preventDefault();
	let order_id = $(this).attr('data-id');
	console.log(order_id);
	$("#order_id").val(order_id);
});
// Define the event handler function
function assignOrderHandler(e) {
	e.preventDefault();
	// Get the form element
	let formElement = document.querySelector('#assgin_partner');
	// Ensure the form element exists
	if (!formElement) {
		console.error('Form element not found');
		return;
	}
	// Create FormData object from the form element
	let formData = new FormData(formElement);
	formData.append('action', 'order_assign');

	$.ajax({
		url: ajax_object.ajax_url,
		method: 'post',
		data: formData,
		contentType: false,
		processData: false,
		success: function (r) {
			if (r.success) {
				Swal.fire({
					icon: 'success',
					title: 'Order Assign Successfully'
				});
			} else {
				Swal.fire({
					icon: 'error',
					title: r.data.message
				});
			}
		},
		error: function (jqXHR, textStatus, errorThrown) {
			console.error('AJAX request failed: ' + textStatus, errorThrown);
		}
	});
}

// Ensure the event handler is only bound once
$(document).ready(function () {
	$(document).off('click', '#order_assign', assignOrderHandler);
	$(document).on('click', '#order_assign', assignOrderHandler);
});
