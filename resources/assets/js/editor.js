/**
 * Editor JS
 */

require('codemirror/lib/codemirror.css') // codemirror
require('tui-editor/dist/tui-editor.css'); // editor ui
require('tui-editor/dist/tui-editor-contents.css'); // editor content
require('highlight.js/styles/github.css'); // code block highlight

window.Editor = require('tui-editor');
require('tui-editor/dist/tui-editor-extScrollSync');

var content = $('#body');

if ( content.length >= 1 ) {
    $(document).ready(function() {
        window.editor = new Editor({
            el: document.querySelector('#editor'),
            initialEditType: 'markdown',
            initialValue: content.val(),
            previewStyle: 'vertical',
            exts: ['scrollSync'],
            height: '90vh'
        });
    });

    $('#post').submit(function(event) {
        content.val( window.editor.getValue() );
        return;
    });
}
