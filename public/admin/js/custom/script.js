jQuery(document).ready(function() {
    jQuery(function() {
        jQuery('.img-upload').change(function() {
            var parentP = jQuery(this).parents('p');
            var prevParentP = parentP.prev('p');

        	var file = this.files[0];
            var imagefile = file.type;
            var match = ["image/jpeg", "image/png", "image/jpg"];
            if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2]))) {
                prevParentP.find('.previewing').attr('src', '../img/no-img.jpg');
                return false;
            } else {
                var reader = new FileReader();
                reader.onload = function(e){
                    prevParentP.find('.previewing').attr('src', e.target.result);
                };
                reader.readAsDataURL(this.files[0]);
            }
        });
    });
});
