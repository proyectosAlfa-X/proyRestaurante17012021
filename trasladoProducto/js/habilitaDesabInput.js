function habilita(){
        $(".desbloquea").removeAttr("disabled");
        $(".des").attr("disabled","disabled");
        
    }
 
    function deshabilita(){
        $(".desbloquea").attr("disabled","disabled");
         $(".des").removeAttr("disabled");
    }