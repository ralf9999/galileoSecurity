//###---Active Klick von Kontaktdaten Rechts--------###
const phonecontact = document.querySelector('.cl_phoneContact_hp');
const mailcontact = document.querySelector('.cl_mailContact_hp');
const phoneBoxKreuz = document.querySelector('.cl_kreuzClose_hp');

phonecontact.addEventListener("click", phoneOver )
function phoneOver (){
const phoneBox = document.querySelector('.cl_blurbg_hp');
    phoneBox.classList.add('cl_active_hp');
}
phoneBoxKreuz.addEventListener("click", phoneOut )
function phoneOut (){
const phoneBox = document.querySelector('.cl_blurbg_hp');
    phoneBox.classList.remove('cl_active_hp');
}
//###-----Sub Menu aufklappen-------###
document.addEventListener("DOMContentLoaded", function() {
const subMenu = document.querySelector('.cl_submenuBox');
const subMenuSub = document.querySelector('#id_sub-menu');
const burgerEffect = document.querySelector('.cl_burgerBox');
const klappNav = document.querySelector('.cl_burgerBox');

subMenu.addEventListener('mouseover', submenuOpen)
function submenuOpen() {
    const subLinksBox = document.querySelector('.sub-menu')
    if (subLinksBox.classList.contains('cl_submenuActive') === false) {
        subLinksBox.classList.add('cl_submenuActive')
    } 

}
subMenu.addEventListener('mouseleave', submenuClose)
function submenuClose() {
    const subLinksBox = document.querySelector('.sub-menu')
    if (subLinksBox.classList.contains('cl_submenuActive') === true) {
        subLinksBox.classList.remove('cl_submenuActive')
    
    }
    console.log('Hallo02')
}
burgerEffect.addEventListener('click', OverBurger)
function OverBurger() {
    const lineBurger = document.querySelectorAll('.cl_burgerLine')
    lineBurger.forEach(function (element) {
        if (element.classList.contains('cl_linetogether') === true) {
            element.classList.remove('cl_linetogether');
        } else {
            element.classList.add('cl_linetogether')
        }
    })
    
}

klappNav.addEventListener('click', naviKlapp)

function naviKlapp() {
    const klappmenu = document.querySelector('.cl_navArea')
    klappmenu.classList.toggle('cl_mobileNavOpen')
    console.log('Hallo')
}

subMenu.addEventListener('touchstart', submenutoggle)
function submenutoggle() {
    const subLinksBoxmobil = document.querySelector('.cl_sub-menu')
   subLinksBoxmobil.classList.toggle('cl_submenuActive')
   console.log('DADA')
    }
})