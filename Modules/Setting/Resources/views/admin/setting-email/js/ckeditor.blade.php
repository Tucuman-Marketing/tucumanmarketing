
{!!Html::script('theme-admin/volgh/assets/plugins/ckeditor4/ckeditor.js')!!}

<script>
if ( CKEDITOR.env.ie && CKEDITOR.env.version < 9 )
	CKEDITOR.tools.enableHtml5Elements( document );

// The trick to keep the editor in the sample quite small
// unless user specified own height.
CKEDITOR.config.height = 150;
CKEDITOR.config.width = 'auto';

var initSampleCreate = ( function() {
	var wysiwygareaAvailable = isWysiwygareaAvailable(),
		isBBCodeBuiltIn = !!CKEDITOR.plugins.get( 'bbcode' );

	return function() {
		var editorElement = CKEDITOR.document.getById( 'editor-create' );

		// :(((
		if ( isBBCodeBuiltIn ) {
			editorElement.setHtml(
				'Hello world!\n\n' +
				'I\'m an instance of [url=https://ckeditor.com]CKEditor[/url].'
			);
		}

		// Depending on the wysiwygarea plugin availability initialize classic or inline editor.
		if ( wysiwygareaAvailable ) {
			CKEDITOR.replace( 'editor' );
		} else {
			editorElement.setAttribute( 'contenteditable', 'true' );
			CKEDITOR.inline( 'editor' );

			// TODO we can consider displaying some info box that
			// without wysiwygarea the classic editor may not work.
		}
	};

	function isWysiwygareaAvailable() {
		// If in development mode, then the wysiwygarea must be available.
		// Split REV into two strings so builder does not replace it :D.
		if ( CKEDITOR.revision == ( '%RE' + 'V%' ) ) {
			return true;
		}

		return !!CKEDITOR.plugins.get( 'wysiwygarea' );
	}
} )();
</script>



<script>
        if ( CKEDITOR.env.ie && CKEDITOR.env.version < 9 )
                CKEDITOR.tools.enableHtml5Elements( document );
        
        // The trick to keep the editor in the sample quite small
        // unless user specified own height.
        CKEDITOR.config.height = 150;
        CKEDITOR.config.width = 'auto';
        
        var initSampleEdit = ( function() {
                var wysiwygareaAvailable = isWysiwygareaAvailable(),
                        isBBCodeBuiltIn = !!CKEDITOR.plugins.get( 'bbcode' );
        
                return function() {
                        var editorElement = CKEDITOR.document.getById( 'editor-edit' );
        
                        // :(((
                        if ( isBBCodeBuiltIn ) {
                                editorElement.setHtml(
                                        'Hello world!\n\n' +
                                        'I\'m an instance of [url=https://ckeditor.com]CKEditor[/url].'
                                );
                        }
        
                        // Depending on the wysiwygarea plugin availability initialize classic or inline editor.
                        if ( wysiwygareaAvailable ) {
                                CKEDITOR.replace( 'editor' );
                        } else {
                                editorElement.setAttribute( 'contenteditable', 'true' );
                                CKEDITOR.inline( 'editor' );
        
                                // TODO we can consider displaying some info box that
                                // without wysiwygarea the classic editor may not work.
                        }
                };
        
                function isWysiwygareaAvailable() {
                        // If in development mode, then the wysiwygarea must be available.
                        // Split REV into two strings so builder does not replace it :D.
                        if ( CKEDITOR.revision == ( '%RE' + 'V%' ) ) {
                                return true;
                        }
        
                        return !!CKEDITOR.plugins.get( 'wysiwygarea' );
                }
        } )();
        </script>


<script>
	initSampleCreate();
        initSampleEdit();
</script>