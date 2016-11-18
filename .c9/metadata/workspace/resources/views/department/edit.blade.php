{"filter":false,"title":"edit.blade.php","tooltip":"/resources/views/department/edit.blade.php","undoManager":{"mark":18,"position":18,"stack":[[{"start":{"row":4,"column":4},"end":{"row":16,"column":29},"action":"remove","lines":["<div class=\"section-body contain-lg\">","        <!-- BEGIN INTRO -->","    \t\t<div class=\"row\">","    \t\t\t<div class=\"col-lg-12\">","    \t\t\t\t<h1 class=\"text-primary\">Sửa thông tin bộ môn</h1>","    \t\t\t</div><!--end .col -->","    \t\t</div><!--end .row -->","    \t<!-- END INTRO -->","    \t<div class=\"row\">","           <div class=\"col-md-12\">","        \t\t<form class=\"form\" method=\"post\">","        \t\t    {{ csrf_field() }}","        \t\t\t<div class=\"card\">"],"id":17},{"start":{"row":4,"column":4},"end":{"row":20,"column":12},"action":"insert","lines":["<div class=\"section-body contain-lg\">","    \t<div class=\"row\">","           <div class=\"col-md-12\">","        \t\t<form class=\"form\" method=\"post\" enctype=\"multipart/form-data\">","        \t\t    {{ csrf_field() }}","        \t\t\t<div class=\"card card-underline\">","        \t\t\t\t<div class=\"card-head card-head-lg\">","\t\t\t\t\t\t\t<header>Thêm bộ môn</header>","\t\t\t\t\t\t\t<div class=\"tools\">","\t\t\t\t\t\t\t\t<div class=\"btn-group\">","\t\t\t\t\t\t\t\t    @if( \\Auth::user()->has_permission( 'department::' ) )","\t            \t\t\t\t        <a href=\"{{route('department::')}}\" class=\"btn btn-icon-toggle btn-primary\" data-toggle=\"tooltip\" data-placement=\"top\" data-original-title=\"Danh sách bộ môn\"><span class=\"md md-format-list-bulleted\"></span></a>","\t            \t\t\t\t    @endif","\t\t\t\t\t\t\t\t\t<a class=\"btn btn-icon-toggle btn-primary\" href=\"{{ URL::previous() }}\"  data-toggle=\"tooltip\" data-placement=\"top\" data-original-title=\"Trở lại\"><i class=\"fa fa-undo\"></i></a>","\t\t\t\t\t\t\t\t</div>","\t\t\t\t\t\t\t</div>","\t\t\t\t\t\t</div>"]}],[{"start":{"row":21,"column":50},"end":{"row":22,"column":16},"action":"remove","lines":["","        \t\t\t\t    "],"id":18}],[{"start":{"row":11,"column":15},"end":{"row":11,"column":19},"action":"remove","lines":["Thêm"],"id":19},{"start":{"row":11,"column":15},"end":{"row":11,"column":16},"action":"insert","lines":["S"]}],[{"start":{"row":11,"column":16},"end":{"row":11,"column":17},"action":"insert","lines":["u"],"id":20}],[{"start":{"row":11,"column":16},"end":{"row":11,"column":17},"action":"remove","lines":["u"],"id":21},{"start":{"row":11,"column":16},"end":{"row":11,"column":17},"action":"insert","lines":["ư"]}],[{"start":{"row":11,"column":17},"end":{"row":11,"column":18},"action":"insert","lines":["a"],"id":22}],[{"start":{"row":11,"column":17},"end":{"row":11,"column":18},"action":"remove","lines":["a"],"id":23},{"start":{"row":11,"column":16},"end":{"row":11,"column":17},"action":"remove","lines":["ư"]},{"start":{"row":11,"column":16},"end":{"row":11,"column":17},"action":"insert","lines":["ử"]},{"start":{"row":11,"column":17},"end":{"row":11,"column":18},"action":"insert","lines":["a"]}],[{"start":{"row":11,"column":18},"end":{"row":11,"column":19},"action":"insert","lines":[" "],"id":24}],[{"start":{"row":11,"column":19},"end":{"row":11,"column":20},"action":"insert","lines":["t"],"id":25}],[{"start":{"row":11,"column":20},"end":{"row":11,"column":21},"action":"insert","lines":["h"],"id":26}],[{"start":{"row":11,"column":21},"end":{"row":11,"column":22},"action":"insert","lines":["o"],"id":27}],[{"start":{"row":11,"column":21},"end":{"row":11,"column":22},"action":"remove","lines":["o"],"id":28},{"start":{"row":11,"column":21},"end":{"row":11,"column":22},"action":"insert","lines":["ô"]}],[{"start":{"row":11,"column":22},"end":{"row":11,"column":23},"action":"insert","lines":["n"],"id":29}],[{"start":{"row":11,"column":23},"end":{"row":11,"column":24},"action":"insert","lines":["g"],"id":30}],[{"start":{"row":11,"column":24},"end":{"row":11,"column":25},"action":"insert","lines":[" "],"id":31}],[{"start":{"row":11,"column":25},"end":{"row":11,"column":26},"action":"insert","lines":["t"],"id":32}],[{"start":{"row":11,"column":26},"end":{"row":11,"column":27},"action":"insert","lines":["i"],"id":33}],[{"start":{"row":11,"column":27},"end":{"row":11,"column":28},"action":"insert","lines":["n"],"id":34}],[{"start":{"row":39,"column":90},"end":{"row":40,"column":91},"action":"remove","lines":["","        \t\t\t\t\t\t<a class=\"btn ink-reaction btn-primary\" href=\"{{ URL::previous() }}\">back</a>"],"id":35}]]},"ace":{"folds":[],"scrolltop":345.9999785423279,"scrollleft":0,"selection":{"start":{"row":39,"column":90},"end":{"row":39,"column":90},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":82,"mode":"ace/mode/php"}},"timestamp":1464596580802,"hash":"6ec0cba22cd2157750ed44a5011dd2a9f0912dbb"}