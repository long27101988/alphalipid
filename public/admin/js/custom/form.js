jQuery(document).ready(function(){
	//dual box
	var db = jQuery('#dualselect').find('.ds_arrow .arrow');	//get arrows of dual select
	var sel1 = jQuery('#dualselect select:first-child');		//get first select element
	var sel2 = jQuery('#dualselect select:last-child');			//get second select element
	
	sel2.empty(); //empty it first from dom.
	
	db.click(function(){
		var t = (jQuery(this).hasClass('ds_prev'))? 0 : 1;	// 0 if arrow prev otherwise arrow next
		if(t) {
			sel1.find('option').each(function(){
				if(jQuery(this).is(':selected')) {
					jQuery(this).attr('selected',false);
					var op = sel2.find('option:first-child');
					sel2.append(jQuery(this));
				}
			});	
		} else {
			sel2.find('option').each(function(){
				if(jQuery(this).is(':selected')) {
					jQuery(this).attr('selected',false);
					sel1.append(jQuery(this));
				}
			});		
		}
	});
	
	//FORM VALIDATION
	// just for the demos, avoids form submit
	// jQuery.validator.setDefaults({
	//   debug: true,
	//   success: "valid"
	// });

	jQuery("#formAddCatNew").validate({
		rules: {
			txtCatNewTitle: "required"
		},
		messages: {
			txtCatNewTitle: "Please enter cat new name."
		}
	});

	jQuery("#formEditCatNew").validate({
		rules: {
			txtCatNewName: "required",
			txtCatNewPos: { 
				required: true,
      			number: true
			}
		},
		messages: {
			txtCatNewName: "Please enter cat new name.",
			txtCatNewPos:{
				required: "Please enter cat new position.",
      			number: "Please enter a valid number."
			}
		}
	});
	
	jQuery("#formAddService").validate({
		rules: {
			txtPrefix: "required",
			txtTitle: "required",
			txtContent: "required",
			fileImg: {
				required: true,
      			accept: "png|jpeg|jpg|gif"
			},
			fileBanner: {
				required: true,
      			accept: "png|jpeg|jpg|gif"
			}
		},
		messages: {
			txtPrefix: "Please enter prefix title.",
			txtTitle: "Please enter title.",
			txtContent: "Please enter content.",
			fileImg: {
				required: "Please choose a image.",
      			accept: "Please select a valid image file."
			},
			fileBanner: {
				required: "Please choose a image.",
      			accept: "Please select a valid image file."
			}
		}
	});

	jQuery("#formEditService").validate({
		rules: {
			txtPrefix: "required",
			txtTitle: "required",
			txtContent: "required",
			txtPos: "required"
		},
		messages: {
			txtPrefix: "Please enter prefix title.",
			txtTitle: "Please enter title.",
			txtContent: "Please enter content.",
			txtpos: "Please enter position."
		}
	});

	jQuery("#formAddNew").validate({
		rules: {
			cboCat: "required",
			txtTitle: "required",
			txtDate: "required",
			fileLargeImg: {
				required: true,
      			accept: "png|jpeg|jpg|gif"
			},
			fileSmallImg: {
				required: true,
      			accept: "png|jpeg|jpg|gif"
			},
			txtAuthor: "required",
			txtContent: "required"
		},
		messages: {
			cboCat: "Please select category.",
			txtTitle: "Please enter title.",
			txtDate: "Please choose date.",
			fileLargeImg: {
				required: "Please choose a image.",
      			accept: "Please select a valid image file."
			},
			fileSmallImg: {
				required: "Please choose a image.",
      			accept: "Please select a valid image file."
			},
			txtAuthor: "Please enter author.",
			txtContent: "Please enter content."
		}
	});

	jQuery("#formEditNew").validate({
		rules: {
			cboCat: "required",
			txtTitle: "required",
			txtDate: "required",
			txtAuthor: "required",
			txtContent: "required"
		},
		messages: {
			cboCat: "Please select category.",
			txtTitle: "Please enter title.",
			txtDate: "Please choose date.",
			txtAuthor: "Please enter author.",
			txtContent: "Please enter content."
		}
	});

	jQuery("#formAddPage").validate({
		rules: {
			txtPageTitle: "required",
			txtPageContent: "required"
		},
		messages: {
			txtPageTitle: "Please enter page title.",
			txtPageContent: "Please enter page content."
		}
	});

	jQuery("#formEditPage").validate({
		rules: {
			txtPageTitle: "required",
			txtPageContent: "required"
		},
		messages: {
			txtPageTitle: "Please enter page title.",
			txtPageContent: "Please enter page content."
		}
	});


	//for checkbox
	jQuery('input[type=checkbox]').each(function(){
		var t = jQuery(this);
		t.wrap('<span class="checkbox"></span>');
		t.click(function(){
			if(jQuery(this).is(':checked')) {
				t.attr('checked',true);
				t.parent().addClass('checked');
			} else {
				t.attr('checked',false);
				t.parent().removeClass('checked');
			}
		});
	});	

});
