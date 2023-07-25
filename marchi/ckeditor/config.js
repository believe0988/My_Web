/**
 * @license Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.toolbar = "TadToolbar";
	config.toolbar_TadToolbar = 
	[
		['Source'],
		['Templates'],
		['Undo','Redo'],
		['Find'],
		['Link','Image','Youtube'],
		['Bold','Italic'],
		['Underline'],
		['NumberedList','BulletedList'],
		['Format','FontSize'],
		['TextColor','BGColor'],
		['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock']
	];
	//
	config.format_tags = 'p;h2;h3;h4;h5;h6';
	//開啟上傳功能
	config.filebrowserBrowseUrl = 'ckfinder/ckfinder.html?resourceType=Files';
	config.filebrowserImageBrowseUrl = 'ckfinder/ckfinder.html?resourceType=Images';
	config.filebrowserUploadUrl = 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
	config.filebrowserImageUploadUrl = 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
	//安裝Youtube套件
	config.extraPlugins = 'youtube';
	config.youtube_width = '640';
	config.youtube_height = '480';
	config.youtube_responsive = true;																							//響應式，忽略寬高，自適應寬度
	config.youtube_related = true;																								//顯示相關視頻
	config.youtube_older = false;																								//舊的嵌入碼
	config.youtube_privacy = false;																								//隱私增加模式
	config.youtube_autoplay = false;																							//自動開始
	config.youtube_controls = true;																								//顯示撥放器控件
	config.youtube_disabled_fields = ['txtEmbed', 'txtWidth', 'txtHeight', 'chkResponsive', 'chkNoEmbed', 'chkOlderCode'];		//禁止修改欄位
	//ENTER變成BR，不用P包住全文
	config.enterMode = CKEDITOR.ENTER_BR;
	config.shiftEnterMode = CKEDITOR.ENTER_P;
	config.removePlugins = 'elementspath';
	//允許空的i標籤
	config.protectedSource.push(/<i[^>]><\/i>/g);
	CKEDITOR.dtd.$removeEmpty['i'] = false;
	//允許進階標籤語法
	config.allowedContent = true;
	//設置寬高
	config.width = 'calc(100% - 2px)';
	config.height = 'calc(50vh - 2px)';
	//設置範本
	config.templates_files = ['ckeditor/plugins/templates/my_template/my_template.js'];
	config.templates = 'my_templates';
};
