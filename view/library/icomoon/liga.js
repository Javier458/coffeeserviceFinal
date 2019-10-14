/* A polyfill for browsers that don't support ligatures. */
/* The script tag referring to this file must be placed before the ending body tag. */

/* To provide support for elements dynamically added, this script adds
   method 'icomoonLiga' to the window object. You can pass element references to this method.
*/
(function () {
    'use strict';
    function supportsProperty(p) {
        var prefixes = ['Webkit', 'Moz', 'O', 'ms'],
            i,
            div = document.createElement('div'),
            ret = p in div.style;
        if (!ret) {
            p = p.charAt(0).toUpperCase() + p.substr(1);
            for (i = 0; i < prefixes.length; i += 1) {
                ret = prefixes[i] + p in div.style;
                if (ret) {
                    break;
                }
            }
        }
        return ret;
    }
    var icons;
    if (!supportsProperty('fontFeatureSettings')) {
        icons = {
            'home': '&#xe900;',
            'house': '&#xe900;',
            'newspaper': '&#xe904;',
            'news': '&#xe904;',
            'image': '&#xe90d;',
            'picture': '&#xe90d;',
            'books': '&#xe920;',
            'library': '&#xe920;',
            'profile': '&#xe923;',
            'file2': '&#xe923;',
            'folder-plus': '&#xe931;',
            'directory3': '&#xe931;',
            'folder-minus': '&#xe932;',
            'directory4': '&#xe932;',
            'price-tag': '&#xe935;',
            'price-tags': '&#xe936;',
            'cart': '&#xe93a;',
            'purchase': '&#xe93a;',
            'phone': '&#xe942;',
            'telephone': '&#xe942;',
            'envelop': '&#xe945;',
            'mail': '&#xe945;',
            'box-add': '&#xe95e;',
            'box3': '&#xe95e;',
            'box-remove': '&#xe95f;',
            'box4': '&#xe95f;',
            'bubble': '&#xe96b;',
            'comment': '&#xe96b;',
            'user': '&#x1f321;',
            'profile2': '&#x1f321;',
            'users': '&#xe972;',
            'group': '&#xe972;',
            'user-plus': '&#xe973;',
            'user2': '&#xe973;',
            'user-minus': '&#xe974;',
            'user3': '&#xe974;',
            'user-check': '&#xe975;',
            'user4': '&#xe975;',
            'user-tie': '&#xe976;',
            'user5': '&#xe976;',
            'hour-glass': '&#xe979;',
            'loading': '&#xe979;',
            'spinner': '&#xe97a;',
            'loading2': '&#xe97a;',
            'spinner2': '&#xe97b;',
            'loading3': '&#xe97b;',
            'spinner3': '&#xe97c;',
            'loading4': '&#xe97c;',
            'binoculars': '&#xe985;',
            'lookup': '&#xe985;',
            'search': '&#xe986;',
            'magnifier': '&#xe986;',
            'key': '&#xe98d;',
            'password': '&#xe98d;',
            'key2': '&#xe98e;',
            'password2': '&#xe98e;',
            'wrench': '&#xe991;',
            'tool': '&#xe991;',
            'cog': '&#xe994;',
            'gear': '&#xe994;',
            'cogs': '&#xe995;',
            'gears': '&#xe995;',
            'gift': '&#xe99f;',
            'present': '&#xe99f;',
            'bin': '&#xe9ac;',
            'trashcan': '&#xe9ac;',
            'bin2': '&#xe9ad;',
            'trashcan2': '&#xe9ad;',
            'happy': '&#xe9df;',
            'emoticon': '&#xe9df;',
            'sad2': '&#xe9e6;',
            'emoticon8': '&#xe9e6;',
            'wondering': '&#xe9fb;',
            'emoticon29': '&#xe9fb;',
            'wondering2': '&#xe9fc;',
            'emoticon30': '&#xe9fc;',
            'question': '&#xea09;',
            'help': '&#xea09;',
            'info': '&#xea0c;',
            'information': '&#xea0c;',
            'cancel-circle': '&#xea0d;',
            'close': '&#xea0d;',
            'cross': '&#xea0f;',
            'cancel': '&#xea0f;',
            'enter': '&#xea13;',
            'signin': '&#xea13;',
            'checkbox-checked': '&#xea52;',
            'checkbox': '&#xea52;',
            'mail2': '&#xea83;',
            'contact2': '&#xea83;',
            'mail3': '&#xea84;',
            'contact3': '&#xea84;',
            'mail5': '&#xea86;',
            'contact5': '&#xea86;',
            'dropbox': '&#xeaae;',
            'brand38': '&#xeaae;',
          '0': 0
        };
        delete icons['0'];
        window.icomoonLiga = function (els) {
            var classes,
                el,
                i,
                innerHTML,
                key;
            els = els || document.getElementsByTagName('*');
            if (!els.length) {
                els = [els];
            }
            for (i = 0; ; i += 1) {
                el = els[i];
                if (!el) {
                    break;
                }
                classes = el.className;
                if (/icon-/.test(classes)) {
                    innerHTML = el.innerHTML;
                    if (innerHTML && innerHTML.length > 1) {
                        for (key in icons) {
                            if (icons.hasOwnProperty(key)) {
                                innerHTML = innerHTML.replace(new RegExp(key, 'g'), icons[key]);
                            }
                        }
                        el.innerHTML = innerHTML;
                    }
                }
            }
        };
        window.icomoonLiga();
    }
}());
