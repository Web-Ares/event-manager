(function () {
    tinymce.PluginManager.add('emb_social_title', function (editor, url) {
        editor.addButton('emb_social_title', {
            text: 'Social Title',
            icon: false,
            onclick: function () {
                editor.focus();
                editor.selection.setContent('[emb_social_title title="' + editor.selection.getContent() + '" /]');
            }
        });
    });
})();