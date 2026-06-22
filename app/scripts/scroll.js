console.log("naarBovenGaan");

const naarBovenGaan = document.getElementById("naar-boven-knop");

document.addEventListener("scroll", () => {
    console.log("scrolling");
     scrollFunction(); 
})

function scrollFunction(){
     if (document.body.scrollTop > 300 ||
         document.documentElement.scrollTop > 300) {
         naarBovenGaan.style.display = "block";
     } else {
         naarBovenGaan.style.display = "none";
     }
 }

 naarBovenGaan.onclick = () => {
     window.scroll({
         top:0, 
         behavior: "smooth",
     });
 };