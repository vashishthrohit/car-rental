$(document).ready(function(){


$('#openbtn').click(function(){

  $('#mySidebar').toggleClass("toggle_sidebar");
  $('#main').toggleClass("main_content_side");

});

  //$('.message-box').hide();

  $('#openmessage').click(function(){
    $('.message-box').addClass('slidetoup');
    $('.message-box').removeClass('slidedown');
  });

  $('.close-message-btn').click(function(){
    $('.message-box').addClass('slidedown');
    $('.message-box').removeClass('slidetoup');

  });

  $(document).ready(function(){

    $('.message-box').addClass('slidetoup');
  
 });

 $(document).mouseup(function (e) {
    if ($(e.target).closest(".message-box").length
                === 0) {
        $('.message-box').addClass('slidedown');
    }
  });

  $('#openbtn1').click(function(){

    $('#mySidebar').toggleClass("toggle_sidebar");
    $('#main').toggleClass("main_content_side");

  });

  // $('#dropdown-trigger').click(function(e) {
  //   e.preventDefault();
  //   $('#dropdown-trigger .caret-dropdown').toggleClass('active');
  // });

  $('.sidebar a').click(function() {

    $('.sidebar a').removeClass("active");
    $(this).addClass("active");


  });

  $('.sidebar a').on('click',function(){

   $(this).find('#angle').toggleClass('rotate');

  });

  
  
  /*-------Form validation----------*/ 

   $('.is-name').keyup(function(){
      var regexp = /^[a-zA-Z ]+$/;

      if(regexp.test($('.is-name').val()))
      {
          $('.is-name').closest('.form-control').removeClass('is-invalid');
          $('.is-name').closest('.form-control').addClass('is-valid');
          $('.name-valid-text').hide();
      }
      else
      {
          $('.is-name').closest('.form-control').addClass('is-invalid');
          $('.is-name').closest('.form-control').removeClass('is-valid');
          $('.name-valid-text').html('**Enter valid name');
          $('.name-valid-text').show();
      }
  });


  $('.is-email').keyup(function(){
      var regex = /^[a-zA-Z0-9._]+@[a-zA-Z0-9._]+\.[a-zA-Z]{2,4}$/;
      
      if(regex.test($('.is-email').val()))
      {
          $('.is-email').closest('.form-control').removeClass('is-invalid');
          $('.is-email').closest('.form-control').addClass('is-valid');
          $('.email-valid-text').hide();
      }
      else
      {
          $('.is-email').closest('.form-control').addClass('is-invalid');
          $('.is-email').closest('.form-control').removeClass('is-valid');
          $('.email-valid-text').html('**Enter valid Email');
          $('.email-valid-text').show();
      }
  });



   $('.is-mobile').keyup(function(){
      var regexp = /^(\+\d{1,3}[- ]?)?\d{10}$/;

      if(regexp.test($('.is-mobile').val()))
      {
          $('.is-mobile').closest('.form-control').removeClass('is-invalid');
          $('.is-mobile').closest('.form-control').addClass('is-valid');
          $('.mobile-no-valid-text').hide();
      }
      else
      {
          $('.is-mobile').closest('.form-control').addClass('is-invalid');
          $('.is-mobile').closest('.form-control').removeClass('is-valid');
          $('.mobile-no-valid-text').html('*Enter valid Mobile No');
          $('.mobile-no-valid-text').show();
      }
  });




   $('.is-password').keyup(function(){
      var regex = /^[a-zA-Z0-9]{6,50}$/;
      
      if(regex.test($('.is-password').val()))
      {
          $('.is-password').closest('.form-control').removeClass('is-invalid');
          $('.is-password').closest('.form-control').addClass('is-valid');
          $('.password-valid-text').hide();
      }
      else
      {
          $('.is-password').closest('.form-control').addClass('is-invalid');
          $('.is-password').closest('.form-control').removeClass('is-valid');
          $('.password-valid-text').html('*Enter character more than six...');
          $('.password-valid-text').show();
      }
  });

  $('.is-confirm-password').keyup(function(){
      var regex = /^[a-zA-Z0-9]{6,50}$/;
      
      if(regex.test($('.is-confirm-password').val()))
      {
          if($('.is-confirm-password').val() == $('.is-password').val())
          {
             $('.is-confirm-password').closest('.form-control').removeClass('is-invalid');
             $('.is-confirm-password').closest('.form-control').addClass('is-valid');
             $('.confirm-password-valid-text').hide();                   }
         else 
         {
              $('.is-confirm-password').closest('.form-control').addClass('is-invalid');
              $('.is-confirm-password').closest('.form-control').removeClass('is-valid');
              $('.confirm-password-valid-text').html('*Password mismatch');
              $('.confirm-password-valid-text').show();
         }
      }
      else
      {
        $('.is-confirm-password').closest('.form-group').addClass('has-danger');
        $('.is-confirm-password').closest('.form-control').addClass('form-control-danger');
        $('.is-confirm-password').closest('.form-control').removeClass('form-control-success');
        $('.confirm-password-valid-text').html("* Enter character more than six....");
        $('.confirm-password-valid-text').show();

      }
  }); 


});

function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });

  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
    var x = document.getElementById(this.id + "autocomplete-list");     
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
 
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
    x[currentFocus].scrollIntoView();
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}