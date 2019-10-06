

$(document).ready(function(){
 $('#myselect').select2({
     tags: true,
    tokenSeparators: [',', ' ']

 });


	/*Start Help Alert */
	$('.help').mouseover(function(){

	$('.help-me').fadeIn() ;
	});
		$('.help').mouseleave(function(){

	$('.help-me').fadeOut() ;
	});



	/*End Help Alert */

	var $iframe = $('iframe'),
    $videoLink = $('.video-link'),
    playerTemplate = '<div class="player"><div class="player__video"><div class="video-filler"></div><button class="video-close">&times;</button><iframe class="video-iframe" src="{{iframevideo}}" frameborder="0" allowfullscreen></iframe></div><div/>';


$videoLink.on('click', function(e) {
    var localTemplate = '',
        videoWidth = parseInt($(this).data('width')),
        videoHeight = parseInt($(this).data('height')),
        videoAspect = ( videoHeight / videoWidth ) * 100,
        // elements
        $player = null,
        $video = null,
        $close = null,
        $iframe = null;

    e.preventDefault();

    localTemplate = playerTemplate.replace('{{iframevideo}}', $(this).prop('href'));

    $player = $(localTemplate);

    $player
        .find('.video-filler')
        .css('padding-top', videoAspect + '%');

    $close = $player
        .find('.video-close')
        .on('click', function() {
            $(this).off().closest('.player').hide().remove();
        });

    $player.appendTo('body').addClass('js--show-video');
});
/*Start Tooltip*/
  $('[data-toggle="tooltip"]').tooltip();
/*End Tooltip*/

/*Start Post Jo Free */

    //jQuery time

	$('ul.tabs li').click(function(){
		var tab_id = $(this).attr('data-tab');

		$('ul.tabs li').removeClass('current');
		$('.tab-content').removeClass('current');

		$(this).addClass('current');
		$("#"+tab_id).addClass('current');
	});

	$('ul.tabsx li').click(function(){
		var tab_id99 = $(this).attr('data-tab');

		$('ul.tabsx li').removeClass('currentsx');
		$('.tab-contentx').removeClass('currentsx');

		$(this).addClass('currentsx');
		$("#"+tab_id99).addClass('currentsx');
	});



	$('ul.tabss li').click(function(){
		var tab_id8 = $(this).attr('data-tab');

		$('ul.tabss li').removeClass('currents');
		$('.tab-contents').removeClass('currents');

		$(this).addClass('currents');
		$("#"+tab_id8).addClass('currents');
	});



	$('ul.tabsv li').click(function(){
		var tab_id9 = $(this).attr('data-tab');

		$('ul.tabsv li').removeClass('currentsv');
		$('.tab-contentv').removeClass('currentsv');

		$(this).addClass('currentsv');
		$("#"+tab_id9).addClass('currentsv');
	});


$(".submit").click(function(){
	return false;
})
/*End Post Job Free */
/*
$("html").niceScroll({
cursorcolor :'#52B3D9',
cursorwidth :'10px',
cursorborder :'0',
cursorborderradius :'0'



});
*/
/*end nice scroll */

  $('#myselect').select2({

    tags: true,
    tokenSeparators: [',', ' ']
  });


   $('.preview button').click(function(){

    $('.message').fadeIn() ;

   });


    /*
      $('#upload1').change(function() {
      if ($(this).val() != '') {

      console.log('Mohamed') ;
      $('.file-upload span').css('color' , '#f00')  ;
           console.log('mohamed') ;

      }
          else{
              console.log('Nader') ;

          }


  });
  */
/*------------------ START HOME PAGE ------------------- */
/*-------------------------------------------------------*/



 /* START ANIMATION */

 var wow = new WOW(
  {
    boxClass:     'wow',      // animated element css class (default is wow)
    animateClass: 'animated', // animation css class (default is animated)
    offset:       0,          // distance to the element when triggering the animation (default is 0)
    mobile:       true,       // trigger animations on mobile devices (default is true)
    live:         true,       // act on asynchronously loaded content (default is true)
    callback:     function(box) {
      // the callback is fired every time an animation is started
      // the argument that is passed in is the DOM node being animated
    },
    scrollContainer: null // optional scroll container selector, otherwise use window
  }
);
wow.init();



/* END ANIMATION */
    /* PLACE HOLDER OF SEARCH */

   $('#input2,#input4').on('change', function() {
   if(this.value == 1 ){

   $("input.job").attr("placeholder","mohamed") ;
   }
    else{
    $("input.job").attr("placeholder","Your Jop title") ;

   }


});

    /*End PLACE HOLDER OF SEARCH */

  /* START SCROLL OF ABOUT */

$("header .nav .links1 li.aboutset").click(function(){

$("html,body").animate({

scrollTop:$("#"+$(this).data('value')).offset().top-120

},3000);

});

 /* END SCROLL OF ABOUT */




    /* START CONTACT FORM */

$(window).scroll(function(){


  if($(this).scrollTop() >= 2100)
  {
   $('.nb-form').show() ;

  }
    else{

     $('.nb-form').hide() ;

    }

    });

    /* END CONTACT FORM */


    /* STRAT SEARCH PAGE POP UP */
   $(window).on('resize', function () {
    if ($(this).width() <= 480) {
      $("#input1 , #input2").focus(function(){

          $(".serch-page").fadeIn();

         });
    }
}).trigger('resize');


$(".closee img").click(function(){
$(".serch-page").fadeOut();


});




    /*END SEARCH PAGE POP UP*/









    /* START COMPANIES HIRING NOW */

    $('.carousel').carousel({
      interval: 5000
    });

   /*END COMPANIES HIRING NOW */











 /* START BOX SLIDER */

$('.bxslider').bxSlider({
  minSlides: 3,
  maxSlides: 5,
  slideWidth: 170,
  slideMargin: 40 ,
  minSlides: 2,
  responsive:true ,
  ticker: true,
  speed: 20000
});

 /*END BOX SLIDER */

 /* START BOX SLIDER */

$('.bxslider2').bxSlider({
  minSlides: 3,
  maxSlides: 3,
  slideWidth: 200,
  slideMargin: 50 ,
  minSlides: 2,
  responsive:true,
  auto:true

});
    $('.bxslider3').bxSlider({
  minSlides: 3,
  maxSlides: 4,
  slideWidth: 200,
  slideMargin: 50 ,
  minSlides: 2,
  responsive:true

});
     $('.bxslider4').bxSlider({
  minSlides: 3,
  maxSlides: 4,
  slideWidth: 225,
  slideMargin: 50 ,
  minSlides: 2,
  responsive:true

});

 /*END BOX SLIDER */





  /* START NAVBAR */

$(window).scroll(function(){

var $navheight = $('.nav').height()  ;

var $scrolltop = $(window).scrollTop() ;



    if($scrolltop > $navheight )
    {
    $('header .nav').addClass('scrolled') ;

    }
    else if ($scrolltop == 0 )
    {

     $('header .nav').removeClass('scrolled') ;

    }



}) ;

    /* END NAVBAR */
    /* START HEADER HEIGHT */

$("head").height($(window).height()) ;

    /*END HEADER HEIGHT*/










/* START SIDE BAR */

    $('.sidebar-menu').mouseenter(function(){
      $(this).children('.expand').addClass('turn');
    });

    $('.sidebar-menu').mouseleave(function(){
      if ($(this).hasClass('open')) {
      } else {
        $(this).children('.expand').removeClass('turn');
      }
    });

    $('.sidebar-menu').click(function () {
      var $this = $(this);
      if ($this.hasClass('open')) {
        $('.sidebar-menu').removeClass('open');
        $('.sub-menu').stop(true).slideUp("fast");
        $('.expand').removeClass('turn');
        $this.removeClass('open');
        $this.children('.expand').removeClass('turn');
        $this.next().stop(true).slideUp("fast");
      }
      else {
        $('.sidebar-menu').removeClass('open');
        $('.sub-menu').stop(true).slideUp("fast");
        $('.expand').removeClass('turn');

        $this.addClass('open');
        $this.children('.expand').addClass('turn');
        $this.next().stop(true).slideDown("fast");
        }
    });


  var trigger = $('.hamburger'),
      overlay = $('.overlay'),
     isClosed = false;

    trigger.click(function () {
      hamburger_cross();
    });

    function hamburger_cross() {

      if (isClosed == true) {
        overlay.hide();
        trigger.removeClass('is-open');
        trigger.addClass('is-closed');
        isClosed = false;
      } else {
        overlay.show();
        trigger.removeClass('is-closed');
        trigger.addClass('is-open');
        isClosed = true;
      }
  }

  $('[data-toggle="offcanvas"]').click(function () {
        $('#wrapper').toggleClass('toggled');
  });

 /*END SIDE BAR */


/*------------------ END HOME PAGE ------------------- */
/*-------------------------------------------------------*/
 /*------------------ START REGISTER  PAGE ------------------- */
/*-------------------------------------------------------*/



//
// /* END ADD NEW EXPERIENCE */

/* START FADE OUT OF IMAGES */

$('.modal-header span.num3').click(function(){

$('.modal-wrap').find('.modal-body33:nth-child(2)').addClass('is-showing')
                  .siblings().removeClass('is-showing');

    $(this).addClass('is-active').siblings().removeClass('is-active');
});
    $('.modal-header span.num6').click(function(){

$('.modal-wrap').find('.modal-body33:nth-child(1)').addClass('is-showing')
                  .siblings().removeClass('is-showing');

    $(this).addClass('is-active').siblings().removeClass('is-active');
});





$('.modal-header span.num7').click(function(){

$('.modal-wrap').find('.modal-body33:nth-child(2)').addClass('is-showing')
                  .siblings().removeClass('is-showing');

    $(this).addClass('is-active').siblings().removeClass('is-active');
});



$('.modal-header span.num4').click(function(){

$('.modal-wrap').find('.modal-body33:nth-child(3)').addClass('is-showing')
                  .siblings().removeClass('is-showing');

  $(this).addClass('is-active').siblings().removeClass('is-active');
   $('.modal-header span:nth-of-type(3)').addClass('is-active')
                          .siblings().removeClass('is-active');


});

$('.modal-header span.num8').click(function(){

$('.modal-wrap').find('.modal-body33:nth-child(3)').addClass('is-showing')
                  .siblings().removeClass('is-showing');

  $(this).addClass('is-active').siblings().removeClass('is-active');
   $('.modal-header span:nth-of-type(3)').addClass('is-active')
                          .siblings().removeClass('is-active');


});

$('.modal-header span.num5').click(function(){
$('.modal-wrap').find('.modal-body33:nth-child(4)').addClass('is-showing')
                  .siblings().removeClass('is-showing');


  $(this).addClass('is-active').siblings().removeClass('is-active');
   $('.modal-header span:nth-of-type(4)').addClass('is-active')
                          .siblings().removeClass('is-active');


});


$('.modal-header span.num9').click(function(){
$('.modal-wrap').find('.modal-body33:nth-child(4)').addClass('is-showing')
                  .siblings().removeClass('is-showing');


  $(this).addClass('is-active').siblings().removeClass('is-active');
   $('.modal-header span:nth-of-type(4)').addClass('is-active')
                          .siblings().removeClass('is-active');


});

/* END  FADE OUT OF IMAGES */



  /* START NEXT FUNCTION */
$('.button').click(function(){
  var $btn = $(this),
      $step = $btn.parents('.modal-body33'),
      stepIndex = $step.index(),
      $pag = $('.modal-header span').eq(stepIndex);

   if(stepIndex === 0) {
      step1($step, $pag); }
   else if(stepIndex === 1 ){

      step2($step, $pag);
   }
   else if (stepIndex === 2){
        step3($step, $pag);
    }
   else if(stepIndex === 3){
    step4($step, $pag);
    }
    else{
    step5($step, $pag);

    }
});

   /* END  NEXT FUNCTION */












 /*START RETURN FUNCTIONS */

function step1($step, $pag){

  // animate the step in
  setTimeout(function(){
    $step.removeClass('animate-out is-showing')
         .next().addClass('animate-in');
        $('.modal-header span.num6').css("opacity" ,"0.2") ;


    $pag.removeClass('is-active')
          .next().addClass('is-active');
  }, 50);

  // after the animation, adjust the classes
  setTimeout(function(){
    $step.next().removeClass('animate-in')
          .addClass('is-showing');


  }, 1200);
}
function step2($step, $pag){

  // animate the step out


  // animate the step in
  setTimeout(function(){

      $step.removeClass('animate-out is-showing')
         .next().addClass('animate-in');
          $('.modal-header span.num7').css("opacity" ,"0.2") ;
          $('.modal-header span.num3').css("opacity" ,"0.2") ;

    $pag.removeClass('is-active')
          .next().addClass('is-active');
  }, 50);

  // after the animation, adjust the classes
  setTimeout(function(){
    $step.next().removeClass('animate-in')
          .addClass('is-showing');

  }, 1200);
}
function step3($step, $pag){

  // animate the step out


  // animate the step in
  setTimeout(function(){
    $step.removeClass('animate-out is-showing')
         .next().addClass('animate-in');
        $('.modal-header span.num4').css("opacity" ,"0.2") ;
      $('.modal-header span.num8').css("opacity" ,"0.2") ;
    $pag.removeClass('is-active')
          .next().addClass('is-active');
  }, 50);

  // after the animation, adjust the classes
  setTimeout(function(){
    $step.next().removeClass('animate-in')
          .addClass('is-showing');

  }, 1200);
}

$('.button88').click(function(){
      // animate the step in
  setTimeout(function(){

      $('div.modal-body33.modal-body33-step-2').removeClass('animate-out is-showing')
         .next().addClass('animate-in');
          $('.modal-header span.num6').css("opacity" ,"0.2") ;

   $('span.num6.is-active').removeClass('is-active')
          .next().addClass('is-active');
  }, 50);

  // after the animation, adjust the classes
  setTimeout(function(){
    $('div.modal-body33.modal-body33-step-2').next().removeClass('animate-in').addClass('is-showing');

  }, 1200);

});

function step4($step, $pag){

  // animate the step out


  // animate the step in
  setTimeout(function(){
    $step.removeClass('animate-out is-showing')
         .next().addClass('animate-in');
      $('.modal-header span.num').css("opacity" ,"0.2") ;
       $('.modal-header span.num9').css("opacity" ,"0.2") ;
    $pag.removeClass('is-active')
          .next().addClass('is-active');
  }, 50);

  // after the animation, adjust the classes
  setTimeout(function(){
    $step.next().removeClass('animate-in')
          .addClass('is-showing');

  }, 1200);
}
function step5($step, $pag){


  // animate the step out
  $step.parents('.modal-wrap').addClass('animate-up');

  setTimeout(function(){
    $('.rerun-button').css('display', 'inline-block');
  }, 300);
}

$('.rerun-button').click(function(){
 $('.modal-wrap').removeClass('animate-up')
                  .find('.modal-body33')
                  .first().addClass('is-showing')
                  .siblings().removeClass('is-showing');

  $('.modal-header span').first().addClass('is-active')
                          .siblings().removeClass('is-active');
 $(this).hide();
});

$('.ret').click(function(){
$('.modal-wrap').find('.modal-body33')
                  .first().addClass('is-showing')
                  .siblings().removeClass('is-showing');

  $('.modal-header span').first().addClass('is-active')
                          .siblings().removeClass('is-active');


      $('.modal-header span').first().addClass('is-active')
                          .siblings().removeClass('is-active');


}) ;

$('.ret2').click(function(){
$('.modal-wrap').find('.modal-body33:nth-child(1)').addClass('is-showing')
                  .siblings().removeClass('is-showing');

  $('.modal-header span').first().addClass('is-active')
                          .siblings().removeClass('is-active');
   $('.modal-header span').first().next().addClass('is-active')
                          .siblings().removeClass('is-active');


}) ;
$('.ret3').click(function(){
$('.modal-wrap').find('.modal-body33:nth-child(2)').addClass('is-showing')
                  .siblings().removeClass('is-showing');

  $('.modal-header span').first().addClass('is-active')
                          .siblings().removeClass('is-active');
   $('.modal-header span:nth-of-type(3)').addClass('is-active')
                          .siblings().removeClass('is-active');


}) ;

/* END  RETURN FUNCTIONS */

/*------------------ END REGISTER PAGE ------------------- */
/*-------------------------------------------------------*/
  /*--------------ADD NEW EXPERIENCE IN PROFILE UPDATE -------*/


 /* START ADD NEW EXPERIENCE */

    var max_fields = 10; //maximum input boxes allowed

    var x = 1; //initlal text box count
    $('.new-experience8').click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
         x++; //text box increment


 $('.main-experience').append("<div class='addition'>") ;

$('.main-experience').append("<div class='form-conrol'>") ;
$('.main-experience').append("<label class='control-label col-md-3'> Job Title <i class='fa fa-briefcase'></i></label>") ;


 $('.main-experience').append("<div class='col-md-7'><input  class='form-control' type='text' placeholder='Enter The Job Title' name='job_title[]' ></div>") ;


    $('.main-experience').append("<div class='form-conrol'>") ;
$('.main-experience').append("<label class='control-label col-md-3'> Company Name  <i class='fa bar-chart'></i></label>") ;
 $('.main-experience').append("<div class='col-md-7'><input  class='form-control' type='text' placeholder='Enter The company Name ' name='company_name[]'></div>") ;
$('.main-experience').append("</div>") ;


    $('.main-experience').append("<div class='form-conrol'>") ;
$('.main-experience').append("<label class='control-label col-md-3'> Salary  <i class='fa fa-money'></i></label>") ;
 $('.main-experience').append("<div class='col-md-7'><input  class='form-control' type='number' placeholder='Your Salary...'  name='job_salary[]'></div>") ;
$('.main-experience').append("</div>").append("</div>") ;



      $('.main-experience').append("<div class='form-conrol'>") ;
$('.main-experience').append("<label class='control-label col-md-3'> Start Date  <i class='fa fa-calendar'></i></label>") ;
 $('.main-experience').append("<div class='col-md-7'><input  class='form-control' type='date'  name='start_date[]' ></div>") ;
$('.main-experience').append("</div>") ;


$('.main-experience').append("<div  class='form-conrol'>") ;
$('.main-experience').append("<label  class='control-label col-md-3'> End Date  <i class='fa fa-calendar'></i></label>") ;
 $('.main-experience').append("<div  class='col-md-7'><input id='end22' class='form-control' type='date' name='end_date[]' ></div>") ;



            $('.main-experience').append("<div class='form-conrol'>") ;
$('.main-experience').append("<label class='control-label col-md-3'> Current Job <i class='fa fa-briefcase'></i></label>") ;
 $('.main-experience').append("<div class='col-md-7'><input id='check22' type='checkbox' id='check22' name='current[]' ></div>") ;
















$('.main-experience').append("<div class='clearfix'></div>") ;
$('.main-experience').append("<div class='separator'></div>") ;




    $('.main-experience').append("<div class='form-conrol'>").append("<div class='co-md-12'>")
        .append("<div class='add'>").append("<label class='control-label col-md-12  clickable8'> Add New Experience  <i class='fa fa-plus'></i></label>").append("</div>").append("</div>").append("</div>") ;






//add input box
        }
    });

  $('.main-experience').on("click",".remove_field", function(e){
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })


    $('.main-experience').on("click",".clickable8", function(e){ //user click on remove text

        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            // Start Append

$('.main-experience').append("<div class='addition'>").append("<label class='control-label col-md-3'> Job Title <i class='fa fa-briefcase'></i></label>") ;
 $('.main-experience').append("<div class='col-md-7'><input  class='form-control' type='text' placeholder='Enter The Job Title' name='job_title[]'></div></div>") ;


    $('.main-experience').append("<div class='form-conrol'>") ;
$('.main-experience').append("<label class='control-label col-md-3'> Company Name  <i class='fa bar-chart'></i></label>") ;
 $('.main-experience').append("<div class='col-md-7'><input  class='form-control' type='text' placeholder='company Name ' name='company_title[]'></div>") ;
$('.main-experience').append("</div>") ;


    $('.main-experience').append("<div class='form-conrol'>") ;
$('.main-experience').append("<label class='control-label col-md-3'> Salary  <i class='fa fa-money'></i></label>") ;
 $('.main-experience').append("<div class='col-md-7'><input  class='form-control' type='number' placeholder='Salary plez .. '  name='company_name[]'></div>") ;
$('.main-experience').append("</div>") ;



      $('.main-experience').append("<div class='form-conrol'>") ;
$('.main-experience').append("<label class='control-label col-md-3'> Start Date  <i class='fa fa-calendar'></i></label>") ;
 $('.main-experience').append("<div class='col-md-7'><input  class='form-control' type='date'  name='start_date[]' ></div>") ;
$('.experence-form').append("</div>") ;


$('.main-experience').append("<div class='form-conrol'>") ;
$('.main-experience').append("<label class='control-label col-md-3'> End Date  <i class='fa fa-calendar'></i></label>") ;
 $('.main-experience').append("<div class='col-md-7'><input  class='form-control' type='date'  name='end_date[]'></div>") ;

    $('.main-experience').append("<div class='form-conrol'>") ;
      $('.main-experience').append("<div class='co-md-12'>") ;

$('.main-experience').append("<label class='control-label col-md-12  clickable8s'> Add New Experience  <i class='fa fa-plus'></i></label>").append("</div>");



$('.main-experience').append("<div class='clearfix'></div>") ;
$('.main-experience').append("<div class='separator'></div>") ;





            //End Append


            //add input box
        }


    });

