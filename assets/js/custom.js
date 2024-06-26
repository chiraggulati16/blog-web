jQuery(function() {
    console.log("Script added successfully")
    jQuery('.widget ul').addClass('list-unstyled')

    jQuery(".btn_search").click(function(){
        jQuery('.search-width').toggleClass("show hide");
    }); 
    jQuery("#submit").addClass('btn btn-primary');

    jQuery(".btn_menu").click(function(){
        jQuery('.sm_menu').toggleClass("show hide");
    }); 
})