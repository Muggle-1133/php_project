function dropDown(){
    $('.dropdown-btn').mouseover(function(){
        $('.dropdown-btn').css({"color":"#222"})
    })
    $('.dropdown-btn').click(function(){
        $('.dropdown-submenu').toggle()
    })
    
    let onMenu = false;
    $('dropdown-submenu, .dropdown-btn')
        .mouseenter(function(){
            onMenu = true;
        })
        .mouseleave(function(){
            onMenu = false;
        })
    $(document.body).click(function(e) { 
        if(onMenu === false) { 
            $('.dropdown-submenu').hide()
            $('.dropdown-btn').css({"color":"rgb(75, 75, 75)"})
        } 
    })
}