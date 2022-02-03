// create social networking pop-ups  
jQuery(document).ready(function($){  
    // link selector and pop-up window size  
    var Config = {  
        Link: "a.share",  
        Width: 500,  
        Height: 500  
    };  

    $(Config.Link).on('click', function(e){  

        e.preventDefault();  

        var  
            px = Math.floor(((screen.availWidth || 1024) - Config.Width) / 2),  
            py = Math.floor(((screen.availHeight || 700) - Config.Height) / 2);  

        var popup = window.open($(this).attr('href'), "social", 
            "width="+Config.Width+",height="+Config.Height+  
            ",left="+px+",top="+py+  
            ",location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1");  
        if (popup) {  
            popup.focus();  
            if (e.preventDefault) e.preventDefault();  
            e.returnValue = false;  
        }  

    });  


});