// <!-- ------------pop up image -->

 

// ---------------scroll bar-----------------

window.addEventListener("scroll",function(){
    var header=document.querySelector("header");
    header.classList.toggle("sticky",window.scrollY >0 )
})
// ---------------------------toggle button responsive--------------------------
var sidemenu=document.getElementById("sidemenu");
function openMenu(){
  sidemenu.style.right="0";
}
function closemen(){
  sidemenu.style.right="-200px";
}
// ------------------------------table link about skill-------------------------------

var tablinks = document.getElementsByClassName("tab-links");
var tablContents = document.getElementsByClassName("tab-content");

function openTab(tabname) {
  for (tablink of tablinks) {
    tablink.classList.remove("active-link");
  }
  for (tablContent of tablContents) {
    tablContent.classList.remove("active-tap");
  }
  event.currentTarget.classList.add("active-link");

  document.getElementById(tabname).classList.add("active-tap");
}
// ----------------------don't scroll up when refrest---------------
$(window).on('beforeunload',function(){
    $(window).scrollTop(0)
});
// <!-- ------------pop up image -->
 
        document.querySelectorAll('.block-image img').forEach(image =>{
          image.onclick =()=>{
            document.querySelector('.popup-image').style.display ='block';
            document.querySelector('.popup-image img').src=image.getAttribute('src')
            doc
          }
          
        });
        document.querySelector('.popup-image span').onclick =()=>{
          document.querySelector('.popup-image').style.display ='none';
        }
