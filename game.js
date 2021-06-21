var temp=0;
$(function() {
    $('#sidebarCollapse').on('click',function() {
        $('#sidebar , #content').toggleClass('active');
    });
});

$(function() {
  $('#sidebarCollapse2').on('click',function() {
      $('#sidebar , #content').toggleClass('active');
  });
});

$(function() {
  $('#sidebarCollapse3').on('click',function() {
      $('#sidebar , #content').toggleClass('active');
  });
});

$(function() {
  $('#sidebarCollapse4').on('click',function() {
      $('#sidebar , #content').toggleClass('active');
  });
});

$(function() {
  $('#sidebarCollapse5').on('click',function() {
      $('#sidebar , #content').toggleClass('active');
  });
});

$(function() {
  $('#sidebarCollapse6').on('click',function() {
      $('#sidebar , #content').toggleClass('active');
  });
})

$(function() {
  $('#sidebarCollapse7').on('click',function() {
      $('#sidebar , #content').toggleClass('active');
  });
})

this.videoPlay = function(){
    var myPlayer = videojs("my-video");
    $(".video-popup").addClass("show");
    $("body").addClass("no-scroll");
    myPlayer.play();

    $(".icon-close-video").click(function(){
        myPlayer.pause();
        $(".video-popup").removeClass("show");
        $("body").removeClass("no-scroll");
    });

    $(".btn-control-video").click(function(){
        $(this).toggleClass("paused")
    
        if(myPlayer.paused())
        {
            myPlayer.play();
        }else{
            myPlayer.pause();
        }
    });

    myPlayer.on('ended', function(){
        $(".video-popup").removeClass("show");
        $("body").removeClass("no-scroll");
    })

}



// changing page content

function openPage1(){
    var i, content;
    content = document.getElementsByClassName("page-content");
    for (i = 0; i < content.length; i++) {
      content[i].style.display = "none";
    }
    document.getElementsByClassName("page-content")[1].style.display = "block";
}

function openPage0(){
    var i, content;
    content = document.getElementsByClassName("page-content");
    for (i = 0; i < content.length; i++) {
      content[i].style.display = "none";
    }
    document.getElementsByClassName("page-content")[0].style.display = "block";
}

function openPage2(){
    var i, content;
    content = document.getElementsByClassName("page-content");
    for (i = 0; i < content.length; i++) {
      content[i].style.display = "none";
    }
    document.getElementsByClassName("page-content")[2].style.display = "block";
}

function openPage3(){
    var i, content;
    content = document.getElementsByClassName("page-content");
    for (i = 0; i < content.length; i++) {
      content[i].style.display = "none";
    }
    document.getElementsByClassName("page-content")[3].style.display = "block";
}

function openPage4(){
  var i, content;
  content = document.getElementsByClassName("page-content");
  for (i = 0; i < content.length; i++) {
    content[i].style.display = "none";
  }
  document.getElementsByClassName("page-content")[4].style.display = "block";
}

function openPage5(){
  var i, content;
  content = document.getElementsByClassName("page-content");
  for (i = 0; i < content.length; i++) {
    content[i].style.display = "none";
  }
  document.getElementsByClassName("page-content")[5].style.display = "block";
}

// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myB");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

// $("#signin").on( "click", function() {
//   $('#exampleModal').modal('hide');  
// });

// $("#myModal2").on( "click", function() {
//   $('#myModal').modal('show');  
// });


//set button id on click to hide first modal
$("#signin").on( "click", function() {
  $('#myModal1').modal('hide');  
});
//trigger next modal
$("#signin").on( "click", function() {
  $('#myModal2').modal('show');  
});



function follow(z,w)
{
  document.getElementById(z).innerHTML = String(parseInt(document.getElementById(z).innerHTML)+1);
  document.getElementById(w).style.color='#f12020';
  // if(temp==0){
  //   document.getElementById(z).innerHTML = String(parseInt(document.getElementById(z).innerHTML)+1);
  //   temp=1;
  // }
  
}



function remo()
{
    // document.getElementsByTagName("input").removeAttribute("disabled");
}

$(function() {
  $("#add-msg").click(function() {
      div = document.createElement('div');
      $(div).addClass("inner").html("new inner div");
      $("#msg-boxx").append(div);
    });
});