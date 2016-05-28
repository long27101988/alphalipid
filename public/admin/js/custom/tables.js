jQuery(document).ready(function() {

    jQuery('.stdtablecb .checkall').click(function() {
        var parentTable = jQuery(this).parents('table');
        var ch = parentTable.find('tbody input[type=checkbox]');
        if (jQuery(this).is(':checked')) {

            //check all rows in table
            ch.each(function() {
                jQuery(this).attr('checked', true);
                jQuery(this).parent().addClass('checked'); //used for the custom checkbox style
                jQuery(this).parents('tr').addClass('selected');
            });

            //check both table header and footer
            parentTable.find('.checkall').each(function() {
                jQuery(this).attr('checked', true);
            });

        } else {

            //uncheck all rows in table
            ch.each(function() {
                jQuery(this).attr('checked', false);
                jQuery(this).parent().removeClass('checked'); //used for the custom checkbox style
                jQuery(this).parents('tr').removeClass('selected');
            });

            //uncheck both table header and footer
            parentTable.find('.checkall').each(function() {
                jQuery(this).attr('checked', false);
            });
        }
    });


    jQuery('.stdtablecb tbody input[type=checkbox]').click(function() {
        if (jQuery(this).is(':checked')) {
            jQuery(this).parents('tr').addClass('selected');
        } else {
            jQuery(this).parents('tr').removeClass('selected');
        }
    });

    // //delete selected row in table
    // jQuery('.deletebutton').click(function(){
    // 	var tb = jQuery(this).attr('title');							// get target id of table
    // 	var sel = false;											//initialize to false as no selected row
    // 	var ch = jQuery('#'+tb).find('tbody input[type=checkbox]');		//get each checkbox in a table

    // 	//check if there is/are selected row in table
    // 	ch.each(function(){
    // 		if(jQuery(this).is(':checked')) {
    // 			sel = true;											//set to true if there is/are selected row
    // 			jQuery(this).parents('tr').fadeOut(function(){
    // 				jQuery(this).remove();							//remove row when animation is finished
    // 			});
    // 		}
    // 	});

    // 	if(!sel) alert('No data selected');							//alert to no data selected
    // });


    // //delete individual row
    // jQuery('.stdtable a.delete').click(function(){
    // 	var c = confirm('Continue delete?');
    // 	if(c) jQuery(this).parents('tr').fadeOut(function(){
    // 		jQuery(this).remove();
    // 	});
    // 	return false;
    // });


    // jQuery('#dyntable').dataTable( {
    // 	"sPaginationType": "full_numbers"
    // });


    //for checkbox
    jQuery('input[type=checkbox]').each(function() {
        var t = jQuery(this);
        t.wrap('<span class="checkbox"></span>');
        t.click(function() {
            if (jQuery(this).is(':checked')) {
                t.attr('checked', true);
                t.parent().addClass('checked');
            } else {
                t.attr('checked', false);
                t.parent().removeClass('checked');
            }
        });
    });

});
