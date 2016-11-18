{"filter":false,"title":"add.blade1.php","tooltip":"/resources/views/program/add.blade1.php","undoManager":{"mark":1,"position":1,"stack":[[{"start":{"row":0,"column":0},"end":{"row":11,"column":12},"action":"insert","lines":["<div class=\"row\">","\t\t\t\t\t\t\t<div class=\"col-lg-12\">","\t\t\t\t\t\t\t\t<h1 class=\"text-primary\">Form wizard</h1>","\t\t\t\t\t\t\t</div><!--end .col -->","\t\t\t\t\t\t\t<div class=\"col-lg-8\">","\t\t\t\t\t\t\t\t<article class=\"margin-bottom-xxl\">","\t\t\t\t\t\t\t\t\t<p class=\"lead\">","\t\t\t\t\t\t\t\t\t\tA form wizard let's you define how the data is grouped and sorted.","\t\t\t\t\t\t\t\t\t</p>","\t\t\t\t\t\t\t\t</article>","\t\t\t\t\t\t\t</div><!--end .col -->","\t\t\t\t\t\t</div>"],"id":1}],[{"start":{"row":0,"column":0},"end":{"row":11,"column":12},"action":"remove","lines":["<div class=\"row\">","\t\t\t\t\t\t\t<div class=\"col-lg-12\">","\t\t\t\t\t\t\t\t<h1 class=\"text-primary\">Form wizard</h1>","\t\t\t\t\t\t\t</div><!--end .col -->","\t\t\t\t\t\t\t<div class=\"col-lg-8\">","\t\t\t\t\t\t\t\t<article class=\"margin-bottom-xxl\">","\t\t\t\t\t\t\t\t\t<p class=\"lead\">","\t\t\t\t\t\t\t\t\t\tA form wizard let's you define how the data is grouped and sorted.","\t\t\t\t\t\t\t\t\t</p>","\t\t\t\t\t\t\t\t</article>","\t\t\t\t\t\t\t</div><!--end .col -->","\t\t\t\t\t\t</div>"],"id":2},{"start":{"row":0,"column":0},"end":{"row":80,"column":16},"action":"insert","lines":["<div id=\"rootwizard1\" class=\"form-wizard form-wizard-horizontal\">","\t\t\t\t\t\t\t\t\t\t\t<form class=\"form floating-label\">","\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-wizard-nav\">","\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"progress\" style=\"width: 75%;\"><div class=\"progress-bar progress-bar-primary\" style=\"width: 0%;\"></div></div>","\t\t\t\t\t\t\t\t\t\t\t\t\t<ul class=\"nav nav-justified nav-pills\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t<li class=\"active\"><a href=\"#tab1\" data-toggle=\"tab\"><span class=\"step\">1</span> <span class=\"title\">LOCATION</span></a></li>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t<li><a href=\"#tab2\" data-toggle=\"tab\"><span class=\"step\">2</span> <span class=\"title\">ADDRESS</span></a></li>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t<li><a href=\"#tab3\" data-toggle=\"tab\"><span class=\"step\">3</span> <span class=\"title\">SETTINGS</span></a></li>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t<li><a href=\"#tab4\" data-toggle=\"tab\"><span class=\"step\">4</span> <span class=\"title\">CONFIRM</span></a></li>","\t\t\t\t\t\t\t\t\t\t\t\t\t</ul>","\t\t\t\t\t\t\t\t\t\t\t\t</div><!--end .form-wizard-nav -->","\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"tab-content clearfix\">","\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"tab-pane active\" id=\"tab1\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t<br><br>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-group\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"Address\" id=\"Address\" class=\"form-control\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"Address\" class=\"control-label\">Address</label>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"row\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-8\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-group\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"City\" id=\"City\" class=\"form-control\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"City\" class=\"control-label\">City</label>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-4\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-group\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"State\" id=\"State\" class=\"form-control\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"State\" class=\"control-label\">State</label>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>","\t\t\t\t\t\t\t\t\t\t\t\t\t</div><!--end #tab1 -->","\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"tab-pane\" id=\"tab2\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t<br><br>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-group\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"Country\" id=\"Country\" class=\"form-control\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"Country\" class=\"control-label\">Country</label>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-group\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"Zipcode\" id=\"Zipcode\" class=\"form-control\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"Zipcode\" class=\"control-label\">Zipcode</label>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>","\t\t\t\t\t\t\t\t\t\t\t\t\t</div><!--end #tab2 -->","\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"tab-pane\" id=\"tab3\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t<br><br>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-group\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"URL\" id=\"URL\" class=\"form-control\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"URL\" class=\"control-label\">URL</label>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<p class=\"help-block\">Starts with http://</p>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-group\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"rangelength\" id=\"rangelength\" class=\"form-control\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"rangelength\" class=\"control-label\">Range restriction</label>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<p class=\"help-block\">Between 5 and 10</p>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>","\t\t\t\t\t\t\t\t\t\t\t\t\t</div><!--end #tab3 -->","\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"tab-pane\" id=\"tab4\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t<br><br>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-group\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<select id=\"Age1\" name=\"Age\" class=\"form-control\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"\">&nbsp;</option>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"30\">30</option>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"40\">40</option>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"50\">50</option>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"60\">60</option>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"70\">70</option>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</select>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"Age1\">Age</label>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<p class=\"help-block\">This is supporting text for this field.</p>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>","\t\t\t\t\t\t\t\t\t\t\t\t\t</div><!--end #tab4 -->","\t\t\t\t\t\t\t\t\t\t\t\t</div><!--end .tab-content -->","\t\t\t\t\t\t\t\t\t\t\t\t<ul class=\"pager wizard\">","\t\t\t\t\t\t\t\t\t\t\t\t\t<li class=\"previous first disabled\"><a class=\"btn-raised\" href=\"javascript:void(0);\">First</a></li>","\t\t\t\t\t\t\t\t\t\t\t\t\t<li class=\"previous disabled\"><a class=\"btn-raised\" href=\"javascript:void(0);\">Previous</a></li>","\t\t\t\t\t\t\t\t\t\t\t\t\t<li class=\"next last\"><a class=\"btn-raised\" href=\"javascript:void(0);\">Last</a></li>","\t\t\t\t\t\t\t\t\t\t\t\t\t<li class=\"next\"><a class=\"btn-raised\" href=\"javascript:void(0);\">Next</a></li>","\t\t\t\t\t\t\t\t\t\t\t\t</ul>","\t\t\t\t\t\t\t\t\t\t\t</form>","\t\t\t\t\t\t\t\t\t\t</div>"]}],[{"start":{"row":0,"column":0},"end":{"row":80,"column":16},"action":"remove","lines":["<div id=\"rootwizard1\" class=\"form-wizard form-wizard-horizontal\">","\t\t\t\t\t\t\t\t\t\t\t<form class=\"form floating-label\">","\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-wizard-nav\">","\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"progress\" style=\"width: 75%;\"><div class=\"progress-bar progress-bar-primary\" style=\"width: 0%;\"></div></div>","\t\t\t\t\t\t\t\t\t\t\t\t\t<ul class=\"nav nav-justified nav-pills\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t<li class=\"active\"><a href=\"#tab1\" data-toggle=\"tab\"><span class=\"step\">1</span> <span class=\"title\">LOCATION</span></a></li>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t<li><a href=\"#tab2\" data-toggle=\"tab\"><span class=\"step\">2</span> <span class=\"title\">ADDRESS</span></a></li>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t<li><a href=\"#tab3\" data-toggle=\"tab\"><span class=\"step\">3</span> <span class=\"title\">SETTINGS</span></a></li>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t<li><a href=\"#tab4\" data-toggle=\"tab\"><span class=\"step\">4</span> <span class=\"title\">CONFIRM</span></a></li>","\t\t\t\t\t\t\t\t\t\t\t\t\t</ul>","\t\t\t\t\t\t\t\t\t\t\t\t</div><!--end .form-wizard-nav -->","\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"tab-content clearfix\">","\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"tab-pane active\" id=\"tab1\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t<br><br>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-group\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"Address\" id=\"Address\" class=\"form-control\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"Address\" class=\"control-label\">Address</label>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"row\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-8\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-group\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"City\" id=\"City\" class=\"form-control\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"City\" class=\"control-label\">City</label>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-4\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-group\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"State\" id=\"State\" class=\"form-control\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"State\" class=\"control-label\">State</label>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>","\t\t\t\t\t\t\t\t\t\t\t\t\t</div><!--end #tab1 -->","\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"tab-pane\" id=\"tab2\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t<br><br>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-group\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"Country\" id=\"Country\" class=\"form-control\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"Country\" class=\"control-label\">Country</label>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-group\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"Zipcode\" id=\"Zipcode\" class=\"form-control\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"Zipcode\" class=\"control-label\">Zipcode</label>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>","\t\t\t\t\t\t\t\t\t\t\t\t\t</div><!--end #tab2 -->","\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"tab-pane\" id=\"tab3\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t<br><br>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-group\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"URL\" id=\"URL\" class=\"form-control\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"URL\" class=\"control-label\">URL</label>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<p class=\"help-block\">Starts with http://</p>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-group\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"rangelength\" id=\"rangelength\" class=\"form-control\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"rangelength\" class=\"control-label\">Range restriction</label>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<p class=\"help-block\">Between 5 and 10</p>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>","\t\t\t\t\t\t\t\t\t\t\t\t\t</div><!--end #tab3 -->","\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"tab-pane\" id=\"tab4\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t<br><br>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-group\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<select id=\"Age1\" name=\"Age\" class=\"form-control\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"\">&nbsp;</option>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"30\">30</option>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"40\">40</option>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"50\">50</option>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"60\">60</option>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"70\">70</option>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</select>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"Age1\">Age</label>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<p class=\"help-block\">This is supporting text for this field.</p>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>","\t\t\t\t\t\t\t\t\t\t\t\t\t</div><!--end #tab4 -->","\t\t\t\t\t\t\t\t\t\t\t\t</div><!--end .tab-content -->","\t\t\t\t\t\t\t\t\t\t\t\t<ul class=\"pager wizard\">","\t\t\t\t\t\t\t\t\t\t\t\t\t<li class=\"previous first disabled\"><a class=\"btn-raised\" href=\"javascript:void(0);\">First</a></li>","\t\t\t\t\t\t\t\t\t\t\t\t\t<li class=\"previous disabled\"><a class=\"btn-raised\" href=\"javascript:void(0);\">Previous</a></li>","\t\t\t\t\t\t\t\t\t\t\t\t\t<li class=\"next last\"><a class=\"btn-raised\" href=\"javascript:void(0);\">Last</a></li>","\t\t\t\t\t\t\t\t\t\t\t\t\t<li class=\"next\"><a class=\"btn-raised\" href=\"javascript:void(0);\">Next</a></li>","\t\t\t\t\t\t\t\t\t\t\t\t</ul>","\t\t\t\t\t\t\t\t\t\t\t</form>","\t\t\t\t\t\t\t\t\t\t</div>"],"id":3},{"start":{"row":0,"column":0},"end":{"row":80,"column":16},"action":"insert","lines":["<div id=\"rootwizard1\" class=\"form-wizard form-wizard-horizontal\">","\t\t\t\t\t\t\t\t\t\t\t<form class=\"form floating-label\">","\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-wizard-nav\">","\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"progress\" style=\"width: 75%;\"><div class=\"progress-bar progress-bar-primary\" style=\"width: 0%;\"></div></div>","\t\t\t\t\t\t\t\t\t\t\t\t\t<ul class=\"nav nav-justified nav-pills\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t<li class=\"active\"><a href=\"#tab1\" data-toggle=\"tab\"><span class=\"step\">1</span> <span class=\"title\">LOCATION</span></a></li>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t<li><a href=\"#tab2\" data-toggle=\"tab\"><span class=\"step\">2</span> <span class=\"title\">ADDRESS</span></a></li>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t<li><a href=\"#tab3\" data-toggle=\"tab\"><span class=\"step\">3</span> <span class=\"title\">SETTINGS</span></a></li>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t<li><a href=\"#tab4\" data-toggle=\"tab\"><span class=\"step\">4</span> <span class=\"title\">CONFIRM</span></a></li>","\t\t\t\t\t\t\t\t\t\t\t\t\t</ul>","\t\t\t\t\t\t\t\t\t\t\t\t</div><!--end .form-wizard-nav -->","\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"tab-content clearfix\">","\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"tab-pane active\" id=\"tab1\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t<br><br>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-group\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"Address\" id=\"Address\" class=\"form-control\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"Address\" class=\"control-label\">Address</label>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"row\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-8\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-group\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"City\" id=\"City\" class=\"form-control\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"City\" class=\"control-label\">City</label>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-4\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-group\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"State\" id=\"State\" class=\"form-control\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"State\" class=\"control-label\">State</label>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>","\t\t\t\t\t\t\t\t\t\t\t\t\t</div><!--end #tab1 -->","\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"tab-pane\" id=\"tab2\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t<br><br>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-group\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"Country\" id=\"Country\" class=\"form-control\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"Country\" class=\"control-label\">Country</label>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-group\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"Zipcode\" id=\"Zipcode\" class=\"form-control\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"Zipcode\" class=\"control-label\">Zipcode</label>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>","\t\t\t\t\t\t\t\t\t\t\t\t\t</div><!--end #tab2 -->","\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"tab-pane\" id=\"tab3\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t<br><br>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-group\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"URL\" id=\"URL\" class=\"form-control\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"URL\" class=\"control-label\">URL</label>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<p class=\"help-block\">Starts with http://</p>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-group\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"rangelength\" id=\"rangelength\" class=\"form-control\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"rangelength\" class=\"control-label\">Range restriction</label>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<p class=\"help-block\">Between 5 and 10</p>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>","\t\t\t\t\t\t\t\t\t\t\t\t\t</div><!--end #tab3 -->","\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"tab-pane\" id=\"tab4\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t<br><br>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-group\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<select id=\"Age1\" name=\"Age\" class=\"form-control\">","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"\">&nbsp;</option>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"30\">30</option>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"40\">40</option>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"50\">50</option>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"60\">60</option>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"70\">70</option>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</select>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"Age1\">Age</label>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<p class=\"help-block\">This is supporting text for this field.</p>","\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>","\t\t\t\t\t\t\t\t\t\t\t\t\t</div><!--end #tab4 -->","\t\t\t\t\t\t\t\t\t\t\t\t</div><!--end .tab-content -->","\t\t\t\t\t\t\t\t\t\t\t\t<ul class=\"pager wizard\">","\t\t\t\t\t\t\t\t\t\t\t\t\t<li class=\"previous first disabled\"><a class=\"btn-raised\" href=\"javascript:void(0);\">First</a></li>","\t\t\t\t\t\t\t\t\t\t\t\t\t<li class=\"previous disabled\"><a class=\"btn-raised\" href=\"javascript:void(0);\">Previous</a></li>","\t\t\t\t\t\t\t\t\t\t\t\t\t<li class=\"next last\"><a class=\"btn-raised\" href=\"javascript:void(0);\">Last</a></li>","\t\t\t\t\t\t\t\t\t\t\t\t\t<li class=\"next\"><a class=\"btn-raised\" href=\"javascript:void(0);\">Next</a></li>","\t\t\t\t\t\t\t\t\t\t\t\t</ul>","\t\t\t\t\t\t\t\t\t\t\t</form>","\t\t\t\t\t\t\t\t\t\t</div>"]}]]},"ace":{"folds":[],"scrolltop":910.4000463485718,"scrollleft":0,"selection":{"start":{"row":67,"column":10},"end":{"row":67,"column":10},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":62,"mode":"ace/mode/php"}},"timestamp":1462584274126,"hash":"42180ac05f21aaefddafd5d00d9c5f69b6ce566f"}