$(document).ready(function () {
Cufon.replace('.logo .title');
InitMenuEffects ();
InitNotifications ();
InitContentBoxes ();
InitTables ();
InitFancybox ();
InitWYSIWYG ();
InitQuickEdit ();
});


/* *********************************************************************
 * Main Menu
 * *********************************************************************/
function InitMenuEffects () {
	/* Sliding submenus */
	$('.sidebar .menu ul ul').hide();
	$('.sidebar .menu ul li.active ul').show();
	
/*	$('.sidebar .menu ul li').click(function () {
		submenu = $(this).find('ul');
		if (submenu.is(':visible'))
			submenu.slideUp(150);
		else
			submenu.slideDown(200);
		return false;
	});
*/
	/* Hover effect on links */
	$('.sidebar .menu li a').hover(
		function () { $(this).stop().animate({'paddingLeft': '18px'}, 200); },
		function () { $(this).stop().animate({'paddingLeft': '12px'}, 200); }
	)
}

/* *********************************************************************
 * Content Boxes
 * *********************************************************************/
function InitContentBoxes () {
	/* Checkboxes */
	$('.content-box .select-all').click(function () {
		if ($(this).is(':checked'))
			$(this).parent().parent().parent().parent().find(':checkbox').attr('checked', true);
		else
			$(this).parent().parent().parent().parent().find(':checkbox').attr('checked', false); 
	});
	
	/* Tabs */
	$('.content-box .tabs').idTabs();
}

/* *********************************************************************
 * Notifications
 * *********************************************************************/
function InitNotifications () {
	$('.notification .close').click(function () {
		$(this).parent().fadeOut(1000, function() {
			$(this).find('p').fixClearType ();
		});		
		return false;
	});
}

/* *********************************************************************
 * Data Tables
 * *********************************************************************/
function InitTables () {
	$('.datatable').dataTable({
		'bLengthChange': true,
		'bPaginate': true,
		'sPaginationType': 'full_numbers',
		'iDisplayLength': -1,
		'bInfo': false,
		'oLanguage': 
		{
			'sSearch': 'Search all columns:',
			'oPaginate': 
			{
				'sNext': '&gt;',
				'sLast': '&gt;&gt;',
				'sFirst': '&lt;&lt;',
				'sPrevious': '&lt;'
			}
		}
	});
}

/* *********************************************************************
 * Fancybox
 * *********************************************************************/
function InitFancybox () {
	$('.modal-link').fancybox({
		'modal' 				: false,
		'hideOnOverlayClick' 	: 'true',
		'hideOnContentClick' 	: 'true',
		'enableEscapeButton' 	: true,
		'showCloseButton' 		: true		
	});
	
	$("a[href$='gif']").fancybox();
	$("a[href$='jpg']").fancybox();
	$("a[href$='png']").fancybox(); 	
}

/* *********************************************************************
 * WYSIWYG
 * *********************************************************************/
function InitWYSIWYG () {
	$('.jwysiwyg').wysiwyg({
		controls: {
			strikeThrough : { visible : true },
			underline     : { visible : true },

			separator00 : { visible : true },

			justifyLeft   : { visible : true },
			justifyCenter : { visible : true },
			justifyRight  : { visible : true },
			justifyFull   : { visible : true },

			separator01 : { visible : true },

			indent  : { visible : true },
			outdent : { visible : true },

			separator02 : { visible : true },

			subscript   : { visible : true },
			superscript : { visible : true },

			separator03 : { visible : true },

			undo : { visible : true },
			redo : { visible : true },

			separator04 : { visible : true },

			insertOrderedList    : { visible : true },
			insertUnorderedList  : { visible : true },
			insertHorizontalRule : { visible : true },

			separator07 : { visible : true },

			cut   : { visible : true },
			copy  : { visible : true },
			paste : { visible : true }
		}
	});
 }
/* *********************************************************************
 * Quick Edit
 * *********************************************************************/
function InitQuickEdit () {
	$.editable.addInputType('datepicker', {
                element : function(settings, original) {
                    var input = $('<input>');
                    if (settings.width  != 'none') { input.width(settings.width);  }
                    if (settings.height != 'none') { input.height(settings.height); }
                    input.attr('autocomplete','off');
                    $(this).append(input);
                    return(input);
                },
                plugin : function(settings, original) {
                    var form = this;
                    settings.onblur = 'ignore';
                    $(this).find('input').datepicker({
                        firstDay: 1,
                        dateFormat: 'dd/mm/yy',
                        closeText: 'X',
                        onSelect: function(dateText) {
                                $(this).hide();
                                $(form).trigger('submit');
                        },
                        onClose: function(dateText) {
                                original.reset.apply(form, [settings, original]);
                                $(original).addClass(settings.cssdecoration);
                                $(this).hide();
                                $(form).trigger('submit');
                        }
                    });
                }
        });



        $('.quick_edit').click(function () {
                $(this).parent().parent().find('td.edit-field').click();
                return false;
        });

        $('.edit-textfield').editable('http://www.google.com/', {
                'type': 'text'
        });

        $('.edit-date').editable('date.html', {
             'type' : 'datepicker'
        });
       
        $('.edit-textarea').editable('http://www.google.com/', {
                'type': 'textarea'
        });
        
        $('.edit-select').editable('http://www.google.com/', {
                'data': "{'true': 'Active', 'false': 'Inactive'}",
                'type': 'select'
        });
}

jQuery.fn.fixClearType = function(){
    return this.each(function(){
        if( !!(typeof this.style.filter  && this.style.removeAttribute))
            this.style.removeAttribute("filter");
    })

} 
