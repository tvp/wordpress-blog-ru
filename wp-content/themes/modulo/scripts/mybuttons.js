(function() {

    // ---------------------- HALF

    tinymce.create('tinymce.plugins.half', {
        init : function(ed, url) {
            ed.addButton('half', {
                title : 'Column - half (first)',
                image : url+'/img/half.png',
                onclick : function() {
                     ed.selection.setContent('[half_first]' + ed.selection.getContent() + '[/half_first]');
                     ed.undoManager.add();
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('half', tinymce.plugins.half);

    // ---------------------- end half

    // --------------------- HALF LAST

    tinymce.create('tinymce.plugins.half_last', {
        init : function(ed, url) {
            ed.addButton('half_last', {
                title : 'Column - half',
                image : url+'/img/half-last.png',
                onclick : function() {
                     ed.selection.setContent('[half]' + ed.selection.getContent() + '[/half]');
                     ed.undoManager.add();
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('half_last', tinymce.plugins.half_last);

    // ---------------------- end HALF LAST

    // ---------------------- TRIPLE

    tinymce.create('tinymce.plugins.triple', {
        init : function(ed, url) {
            ed.addButton('triple', {
                title : 'Column - third (first)',
                image : url+'/img/triple.png',
                onclick : function() {
                     ed.selection.setContent('[third_first]' + ed.selection.getContent() + '[/third_first]');
                     ed.undoManager.add();
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('triple', tinymce.plugins.triple);

    // ---------------------- end TRIPLE

    // --------------------- TRIPLE LAST

    tinymce.create('tinymce.plugins.triple_last', {
        init : function(ed, url) {
            ed.addButton('triple_last', {
                title : 'Column - third',
                image : url+'/img/triple-last.png',
                onclick : function() {
                     ed.selection.setContent('[third]' + ed.selection.getContent() + '[/third]');
                     ed.undoManager.add();
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('triple_last', tinymce.plugins.triple_last);

    // ---------------------- end TRIPLE LAST

        // ---------------------- doublethird

    tinymce.create('tinymce.plugins.doublethird', {
        init : function(ed, url) {
            ed.addButton('doublethird', {
                title : 'Column - Double third',
                image : url+'/img/doublethird.png',
                onclick : function() {
                     ed.selection.setContent('[double_third]' + ed.selection.getContent() + '[/double_third]');
                     ed.undoManager.add();
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('doublethird', tinymce.plugins.doublethird);

    // ---------------------- end doublethird

    // ---------------------- quarter

    tinymce.create('tinymce.plugins.quarter', {
        init : function(ed, url) {
            ed.addButton('quarter', {
                title : 'Column - quarter (first)',
                image : url+'/img/quarter.png',
                onclick : function() {
                     ed.selection.setContent('[quarter_first]' + ed.selection.getContent() + '[/quarter_first]');
                     ed.undoManager.add();
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('quarter', tinymce.plugins.quarter);

    // ---------------------- end quarter

    // --------------------- quarter LAST

    tinymce.create('tinymce.plugins.quarter_last', {
        init : function(ed, url) {
            ed.addButton('quarter_last', {
                title : 'Column - quarter',
                image : url+'/img/quarter-last.png',
                onclick : function() {
                     ed.selection.setContent('[quarter]' + ed.selection.getContent() + '[/quarter]');
                     ed.undoManager.add();
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('quarter_last', tinymce.plugins.quarter_last);

    // ---------------------- end quarter LAST


    // ---------------------- SLIDE

    tinymce.create('tinymce.plugins.slide', {
        init : function(ed, url) {
            ed.addButton('slide', {
                title : 'Toggle Slide',
                image : url+'/img/slide.png',
                onclick : function() {
                     ed.selection.setContent('[slide title="Change this title"]' + ed.selection.getContent() + '[/slide]');
                     ed.undoManager.add();
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('slide', tinymce.plugins.slide);

    // ---------------------- end slide

    // ---------------------- chlist

    tinymce.create('tinymce.plugins.chlist', {
        init : function(ed, url) {
            ed.addButton('chlist', {
                title : 'check list',
                image : url+'/img/chlist.png',
                onclick : function() {
                     ed.selection.setContent('[check_list]' + ed.selection.getContent() + '[/check_list]');
                     ed.undoManager.add();
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('chlist', tinymce.plugins.chlist);

    // ---------------------- end chlist

    // ---------------------- dropcap

    tinymce.create('tinymce.plugins.dropcap', {
        init : function(ed, url) {
            ed.addButton('dropcap', {
                title : 'Dropcap',
                image : url+'/img/dropcap.png',
                onclick : function() {
                     ed.selection.setContent('[dropcap]' + ed.selection.getContent() + '[/dropcap]');
                     ed.undoManager.add();
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('dropcap', tinymce.plugins.dropcap);

    // ---------------------- end dropcap

    // ---------------------- pullquote

    tinymce.create('tinymce.plugins.pullquote', {
        init : function(ed, url) {
            ed.addButton('pullquote', {
                title : 'Pullquote Left',
                image : url+'/img/pullquote.png',
                onclick : function() {
                     ed.selection.setContent('[pullquote]' + ed.selection.getContent() + '[/pullquote]');
                     ed.undoManager.add();
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('pullquote', tinymce.plugins.pullquote);

    // ---------------------- end pullquote

        // ---------------------- pullquoter

    tinymce.create('tinymce.plugins.pullquoter', {
        init : function(ed, url) {
            ed.addButton('pullquoter', {
                title : 'Pullquote Right',
                image : url+'/img/pullquoter.png',
                onclick : function() {
                     ed.selection.setContent('[pullquote_r]' + ed.selection.getContent() + '[/pullquote_r]');
                     ed.undoManager.add();
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('pullquoter', tinymce.plugins.pullquoter);

    // ---------------------- end pullquoter

        // ---------------------- newsbox

    tinymce.create('tinymce.plugins.newsbox', {
        init : function(ed, url) {
            ed.addButton('newsbox', {
                title : 'Newsbox',
                image : url+'/img/newsbox.png',
                onclick : function() {
                     ed.selection.setContent('[news]' + ed.selection.getContent() + '[/news]');
                     ed.undoManager.add();
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('newsbox', tinymce.plugins.newsbox);

    // ---------------------- end newsbox

        // ---------------------- infobox

    tinymce.create('tinymce.plugins.infobox', {
        init : function(ed, url) {
            ed.addButton('infobox', {
                title : 'Information box',
                image : url+'/img/infobox.png',
                onclick : function() {
                     ed.selection.setContent('[info]' + ed.selection.getContent() + '[/info]');
                     ed.undoManager.add();
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('infobox', tinymce.plugins.infobox);

    // ---------------------- end infobox

        // ---------------------- alertbox

    tinymce.create('tinymce.plugins.alertbox', {
        init : function(ed, url) {
            ed.addButton('alertbox', {
                title : 'Alert box',
                image : url+'/img/alertbox.png',
                onclick : function() {
                     ed.selection.setContent('[alert]' + ed.selection.getContent() + '[/alert]');
                     ed.undoManager.add();
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('alertbox', tinymce.plugins.alertbox);

    // ---------------------- end alertbox

        // ---------------------- succesbox

    tinymce.create('tinymce.plugins.succesbox', {
        init : function(ed, url) {
            ed.addButton('succesbox', {
                title : 'Succes box',
                image : url+'/img/done.png',
                onclick : function() {
                     ed.selection.setContent('[succ]' + ed.selection.getContent() + '[/succ]');
                     ed.undoManager.add();
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('succesbox', tinymce.plugins.succesbox);

    // ---------------------- end succesbox


    // ---------------------- button

    tinymce.create('tinymce.plugins.button', {
        init : function(ed, url) {
            ed.addButton('button', {
                title : 'Button',
                image : url+'/img/button.png',
                onclick : function() {
                     ed.selection.setContent('[button text="Your linktext" url="" /]');
                     ed.undoManager.add();
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('button', tinymce.plugins.button);

    // ---------------------- end button
            // ---------------------- cleanline

    tinymce.create('tinymce.plugins.cleanline', {
        init : function(ed, url) {
            ed.addButton('cleanline', {
                title : 'Clean broken layout',
                image : url+'/img/cleanline.png',
                onclick : function() {
                     ed.selection.setContent('[cline /]');
                     ed.undoManager.add();
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('cleanline', tinymce.plugins.cleanline);

    // ---------------------- end cleanline

            // ---------------------- gmap

    tinymce.create('tinymce.plugins.gmap', {
        init : function(ed, url) {
            ed.addButton('gmap', {
                title : 'Google map',
                image : url+'/img/gmap.png',
                onclick : function() {
                     ed.selection.setContent('[googlemap src="" height="" /]');
                     ed.undoManager.add();
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('gmap', tinymce.plugins.gmap);

    // ---------------------- end gmap

})();