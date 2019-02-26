tinymce.init({ selector:'textarea' });


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

