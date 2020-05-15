document.addEventListener("DOMContentLoaded",function(){
    // click vào các ô trên thanh menu trái
    var nut1 = document.querySelectorAll("nav.menu-lateral a")
    
    for(var i = 0; i< nut1.length; i++){
        nut1[i].addEventListener("click",function(e) {
            // e.preventDefault()
            for(var i =0; i < nut1.length; i++){
                nut1[i].classList.remove("active");
                
            }
            this.classList.add("active")
            
            
        })
    }
    // for(var i = 0; i< nut3.length; i++){
    //     nut3[i].addEventListener("click",function(){
    //         for(var i = 0; i < nut3.length; i++){
    //             nut3[i].classList.remove("fa-spin")
    //         }
    //         this.firstChild.classList.add("fa-spin")
    //     })
    // }
    // click vào button fa-bars trên header
    var nut2 = document.querySelector(".header-logo .button-menu");
    var contenedor = document.querySelector(".main")
    nut2.addEventListener("click", function(){
    contenedor.classList.toggle("active")
    })
    AOS.init({
        duration: 1500,
    })
},false)
