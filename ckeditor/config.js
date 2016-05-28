/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';

	var baseUrl = '/minhlongtrans/admin';

	config.filebrowserBrowseUrl = baseUrl + '/ckfinder/ckfinder.html';

	config.filebrowserImageBrowseUrl = baseUrl + '/ckfinder/ckfinder.html?type=Images';
	 
	config.filebrowserFlashBrowseUrl = baseUrl + '/ckfinder/ckfinder.html?type=Flash';
	 
	config.filebrowserUploadUrl = baseUrl + '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
	 
	config.filebrowserImageUploadUrl = baseUrl + '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
	 
	config.filebrowserFlashUploadUrl = baseUrl + '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
};
