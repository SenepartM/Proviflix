<<<<<<< HEAD

$(document).ready(function(){
  $(window).scroll(function(){
      var scroll = $(window).scrollTop();
      if (scroll > 100) {
        $(".netflix-navbar").css("background" , "#0C0C0C");
      }

      else{
          $(".netflix-navbar").css("background" , "transparent");  	
      }
  });

})


function position(id){
var card = document.getElementsByClassName('card')[id];
// card.style.transform = 'scale(1.5)';
console.log(id)
=======

$(document).ready(function(){
    $(window).scroll(function(){
        var scroll = $(window).scrollTop();
        if (scroll > 100) {
          $(".netflix-navbar").css("background" , "#0C0C0C");
        }
  
        else{
            $(".netflix-navbar").css("background" , "transparent");  	
        }
    });

  })


function position(id){
  var card = document.getElementsByClassName('card')[id];
  // card.style.transform = 'scale(1.5)';
  console.log(id)
>>>>>>> 87389a212783a4efaddb99d7b5e2b67260128110
}