/* END ADD NEW EXPERIENCE */

/*------------------ START KNOW YOUR WORTH PAGE ------------------- */
/*-------------------------------------------------------*/
  /* google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Market',     70],
          ['Your Level ',      30]

        ]);

        var options = {

            width : 800 ,
            height: 400  ,
            fontSize : 15 ,
            colors :['#449D44' , '#ccc'] ,

        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }

*/
    /*Start adding New Skill*/
     var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID

    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div><input type="text" name="new_skill[]" placeholder="Add New Skill If You Not Found In Your Career"/><a href="#" class="remove_field col-md-2">Remove</a></div>'); //add input box
        }
    });

    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
    /*End dding New Skill*/



        /*Start adding New Skill Admin Page */
     var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button2"); //Add button ID

    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div><input type="text" name="Job_skill[]" placeholder="Add Required Skills"/><a href="#" class="remove_field col-md-2">Remove</a></div>'); //add input box
        }
    });

    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
    /*End dding New Skill*/


 $('.additional-Compensation').click(function(){

 $(this).fadeOut() ;
$('.Compensation').fadeIn() ;
 });

 /*-----------SATRT COURSES PAGE ----------------*/
 /*---------------------------------------------*/

    $('.toggle-info').click(function(){

    $(this).toggleClass('selected').parent().next('.panel-body').slideToggle(50) ;
    if($(this).hasClass('selected')){

    $(this).html(' <span class="fa fa-arrow-circle-down"> </span>') ;
    }
    else{

     $(this).html('<span class="fa fa-arrow-circle-up"> </span>') ;

    }

    });

   /*-----------END COURSES PAGE ----------------*/
 /*---------------------------------------------*/
     /*-----------START UPDATE INFO PAGE ----------------*/
 /*---------------------------------------------*/
   /*Start About Section */

 $('.myinput').on('keyup' , function(){

 $('.about-body').html('<p>' + $(this).val() +'</p>') ;
 });


