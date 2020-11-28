tinymce.init({
    selector:'textarea',
    theme: "silver"
});


// $(document).ready(function() {
	
// 	$('#selectAllBoxes').click(function(event){

// 		if(this.checked){

// 			$('.checkBoxes').each(function(){
// 				this.checked = true;
// 			});

// 		}esle{

// 			$('.checkBoxes').each(function(){
// 				this.checked = false;
// 			});

// 		}

// 	});	


	$(document).ready(function(){
    $('#selectAllBoxes').on('click',function(){
        if(this.checked){
            $('.checkBoxes').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkBoxes').each(function(){
                this.checked = false;
            });
        }
    });	

  

});

// $(document).ready(function() {
  
//   // Preloading 
//     var div_box ="<div id='load-screen'><div id='loading'></div></div>";

//     $("body").prepend("div_box");

//     $('#load-screen').delay(400).fadeOut(600, function(){
//         $(this).remove();
//     });


// });


$(document).ready(function($) {
    var Body = $('body');
    Body.addClass('preloader-site');
});
$(window).load(function() {
    $('.preloader-wrapper').fadeOut(700);
    $('body').removeClass('preloader-site');
});


function loadUserOnline(){

    $.get("funtion.php?onlineuser=result", function(){

        $(".useronline").text(data);

    });
}


setInterval(function(){

loadUserOnline();
    
},500);