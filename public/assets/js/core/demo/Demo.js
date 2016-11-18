(function (namespace, $) {
	"use strict";

	var Demo = function () {
		// Create reference to this instance
		var o = this;
		// Initialize app when document is ready
		$(document).ready(function () {
			o.initialize();
		});
		$(".time-mask").hover(function() {
			$(".form-control.time-mask").inputmask('h:s', {placeholder: 'hh:mm'});
		});
		$(".case").hover(function() {
			$(".case").spinner({min: 1,max:15});
		});
		$(".number").hover(function() {
			$(".number").spinner({min: 1});
		});
		$(".number-assign").hover(function() {
			$(".number-assign").spinner({min: 1});
		});
		$(".date").hover(function() {
			$(":input").inputmask();
		});
	};
	var p = Demo.prototype;

	// =========================================================================
	// INIT
	// =========================================================================

	p.initialize = function () {
		this._enableEvents();
		this._initButtonStates();
		this._initIconSearch();
		this._initInversedTogglers();
		this._initChatMessage();
		//layouts
		this._enableEventsLayout();
		//table
		this._initDataTables();
		//form
		this._initTypeahead();
		this._initAutocomplete();
		this._initSelect2();
		this._initMultiSelect();
		this._initInputMask();
		this._initDatePicker();
		this._initSliders();
		this._initSpinners();
		this._initColorPickers();
		
		//wizard form
		this._initWizard1();
		this._initWizard2();
		
		
	};

	// =========================================================================
	// EVENTS
	// =========================================================================

	// events
	p._enableEvents = function () {
		var o = this;

		$('.card-head .tools .btn-refresh').on('click', function (e) {
			o._handleCardRefresh(e);
		});
		$('.card-head .tools .btn-collapse').on('click', function (e) {
			o._handleCardCollapse(e);
		});
		$('.card-head .tools .btn-close').on('click', function (e) {
			o._handleCardClose(e);
		});
		$('.card-head .tools .menu-card-styling a').on('click', function (e) {
			o._handleCardStyling(e);
		});
		$('.theme-selector a').on('click', function (e) {
			o._handleThemeSwitch(e);
		});
	};

	// =========================================================================
	// CARD ACTIONS
	// =========================================================================

	p._handleCardRefresh = function (e) {
		var o = this;
		var card = $(e.currentTarget).closest('.card');
		materialadmin.AppCard.addCardLoader(card);
		setTimeout(function () {
			materialadmin.AppCard.removeCardLoader(card);
		}, 1500);
	};

	p._handleCardCollapse = function (e) {
		var card = $(e.currentTarget).closest('.card');
		materialadmin.AppCard.toggleCardCollapse(card);
	};

	p._handleCardClose = function (e) {
		var card = $(e.currentTarget).closest('.card');
		materialadmin.AppCard.removeCard(card);
	};

	p._handleCardStyling = function (e) {
		// Get selected style and active card
		var newStyle = $(e.currentTarget).data('style');
		var card = $(e.currentTarget).closest('.card');

		// Display the selected style in the dropdown menu
		$(e.currentTarget).closest('ul').find('li').removeClass('active');
		$(e.currentTarget).closest('li').addClass('active');

		// Find all cards with a 'style-' class
		var styledCard = card.closest('[class*="style-"]');

		if (styledCard.length > 0 && (!styledCard.hasClass('style-white') && !styledCard.hasClass('style-transparent'))) {
			// If a styled card is found, replace the style with the selected style
			// Exclude style-white and style-transparent
			styledCard.attr('class', function (i, c) {
				return c.replace(/\bstyle-\S+/g, newStyle);
			});
		}
		else {
			// Create variable to check if a style is switched
			var styleSwitched = false;

			// When no cards are found with a style, look inside the card for styled headers or body
			card.find('[class*="style-"]').each(function () {
				// Replace the style with the selected style
				// Exclude style-white and style-transparent
				if (!$(this).hasClass('style-white') && !$(this).hasClass('style-transparent')) {
					$(this).attr('class', function (i, c) {
						return c.replace(/\bstyle-\S+/g, newStyle);
					});
					styleSwitched = true;
				}
			});

			// If no style is switched, add 1 to the main Card
			if (styleSwitched === false) {
				card.addClass(newStyle);
			}
		}
	};

	// =========================================================================
	// COLOR SWITCHER
	// =========================================================================
	
	p._handleThemeSwitch = function (e) {
		e.preventDefault();
		var newTheme = $(e.currentTarget).attr('href');
		this.switchTheme(newTheme);
	};
	
	p.switchTheme = function (theme) {
		$('link').each(function () {
			var href = $(this).attr('href');
			href = href.replace(/(assets\/css\/)(.*)(\/)/g, 'assets/css/' + theme + '/');
			$(this).attr('href', href);
		});
	};

	// =========================================================================
	// CHAT MESSAGE
	// =========================================================================
	
	p._initChatMessage = function (e) {
		var o = this;
		$('#sidebarChatMessage').keydown(function (e) {
			o._handleChatMessage(e);
		});
	};
	
	p._handleChatMessage = function (e) {
		var input = $(e.currentTarget);
		
		// Detect enter
		if (e.keyCode === 13) {
			e.preventDefault();
			
			// Get chat message
			var demoTime = new Date().getHours() + ':' + new Date().getMinutes();
			var demoImage = $('.list-chats li img').attr('src');
			
			// Create html
			var html = '';
			html += '<li>';
			html += '	<div class="chat">';
			html += '		<div class="chat-avatar"><img class="img-circle" src="' + demoImage + '" alt=""></div>';
			html += '		<div class="chat-body">';
			html += '			' + input.val();
			html += '			<small>' + demoTime + '</small>';
			html += '		</div>';
			html += '	</div>';
			html += '</li>';
			var $new = $(html).hide();
			
			// Add to chat list
			$('.list-chats').prepend($new);
			
			// Animate new inserts
			$new.show('fast');
			
			// Reset chat input
			input.val('').trigger('autosize.resize');
			
			// Refresh for correct scroller size
			$('.offcanvas').trigger('refresh');
		}
	};

	// =========================================================================
	// INVERSE UI TOGGLERS
	// =========================================================================
	
	p._initInversedTogglers = function () {
		var o = this;

		
		$('input[name="menubarInversed"]').on('change', function (e) {
			o._handleMenubarInversed(e);
		});
		$('input[name="headerInversed"]').on('change', function (e) {
			o._handleHeaderInversed(e);
		});
	};
	
	p._handleMenubarInversed = function (e) {
		if($(e.currentTarget).val() === '1') {
			$('#menubar').addClass('menubar-inverse');
		}
		else {
			$('#menubar').removeClass('menubar-inverse');
		}
	};
	p._handleHeaderInversed = function (e) {
		if($(e.currentTarget).val() === '1') {
			$('#header').addClass('header-inverse');
		}
		else {
			$('#header').removeClass('header-inverse');
		}
	};
	
	// =========================================================================
	// BUTTON STATES (LOADING)
	// =========================================================================

	p._initButtonStates = function () {
		$('.btn-loading-state').click(function () {
			var btn = $(this);
			btn.button('loading');
			setTimeout(function () {
				btn.button('reset');
			}, 3000);
		});
	};

	// =========================================================================
	// ICON SEARCH
	// =========================================================================

	p._initIconSearch = function () {
		if($('#iconsearch').length === 0) {
			return;
		}

		$('#iconsearch').focus();
		$('#iconsearch').on('keyup', function () {
			var val = $('#iconsearch').val();
			$('.col-md-3').hide();
			$('.col-md-3:contains("' + val + '")').each(function (e) {
				$(this).show();
			});

			$('.card').hide();
			$('.card:contains("' + val + '")').each(function (e) {
				$(this).show();
			});
		});
	};
	// =========================================================================
	// DATATABLES
	// =========================================================================

	p._initDataTables = function() {
		if (!$.isFunction($.fn.dataTable)) {
			return;
		}

		// Init the demo DataTables
		this._createAssignTable();
		this._createDataTable1();
		this._createDataTable2();
	};
	
	p._createAssignTable = function() {
		
		$('#assigntable').DataTable({
			"dom": 'CT<"clear">lfrtip',
			"tableTools": {
	            "sSwfPath": "../public/assets/js/libs/DataTables/extensions/TableTools/swf/copy_csv_xls_pdf.swf"
	        },
			"order": [],
			"colVis": {
				"buttonText": "Columns",
				"overlayFade": 0,
				"align": "right"
			},
			"language": {
				"lengthMenu": '_MENU_ entries per page',
				"search": '<i class="fa fa-search"></i>',
				"paginate": {
					"previous": '<i class="fa fa-angle-left"></i>',
					"next": '<i class="fa fa-angle-right"></i>'
				}
			}
		});

		/*$('#assigntable tbody').on('click', 'tr', function() {
			$(this).toggleClass('selected');
		});*/
	};

	p._createDataTable1 = function() {
		$('#datatable1').DataTable({
			"dom": 'lCfrtip',
			"order": [],
			"colVis": {
				"buttonText": "Columns",
				"overlayFade": 0,
				"align": "right"
			},
			"language": {
				"lengthMenu": '_MENU_ entries per page',
				"search": '<i class="fa fa-search"></i>',
				"paginate": {
					"previous": '<i class="fa fa-angle-left"></i>',
					"next": '<i class="fa fa-angle-right"></i>'
				}
			}
		});

		$('#datatable1 tbody').on('click', 'tr', function() {
			$(this).toggleClass('selected');
		});
	};

	p._createDataTable2 = function() {
		var table = $('#datatable2').DataTable({
			"dom": 'T<"clear">lfrtip',
			"ajax": $('#datatable2').data('source'),
			"columns": [
				{
					"class": 'details-control',
					"orderable": false,
					"data": null,
					"defaultContent": ''
				},
				{"data": "name"},
				{"data": "position"},
				{"data": "office"},
				{"data": "salary"}
			],
			"tableTools": {
				"sSwfPath": $('#datatable2').data('swftools')
			},
			"order": [[1, 'asc']],
			"language": {
				"lengthMenu": '_MENU_ entries per page',
				"search": '<i class="fa fa-search"></i>',
				"paginate": {
					"previous": '<i class="fa fa-angle-left"></i>',
					"next": '<i class="fa fa-angle-right"></i>'
				}
			}
		});
		
		//Add event listener for opening and closing details
		var o = this;
		$('#datatable2 tbody').on('click', 'td.details-control', function() {
			var tr = $(this).closest('tr');
			var row = table.row(tr);

			if (row.child.isShown()) {
				// This row is already open - close it
				row.child.hide();
				tr.removeClass('shown');
			}
			else {
				// Open this row
				row.child(o._formatDetails(row.data())).show();
				tr.addClass('shown');
			}
		});
	};

	// =========================================================================
	// DETAILS
	// =========================================================================

	p._formatDetails = function(d) {
		// `d` is the original data object for the row
		return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
				'<tr>' +
				'<td>Full name:</td>' +
				'<td>' + d.name + '</td>' +
				'</tr>' +
				'<tr>' +
				'<td>Extension number:</td>' +
				'<td>' + d.extn + '</td>' +
				'</tr>' +
				'<tr>' +
				'<td>Extra info:</td>' +
				'<td>And any further details here (images etc)...</td>' +
				'</tr>' +
				'</table>';
	};	
	
	// =========================================================================
	// TYPEAHEAD
	// =========================================================================

	p._initTypeahead = function () {
		if (!$.isFunction($.fn.typeahead)) {
			return;
		}
		var countries = new Bloodhound({
			datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
			queryTokenizer: Bloodhound.tokenizers.whitespace,
			limit: 10,
			prefetch: {
				// url points to a json file that contains an array of country names, see
				// https://github.com/twitter/typeahead.js/blob/gh-pages/data/countries.json
				url: $('#autocomplete1').data('source'),
				// the json file contains an array of strings, but the Bloodhound
				// suggestion engine expects JavaScript objects so this converts all of
				// those strings
				filter: function (list) {
					return $.map(list, function (country) {
						return {name: country};
					});
				}
			}
		});
		countries.initialize();
		$('#autocomplete1').typeahead(null, {
			name: 'countries',
			displayKey: 'name',
			// `ttAdapter` wraps the suggestion engine in an adapter that
			// is compatible with the typeahead jQuery plugin
			source: countries.ttAdapter()
		});
	};
	
	// =========================================================================
	// AUTOCOMPLETE
	// =========================================================================

	p._initAutocomplete = function () {
		if (!$.isFunction($.fn.autocomplete)) {
			return;
		}

		$.ajax({
			url: $('#autocomplete2').data('source'),
			dataType: "json",
			success: function (countries) {
				$("#autocomplete2").autocomplete({
					source: function (request, response) {
						var results = $.ui.autocomplete.filter(countries, request.term);
						response(results.slice(0, 10));
					}
				});
			}
		});
	};

	// =========================================================================
	// COLORPICKER
	// =========================================================================

	p._initColorPickers = function () {
		if (!$.isFunction($.fn.colorpicker)) {
			return;
		}
		$('#cp1').colorpicker();
		$('#cp2').colorpicker();
		$('#cp3').colorpicker().on('changeColor', function (ev) {
			$(ev.currentTarget).closest('.card-body').css('background', ev.color.toHex());
		});
	};

	// =========================================================================
	// SPINNERS
	// =========================================================================

	p._initSpinners = function () {
		if (!$.isFunction($.fn.spinner)) {
			return;
		}
		$(".case").spinner({min: 1,max:15});
		$(".number").spinner({min: 1});
		$("#spinner-decimal").spinner({step: 0.01, numberFormat: "n", max: 1});
	};

	// =========================================================================
	// SLIDERS
	// =========================================================================

	p._initSliders = function () {
		if (!$.isFunction($.fn.slider)) {
			return;
		}
		$("#slider").slider({range: "min", value: 50, min: 0, max: 100,
			slide: function (event, ui) {
				$('#slider-value').empty().append(ui.value);
			}
		});
		$("#slider-step").slider({value: 100, min: 0, max: 500, step: 50,
			slide: function (event, ui) {
				$('#step-value').empty().append(ui.value);
			}
		});
		$("#slider-range").slider({range: true, min: 0, max: 100, values: [25, 75],
			slide: function (event, ui) {
				$('#range-value1').empty().append(ui.values[ 0 ]);
				$('#range-value2').empty().append(ui.values[ 1 ]);
			}
		});

		$("#eq > span").each(function () {
			var value = parseInt($(this).text(), 10);
			$(this).empty().slider({value: value, range: "min", animate: true, orientation: "vertical"});
			$(this).css('height', '100px');
			$(this).css('margin-right', '30px');
			$(this).css('float', 'left');
		});
	};

	// =========================================================================
	// SELECT2
	// =========================================================================

	p._initSelect2 = function () {
		if (!$.isFunction($.fn.select2)) {
			return;
		}
		$(".select2-list").select2({
			allowClear: true
		});
	};

	// =========================================================================
	// MultiSelect
	// =========================================================================

	p._initMultiSelect = function () {
		if (!$.isFunction($.fn.multiSelect)) {
			return;
		}
		$('#optgroup').multiSelect({selectableOptgroup: true});
	};

	// =========================================================================
	// InputMask
	// =========================================================================

	p._initInputMask = function () {
		if (!$.isFunction($.fn.inputmask)) {
			return;
		}
		$(":input").inputmask();
		$(".form-control.dollar-mask").inputmask('$ 999,999,999.99', {numericInput: true, rightAlignNumerics: false});
		$(".form-control.euro-mask").inputmask('€ 999.999.999,99', {numericInput: true, rightAlignNumerics: false});
		$(".form-control.time-mask").inputmask('h:s', {placeholder: 'hh:mm'});
		$(".form-control.time12-mask").inputmask('hh:mm t', {placeholder: 'hh:mm xm', alias: 'time12', hourFormat: '12'});
	};

	// =========================================================================
	// Date Picker
	// =========================================================================

	p._initDatePicker = function () {
		if (!$.isFunction($.fn.datepicker)) {
			return;
		}

		$('#demo-date').datepicker({autoclose: true, todayHighlight: true});
		$('#demo-date-month').datepicker({autoclose: true, todayHighlight: true, minViewMode: 1});
		$('#demo-date-format').datepicker({autoclose: true, todayHighlight: true, format: "yyyy/mm/dd"});
		$('#demo-date-range').datepicker({todayHighlight: true});
		$('#demo-date-inline').datepicker({todayHighlight: true});
	};

	// =========================================================================
	// DATATABLES
	// =========================================================================

	p.initDataTables = function (grid) {
		if (!$.isFunction($.fn.dataTable)) {
			return;
		}

		$.extend(jQuery.fn.dataTableExt.oSort, {
			"numeric-comma-pre": function (a) {
				var x = (a == "-") ? 0 : a.replace(/,/, ".");
				return parseFloat(x);
			},
			"numeric-comma-asc": function (a, b) {
				return ((a < b) ? -1 : ((a > b) ? 1 : 0));
			},
			"numeric-comma-desc": function (a, b) {
				return ((a < b) ? 1 : ((a > b) ? -1 : 0));
			}
		});
		grid.dataTable({
			"sDom": 'lCfrtip',
			"sPaginationType": "full_numbers",
			"aaSorting": [],
			"aoColumns": [
				null,
				null,
				null,
				{"sType": "numeric-comma"},
				null
			],
			"oColVis": {
				"buttonText": "Columns",
				"iOverlayFade": 0,
				"sAlign": "right"
			},
			"oLanguage": {
				"sLengthMenu": '_MENU_ entries per page',
				"sSearch": '<i class="icon-search"></i>',
				"oPaginate": {
					"sPrevious": '<i class="fa fa-angle-left"></i>',
					"sNext": '<i class="fa fa-angle-right"></i>'
				}
			}
		});
	};
	
	// =========================================================================
	// EVENTS
	// =========================================================================

	// events
	p._enableEventsLayout = function () {
		var o = this;

		$('.card-outlined').on('click', function (e) {
			var btn = $(e.currentTarget).next('.text-caption').find('a');
			o._changeLayout(btn);
		});
		$('.layoutButton').on('click', function (e) {
			var btn = $(e.currentTarget);
			o._changeLayout(btn);
		});
	};

	// =========================================================================
	// LAYOUT
	// =========================================================================

	p._changeLayout = function (btn) {
		var layout = btn.data('layout');
		var card = btn.parent().prev('.card');
		
		// Set correct card states
		$('.card.style-accent').removeClass('style-accent').addClass('style-default-bright');
		card.addClass('style-accent');
		
		// Set correct button states
		$('.layoutButton').removeClass('disabled').empty().append('Activate');
		btn.empty().append('Activated').addClass('disabled').blur();
		
		// Remove all layout classes
		$('body').removeClass('header-fixed');
		$('body').removeClass('menubar-first');
		$('body').removeClass('menubar-pin');
		$('#menubar').data('expanded', false);

		// Select appropriate layout classes
		switch (layout) {
			case 1:
				$('body').addClass('header-fixed');
				$('body').addClass('menubar-pin');
				$('#menubar').data('expanded', true);
				break;
			case 2:
				$('body').addClass('header-fixed');
				break;
			case 3:
				$('body').addClass('header-fixed');
				$('body').addClass('menubar-pin');
				$('body').addClass('menubar-first');
				$('#menubar').data('expanded', true);
				break;
			case 4:
				$('body').addClass('header-fixed');
				$('body').addClass('menubar-first');
				break;
			case 5:
				$('body').addClass('menubar-pin');
				$('body').addClass('menubar-first');
				$('#menubar').data('expanded', true);
				break;
			case 6:
				$('body').addClass('menubar-first');
				break;
		}
	};
	
	//Wizard 
	p._initWizard1 = function() {
		var o = this;
		$('#rootwizard1').bootstrapWizard({
			onTabShow: function(tab, navigation, index) {
				o._handleTabShow(tab, navigation, index, $('#rootwizard1'));
			}
		});
	};

	p._handleTabShow = function(tab, navigation, index, wizard){
		var total = navigation.find('li').length;
		var current = index + 0;
		var percent = (current / (total - 1)) * 100;
		var percentWidth = 100 - (100 / total) + '%';
		
		navigation.find('li').removeClass('done');
		navigation.find('li.active').prevAll().addClass('done');
		
		wizard.find('.progress-bar').css({width: percent + '%'});
		$('.form-wizard-horizontal').find('.progress').css({'width': percentWidth});
	};
	
	// =========================================================================
	// WIZARD 1
	// =========================================================================

	p._initWizard2 = function() {
		var o = this;
		$('#rootwizard2').bootstrapWizard({
			onTabShow: function(tab, navigation, index) {
				o._handleTabShow(tab, navigation, index, $('#rootwizard2'));
			},
	  		onNext: function(tab, navigation, index) {
				var form = $('#rootwizard2').find('.form-validation');
	  			var valid = form.valid();
	  			if(!valid) {
	  				form.data('validator').focusInvalid();
	  				return false;
	  			}
	  		}
		});
	};

	p._handleTabShow = function(tab, navigation, index, wizard){
		var total = navigation.find('li').length;
		var current = index + 0;
		var percent = (current / (total - 1)) * 100;
		var percentWidth = 100 - (100 / total) + '%';
		
		navigation.find('li').removeClass('done');
		navigation.find('li.active').prevAll().addClass('done');
		
		wizard.find('.progress-bar').css({width: percent + '%'});
		$('.form-wizard-horizontal').find('.progress').css({'width': percentWidth});
	};
	// =========================================================================
	namespace.Demo = new Demo;
}(this.materialadmin, jQuery)); // pass in (namespace, jQuery):