/*End About Section*/

/*Satrt Current Job */

/*End Current Job */

/*Start Experience  Section */
 $('.title').on('keyup' , function(){

 $('.mytitle').html('<h4>' + $(this).val() +'</h4>') ;
 });
 $('.start').on('keyup' , function(){

 $('.mystart').html($(this).val()) ;
 });

 $('.end').on('keyup' , function(){

 $('.myend').html( $(this).val()) ;
 });

 $('.description').on('keyup' , function(){

 $('.main-experience .experience-body p').html('<p>'+$(this).val()+'</p>') ;
 });

/*End Experience Section*/

 /*Start function Job Activity*/



/*End Function Job Activity */



    $('.navbar-toggle').click(function () {
        $('.navbar-nav').toggleClass('slide-in');
        $('.side-body').toggleClass('body-slide-in');
        $('#search').removeClass('in').addClass('collapse').slideUp(200);

        /// uncomment code for absolute positioning tweek see top comment in css
        //$('.absolute-wrapper').toggleClass('slide-in');

    });

   // Remove menu for searching
   $('#search-trigger').click(function () {
        $('.navbar-nav').removeClass('slide-in');
        $('.side-body').removeClass('body-slide-in');

        /// uncomment code for absolute positioning tweek see top comment in css
        //$('.absolute-wrapper').removeClass('slide-in');

    });

    /*Start video Introduction*/

    /*Start Read More Button*/
      var el= $('.readmore'),
      clone= el.clone(),
      originalHtml= clone.html(),
      originalHeight= el.outerHeight(),
      Trunc = {
    moreLink: '<a href="#" class="readmore-toggle" data-read="more">Read More<span class="icon-arrow-bottom"</span></a>',
    lessLink: '<a href="#" class="readmore-toggle" data-read="less">Read Less <span class="icon-arrow-top"></span></a>',
    addTrigger : function(){
      $('.article-readmore').append(this.moreLink);
    },
    truncateText : function( textBlock ) {
      while (textBlock.text().length > 190 ) {
        textBlock.text(function(index, text) {
          return text.replace(/\W*\s(\S)*$/, '...');
        });
      }
    },
    replaceText: function ( textBlock, original ){
      return textBlock.html(original).height(originalHeight);
    }

  };
  Trunc.addTrigger();
  Trunc.truncateText(el);

  $(document).on('click', '[data-read]', function(e){
    e.preventDefault();

    if ($(this).data('read') == 'more'){
      Trunc.replaceText(el, originalHtml);
      $(this).replaceWith(Trunc.lessLink);

    } else if ($(this).data('read') == 'less') {
      Trunc.truncateText(el);
      $(this).replaceWith(Trunc.moreLink);
      el.css('height', '100%');
    }

  });
    /*End Read More Button*/



});

