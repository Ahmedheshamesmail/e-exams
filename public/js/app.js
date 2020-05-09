//const hamb = document.querySelector('.hamb');
//const nnav  = document.querySelector('.nav-links');
//const lnav  = document.querySelectorAll('.nav-links li');
//const nclose  = document.querySelector('.open');
//const iclose = document.querySelector('.xx');

$(document).ready(function (){
	$('.hamb').click(function(){
		$('.nav-links').toggleClass('open');
		$('li').addClass('fade');11
                $('.exit').show();
                $('.fon-0').addClass('fon-20');
	});
	$('.fon-0').click(function(){
		$('.nav-links').removeClass('open');
                $('.fon-0').removeClass('fon-20');
		$('li').removeClass('fade');
        $('li').addClass('cc');
	});
    $('.collapse').collapse();
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    })
    $('#myCollapsible').collapse({
        toggle: false
    });
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });

        $('.alerted-drop-down').addClass('bounceInDown');
        $('.button-alert').click(function () {
            $('.alerted-drop-down').hide(100);
        });
        
   $('.sitting').click(function(){
       $('.sitting').toggleClass('rot');
   });
$('.dropdown-toggle').dropdown();
$('.h22').click(function(){
	$('.mid2').addClass('open');
        $('.xx3').addClass('sch');
		$('.li').addClass('fade');
	});
	$('.xx3').click(function(){
		$('.mid2').removeClass('open');
                $('.xx3').removeClass('sch');
		$('.li').removeClass('fade');
	});
        
});

/*
hamb.addEventListener("onclick" ,op());

 function op (){
    nnav.classList.toggle("open");
};
iclose.addEventListener("onclick" ,"close()");


 function close (){
    nclose.classList.toggle("nav-links");
};
*/
