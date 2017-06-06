(function() {
    // Documentation : https://www.tinymce.com/docs/api/tinymce/tinymce.plugin/
    tinymce.PluginManager.add('gavickpro_tc_button', function( editor, url ) {
        editor.addButton( 'gavickpro_tc_button', {
            title: 'Ajouter un bouton',
            image: url + '/optimizator-button-icon.png',
            //icon: 'wp_code',
            onclick: function() {
                editor.windowManager.open( {
                    title: 'Insérer un bouton',
                    width: 500,
                    height: 150,
                    body: [{
                        type: 'textbox',
                        name: 'title',
                        label: 'Texte du bouton'
                    },
                    {
                        type: 'textbox',
                        name: 'url',
                        label: 'Lien'
                    },
                    {
                        type: 'checkbox',
                        name: 'externe',
                        text: 'S\'ouvre dans un nouvel onglet'
                    }],
                    onsubmit: function( e ) {
                        var tata ='';
                        if (e.data.externe === true ){
                            tata += ' target="_blank" ';
                        }
                        editor.insertContent(
                            '<a href="' + e.data.url + '" class="bouton bouton--blanc" ' + tata +' >' + e.data.title + '</a>'
                        );
                    }
                });
            }
        });
    });
})();