/*
From JavaScript and Forms Tutorial at dyn-web.com
Find information and updates at http://www.dyn-web.com/tutorials/forms/
*/
    
// arguments: reference to select list, option text, option value (optional)
// optional obj to hold prop: idx, el, grp, lbl

function addOptionToSelect(sel, txt, val, obj) {
    var opt = document.createElement('option');
    opt.appendChild( document.createTextNode(txt) );
    
    if ( typeof val === 'string' ) {
        opt.value = val;
    }
    
    if ( !obj ) {
        sel.appendChild(opt);
        return;
    }
    
    var group;
    var el = (typeof obj.el === 'object')? obj.el: (typeof obj.idx === 'number')? sel.options[ obj.idx ]: null;
    
    if (el) {
        // not sel.insertBefore in case optgroup contains
        el.parentNode.insertBefore(opt, el);
        return;
    }
    
    var groups = sel.getElementsByTagName('optgroup');
    
    if ( typeof obj.grp === 'number' ) {
        group = groups[ obj.grp ];
    } else if ( typeof obj.lbl === 'string' ) {
        
        for (var i=0, len=groups.length; i<len; i++) {
            if ( groups[i].label === obj.lbl ) {
                group = groups[i];
                break;
            }
        }
    }
    
    if ( group ) {
        group.appendChild(opt);
    }
    return;
}

// removes all option elements in select list 
// removeGrp (optional) boolean to remove optgroups
function removeAllOptions(sel, removeGrp) {
    var len, groups, par;
    if (removeGrp) {
        groups = sel.getElementsByTagName('optgroup');
        len = groups.length;
        for (var i=len; i; i--) {
            sel.removeChild( groups[i-1] );
        }
        
    }
    
    len = sel.options.length;
    for (var i=len; i; i--) {
        par = sel.options[i-1].parentNode;
        par.removeChild( sel.options[i-1] );
    }
}

// opt is element ref or index
function removeOption(sel, opt) {
    var el = (typeof opt === 'object')? opt: (typeof opt === 'number')? sel.options[ opt ]: null;
    
    if (el) {
        // not sel.removeChild in case optgroup contains
        el.parentNode.removeChild(el);
    }
    
}

// grp is index or label
function removeOptGroup(sel, grp) {
    var group;
    var groups = sel.getElementsByTagName('optgroup');
    
    if ( typeof grp === 'number' ) {
        group = groups[ grp ];
    } else if ( typeof grp === 'string' ) {
        
        for (var i=0, len=groups.length; i<len; i++) {
            if ( groups[i].label === grp ) {
                group = groups[i];
                break;
            }
        }
    }
    
    if ( group ) {
        sel.removeChild(group);
    }
    
}


// set up event handlers for form
/*
var form = document.forms['demoForm'];

form.elements['append'].onclick = function(e) {
    var sel = this.form.elements['selDemo'];
    addOptionToSelect(sel, 'New Option ' + (sel.options.length + 1) );
};

form.elements['grp_idx'].onclick = function() {
    var sel = this.form.elements['selDemo'];
    addOptionToSelect(sel, 'New Option', null, {grp: 0} );
};

form.elements['grp_lbl'].onclick = function() {
    var sel = this.form.elements['selDemo'];
    addOptionToSelect(sel, 'New Option', null, {lbl: 'Group 2'} );
};

form.elements['insert_el'].onclick = function() {
    var sel = this.form.elements['selDemo'];
    addOptionToSelect(sel, 'Before Option 3', null, {el: sel.options[2]} );
};

form.elements['insert_idx'].onclick = function() {
    var sel = this.form.elements['selDemo'];
    addOptionToSelect(sel, 'Before 3rd Option', null, {idx: 2} );
};

form.elements['remove_idx'].onclick = function(e) {
    var sel = this.form.elements['selDemo'];
    removeOption(sel, 1);
};

form.elements['remove_el'].onclick = function(e) {
    var sel = this.form.elements['selDemo'];
    removeOption(sel, sel.options[1] );
};

form.elements['remove_grp'].onclick = function(e) {
    var sel = this.form.elements['selDemo'];
    removeOptGroup(sel, 0);
};

form.elements['remove_lbl'].onclick = function(e) {
    var sel = this.form.elements['selDemo'];
    removeOptGroup(sel, 'Group 2');
};

form.elements['remove_all'].onclick = function(e) {
    var sel = this.form.elements['selDemo'];
    removeAllOptions(sel, true);

};
*/