/*Start Model pop up */
var modal77 = document.getElementById('myModal77');

// Get the button that opens the modal
var btn77 = document.getElementById("mybtn77");

// Get the <span> element that closes the modal
var span77 = document.getElementsByClassName("close77")[0];

// When the user clicks on the button, open the modal

window.onload = function(){
btn77.onclick = function() {
    modal77.style.display = "block";
}
}

// When the user clicks on <span> (x), close the modal
window.onload = function(){
span77.onclick = function() {
    modal77.style.display = "none";
}
}

// When the user clicks anywhere outside of the modal, close it

window.onload = function(){
window.onclick = function(event) {
    if (event.target == modal77) {
        modal77.style.display = "none";
    }
}
}
/*Start File Upload*/


var file = document.getElementById("upload1");
file.addEventListener("change", function(){

 document.getElementById("done1").style.color = "#449D44";

                                          });
var file = document.getElementById("upload2");
file.addEventListener("change", function(){

 document.getElementById("done2").style.color = "#449D44";

                                          });

/* End File Upload */



/*---------Satart Video Introduction -- */


  /*-----------END COURSES PAGE ----------------*/
 /*---------------------------------------------*/

  $('.check22').change(function()
      {
      if ($('.check22').is(':checked')) {
           // Do something...
           alert('You can rock now...');
        }
      });




  /*******************************uploadfile****************************************************/

  $('#profile_image_preview').hide();

// For the hidden input value of image
document.getElementById('profile_image').onchange = function () {
    $('#hidden_profile_image').val(this.value);
};

// For Visable input
document.getElementById('profile_image').onchange = function () {
    $('#upload-file-info').val(this.value);
};

// For the preview of the image
$('#profile_image').change( function(event) {
    var x = document.getElementById("profile_image").value;
    $('#profile_image_preview').show();
    $("img").fadeIn("fast").attr('src',URL.createObjectURL(event.target.files[0]));
});
