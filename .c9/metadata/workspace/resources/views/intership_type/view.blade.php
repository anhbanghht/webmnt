{"filter":false,"title":"view.blade.php","tooltip":"/resources/views/intership_type/view.blade.php","undoManager":{"mark":9,"position":9,"stack":[[{"start":{"row":37,"column":19},"end":{"row":42,"column":13},"action":"remove","lines":["","        \t\t\t\t\t<div class=\"card-actionbar\">","\t\t\t\t\t\t\t\t<div class=\"card-actionbar-row\">","\t\t\t\t\t\t\t\t\t<a class=\"btn ink-reaction btn-primary\" href=\"{{ URL::previous() }}\">back</a>","\t\t\t\t\t\t\t\t</div>","\t\t\t\t\t\t\t</div>"],"id":43}],[{"start":{"row":4,"column":4},"end":{"row":14,"column":29},"action":"remove","lines":["<div class=\"section-body contain-lg\">","        <!-- BEGIN INTRO -->","    \t\t<div class=\"row\">","    \t\t\t<div class=\"col-lg-12\">","    \t\t\t\t<h1 class=\"text-primary\">Thông tin loại thực tập</h1>","    \t\t\t</div><!--end .col -->","    \t\t</div><!--end .row -->","    \t<!-- END INTRO -->","    \t<div class=\"row\">","           <div class=\"col-md-12\">","        \t\t\t<div class=\"card\">"],"id":44},{"start":{"row":4,"column":4},"end":{"row":18,"column":11},"action":"insert","lines":["<div class=\"section-body contain-lg\">","    \t<div class=\"row\">","        \t<div class=\"col-lg-12\">","    \t\t\t<div class=\"card card-underline\">","    \t\t\t    <div class=\"card-head card-head-lg\">","\t\t\t\t\t\t<header>Quản lý thông tin đợt thực tập</header>","\t\t\t\t\t\t<div class=\"tools\">","\t\t\t\t\t\t\t<div class=\"btn-group\">","\t\t\t\t\t\t\t    @if( \\Auth::user()->has_permission( 'intership_type::add' ) )","            \t\t\t\t        <a href=\"{{route('intership_type::add')}}\" class=\"btn btn-icon-toggle btn-primary\" data-toggle=\"tooltip\" data-placement=\"top\" data-original-title=\"Thêm người dùng\"><span class=\"fa fa-plus\"></span></a>","            \t\t\t\t    @endif","\t\t\t\t\t\t\t\t<a class=\"btn btn-icon-toggle btn-primary\" href=\"{{ URL::previous() }}\"  data-toggle=\"tooltip\" data-placement=\"top\" data-original-title=\"Trở lại\"><i class=\"fa fa-undo\"></i></a>","\t\t\t\t\t\t\t</div>","\t\t\t\t\t\t</div>","\t\t\t\t\t</div>"]}],[{"start":{"row":9,"column":14},"end":{"row":9,"column":21},"action":"remove","lines":["Quản lý"],"id":45},{"start":{"row":9,"column":14},"end":{"row":9,"column":15},"action":"insert","lines":["X"]}],[{"start":{"row":9,"column":15},"end":{"row":9,"column":16},"action":"insert","lines":["e"],"id":46}],[{"start":{"row":9,"column":16},"end":{"row":9,"column":17},"action":"insert","lines":["m"],"id":47}],[{"start":{"row":9,"column":28},"end":{"row":9,"column":31},"action":"remove","lines":["đợt"],"id":48},{"start":{"row":9,"column":28},"end":{"row":9,"column":29},"action":"insert","lines":["l"]}],[{"start":{"row":9,"column":29},"end":{"row":9,"column":30},"action":"insert","lines":["o"],"id":49}],[{"start":{"row":9,"column":30},"end":{"row":9,"column":31},"action":"insert","lines":["a"],"id":50}],[{"start":{"row":9,"column":31},"end":{"row":9,"column":32},"action":"insert","lines":["i"],"id":51}],[{"start":{"row":9,"column":31},"end":{"row":9,"column":32},"action":"remove","lines":["i"],"id":52},{"start":{"row":9,"column":30},"end":{"row":9,"column":31},"action":"remove","lines":["a"]},{"start":{"row":9,"column":30},"end":{"row":9,"column":31},"action":"insert","lines":["ạ"]},{"start":{"row":9,"column":31},"end":{"row":9,"column":32},"action":"insert","lines":["i"]}]]},"ace":{"folds":[],"scrolltop":180,"scrollleft":0,"selection":{"start":{"row":13,"column":16},"end":{"row":13,"column":16},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":208,"mode":"ace/mode/php"}},"timestamp":1464591388449,"hash":"d34750c3690a95aec54369862b458d1821bbe5b6"}