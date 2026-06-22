console.log("naarBovenGaan");

const naarBovenGaan = document.getElementById("naar-boven-knop");

window.opscroll = () => {
    if (document.body.scrollTop > 300 ||
        document.documentElement.scrollTop > 300) {
        naarBovenGaan.style.display = "block";
    } else {
        naarBovenGaan.style.display = "none";
    }
}

naarBovenGaan.onclick = () => {
    naarBovenGaan.style.display = "none";
    window.scroll({
        top:0, 
        behavior: "smooth",
    });
};