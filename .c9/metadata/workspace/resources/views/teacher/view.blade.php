{"filter":false,"title":"view.blade.php","tooltip":"/resources/views/teacher/view.blade.php","undoManager":{"mark":4,"position":4,"stack":[[{"start":{"row":4,"column":4},"end":{"row":14,"column":29},"action":"remove","lines":["<div class=\"section-body contain-lg\">","        <!-- BEGIN INTRO -->","    \t\t<div class=\"row\">","    \t\t\t<div class=\"col-lg-12\">","    \t\t\t\t<h1 class=\"text-primary\">Thông tin sinh viên</h1>","    \t\t\t</div><!--end .col -->","    \t\t</div><!--end .row -->","    \t<!-- END INTRO -->","    \t<div class=\"row\">","           <div class=\"col-md-12\">","        \t\t\t<div class=\"card\">"],"id":2},{"start":{"row":4,"column":4},"end":{"row":19,"column":25},"action":"insert","lines":["<div class=\"section-body contain-lg\">","    \t<div class=\"row\">","        \t<div class=\"col-lg-12\">","    \t\t\t<div class=\"card card-underline\">","    \t\t\t    <div class=\"card-head card-head-lg\">","\t\t\t\t\t\t<header>Quản lý thông tin giảng viên</header>","\t\t\t\t\t\t<div class=\"tools\">","\t\t\t\t\t\t\t<div class=\"btn-group\">","\t\t\t\t\t\t\t    @if( \\Auth::user()->has_permission( 'teacher::add' ) )","            \t\t\t\t        <a href=\"{{route('teacher::add')}}\" class=\"btn btn-icon-toggle btn-primary\" data-toggle=\"tooltip\" data-placement=\"top\" data-original-title=\"Thêm giảng viên\"><span class=\"fa fa-plus\"></span></a>","            \t\t\t\t    @endif","\t\t\t\t\t\t\t\t<a class=\"btn btn-icon-toggle btn-primary\" href=\"{{ URL::previous() }}\"  data-toggle=\"tooltip\" data-placement=\"top\" data-original-title=\"Trở lại\"><i class=\"fa fa-undo\"></i></a>","\t\t\t\t\t\t\t</div>","\t\t\t\t\t\t</div>","\t\t\t\t\t</div>","    \t\t\t<div class=\"card\">"]}],[{"start":{"row":9,"column":14},"end":{"row":9,"column":21},"action":"remove","lines":["Quản lý"],"id":3},{"start":{"row":9,"column":14},"end":{"row":9,"column":15},"action":"insert","lines":["X"]}],[{"start":{"row":9,"column":15},"end":{"row":9,"column":16},"action":"insert","lines":["e"],"id":4}],[{"start":{"row":9,"column":16},"end":{"row":9,"column":17},"action":"insert","lines":["m"],"id":5}],[{"start":{"row":70,"column":19},"end":{"row":75,"column":13},"action":"remove","lines":["","        \t\t\t\t\t<div class=\"card-actionbar\">","\t\t\t\t\t\t\t\t<div class=\"card-actionbar-row\">","\t\t\t\t\t\t\t\t\t<a class=\"btn ink-reaction btn-primary\" href=\"{{ URL::previous() }}\">back</a>","\t\t\t\t\t\t\t\t</div>","\t\t\t\t\t\t\t</div>"],"id":6}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":70,"column":19},"end":{"row":70,"column":19},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":208,"mode":"ace/mode/php"}},"timestamp":1464590743692,"hash":"02e00bc4e3ff8c48a35e1c4b8054584d44f302d0"}