//[editor Javascript]

//Project:	Sunny Admin - Responsive Admin Template
//Primary use:   Used only for the wysihtml5 Editor 


//Add text editor
    $(function () {
    "use strict";

    // Replace the <textarea id="editor1"> with a CKEditor
	// instance, using default configuration.
	if(document.getElementById('editor1')) {
		CKEDITOR.replace('editor1')
	}
	//bootstrap WYSIHTML5 - text editor
	if($('.textarea').length > 0) {
		$('.textarea').wysihtml5();
	}
	
  });


  $(function () {
    "use strict";

    // Replace the <textarea id="editor2"> with a CKEditor
	// instance, using default configuration.
	if(document.getElementById('editor2')) {
		CKEDITOR.replace('editor2')
	}
	//bootstrap WYSIHTML5 - text editor
	if($('.textarea').length > 0) {
		$('.textarea').wysihtml5();
	}
	
  });


