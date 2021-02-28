window.cash = require('cash-dom');
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
let simpleEditorConfig = {
  toolbar: {
    items: ["bold", "italic", "underline", "link"]
  }
}

let editorConfig = {
  cloudServices: {
    tokenUrl: "",
    uploadUrl: ""
  },

  toolbar: {
    items: [
      "fontSize",
      "fontFamily",
      "fontColor",
      "fontBackgroundColor",
      "bold",
      "italic",
      "underline",
      "strikethrough",
      "code",
      "subscript",
      "superscript",
      "link",
      "undo",
      "redo",
      "imageUpload",
      "highlight"
    ]
  }
}

cash('.editor').each(function() {
  let editor = ClassicEditor
  let options = editorConfig
  let el = this

  if (cash(el).data('simple-toolbar')) {
    options = simpleEditorConfig
  }

  editor
    .create(el, options)
    .then(editor => {
      if (cash(el).closest('.editor').data('editor') == 'document') {
        cash(el).closest('.editor').find('.document-editor__toolbar').append(editor.ui.view.toolbar.element)
        window.editor = editor
      }
    })
    .catch(error => {
      console.error(error.stack)
    })
})
