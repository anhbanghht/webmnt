{"filter":false,"title":"edit.blade.php","tooltip":"/resources/views/subject/edit.blade.php","undoManager":{"mark":26,"position":26,"stack":[[{"start":{"row":0,"column":0},"end":{"row":46,"column":5},"action":"insert","lines":["@extends('layouts.default')","","@section('content')","<section>","    <div class=\"section-body contain-lg\">","        <!-- BEGIN INTRO -->","    \t\t<div class=\"row\">","    \t\t\t<div class=\"col-lg-12\">","    \t\t\t\t<h1 class=\"text-primary\">Sửa thông tin cơ sở thực tập</h1>","    \t\t\t</div><!--end .col -->","    \t\t</div><!--end .row -->","    \t<!-- END INTRO -->","    \t<div class=\"row\">","           <div class=\"col-md-12\">","        \t\t<form class=\"form\" method=\"post\">","        \t\t    {{ csrf_field() }}","        \t\t\t<div class=\"card\">","        \t\t\t\t<div class=\"card-body floating-label\">","        \t\t\t\t    ","        \t\t\t\t\t<div class=\"row\">","        \t\t\t\t\t\t<div class=\"col-sm-6\">","        \t\t\t\t\t\t\t<div class=\"form-group\">","        \t\t\t\t\t\t\t\t<input class=\"form-control\" id=\"tenbomon\" name=\"tebomon\" type=\"text\" value=\"{{$bomon->tenbomon}}\">","        \t\t\t\t\t\t\t\t<label for=\"tenbomon\">Tên booj moon:</label>","        \t\t\t\t\t\t\t</div>","        \t\t\t\t\t\t</div>","        \t\t\t\t\t\t","    \t\t\t\t\t\t\t<div class=\"col-sm-12\">","        \t\t\t\t\t\t\t<div class=\"form-group\">","    \t\t\t\t\t\t\t\t\t<textarea aria-required=\"true\" name=\"ghichu\" id=\"ghichu\" class=\"form-control\" rows=\"3\" required=\"\">{{$bomon->ghichu}}</textarea>","    \t\t\t\t\t\t\t\t\t<label for=\"ghichu\">Ghi chú:</label>","    \t\t\t\t\t\t\t\t</div>","    \t\t\t\t\t\t\t</div>","        \t\t\t\t\t</div>","        \t\t\t\t</div><!--end .card-body -->","        \t\t\t\t<div class=\"card-actionbar\">","        \t\t\t\t\t<div class=\"card-actionbar-row\">","        \t\t\t\t\t\t<button type=\"submit\" class=\"btn btn-flat btn-primary ink-reaction\">Cập nhập</button>","        \t\t\t\t\t</div>","        \t\t\t\t</div>","        \t\t\t</div><!--end .card -->","        \t\t</form>","        \t</div>","        </div>","\t</div>","</section>","@stop"],"id":1}],[{"start":{"row":8,"column":37},"end":{"row":8,"column":61},"action":"remove","lines":["thông tin cơ sở thực tập"],"id":2},{"start":{"row":8,"column":37},"end":{"row":8,"column":38},"action":"insert","lines":["c"]}],[{"start":{"row":8,"column":38},"end":{"row":8,"column":39},"action":"insert","lines":["h"],"id":3}],[{"start":{"row":8,"column":39},"end":{"row":8,"column":40},"action":"insert","lines":["u"],"id":4}],[{"start":{"row":8,"column":40},"end":{"row":8,"column":41},"action":"insert","lines":["o"],"id":5}],[{"start":{"row":8,"column":41},"end":{"row":8,"column":42},"action":"insert","lines":["g"],"id":6}],[{"start":{"row":8,"column":42},"end":{"row":8,"column":43},"action":"insert","lines":["w"],"id":7}],[{"start":{"row":8,"column":42},"end":{"row":8,"column":43},"action":"remove","lines":["w"],"id":8}],[{"start":{"row":8,"column":41},"end":{"row":8,"column":42},"action":"remove","lines":["g"],"id":9}],[{"start":{"row":8,"column":41},"end":{"row":8,"column":42},"action":"insert","lines":["n"],"id":10},{"start":{"row":8,"column":42},"end":{"row":8,"column":43},"action":"insert","lines":["g"]},{"start":{"row":8,"column":42},"end":{"row":8,"column":43},"action":"remove","lines":["g"]},{"start":{"row":8,"column":41},"end":{"row":8,"column":42},"action":"remove","lines":["n"]},{"start":{"row":8,"column":40},"end":{"row":8,"column":41},"action":"remove","lines":["o"]},{"start":{"row":8,"column":39},"end":{"row":8,"column":40},"action":"remove","lines":["u"]},{"start":{"row":8,"column":39},"end":{"row":8,"column":40},"action":"insert","lines":["ư"]},{"start":{"row":8,"column":40},"end":{"row":8,"column":41},"action":"insert","lines":["ơ"]},{"start":{"row":8,"column":41},"end":{"row":8,"column":42},"action":"insert","lines":["n"]},{"start":{"row":8,"column":42},"end":{"row":8,"column":43},"action":"insert","lines":["g"]},{"start":{"row":8,"column":43},"end":{"row":8,"column":44},"action":"insert","lines":[" "]}],[{"start":{"row":8,"column":44},"end":{"row":8,"column":45},"action":"insert","lines":["t"],"id":11}],[{"start":{"row":8,"column":45},"end":{"row":8,"column":46},"action":"insert","lines":["r"],"id":12}],[{"start":{"row":8,"column":46},"end":{"row":8,"column":47},"action":"insert","lines":["i"],"id":13}],[{"start":{"row":8,"column":47},"end":{"row":8,"column":48},"action":"insert","lines":["n"],"id":14}],[{"start":{"row":8,"column":48},"end":{"row":8,"column":49},"action":"insert","lines":["h"],"id":15}],[{"start":{"row":8,"column":48},"end":{"row":8,"column":49},"action":"remove","lines":["h"],"id":16},{"start":{"row":8,"column":47},"end":{"row":8,"column":48},"action":"remove","lines":["n"]},{"start":{"row":8,"column":46},"end":{"row":8,"column":47},"action":"remove","lines":["i"]},{"start":{"row":8,"column":46},"end":{"row":8,"column":47},"action":"insert","lines":["ì"]},{"start":{"row":8,"column":47},"end":{"row":8,"column":48},"action":"insert","lines":["n"]},{"start":{"row":8,"column":48},"end":{"row":8,"column":49},"action":"insert","lines":["h"]}],[{"start":{"row":8,"column":49},"end":{"row":8,"column":50},"action":"insert","lines":[" "],"id":17}],[{"start":{"row":8,"column":50},"end":{"row":8,"column":51},"action":"insert","lines":["d"],"id":18}],[{"start":{"row":8,"column":50},"end":{"row":8,"column":51},"action":"remove","lines":["d"],"id":19},{"start":{"row":8,"column":50},"end":{"row":8,"column":51},"action":"insert","lines":["đ"]}],[{"start":{"row":8,"column":51},"end":{"row":8,"column":52},"action":"insert","lines":["a"],"id":20}],[{"start":{"row":8,"column":51},"end":{"row":8,"column":52},"action":"remove","lines":["a"],"id":21},{"start":{"row":8,"column":51},"end":{"row":8,"column":52},"action":"insert","lines":["à"]}],[{"start":{"row":8,"column":52},"end":{"row":8,"column":53},"action":"insert","lines":["o"],"id":22}],[{"start":{"row":8,"column":53},"end":{"row":8,"column":54},"action":"insert","lines":[" "],"id":23}],[{"start":{"row":8,"column":54},"end":{"row":8,"column":55},"action":"insert","lines":["t"],"id":24}],[{"start":{"row":8,"column":55},"end":{"row":8,"column":56},"action":"insert","lines":["a"],"id":25}],[{"start":{"row":8,"column":56},"end":{"row":8,"column":57},"action":"insert","lines":["o"],"id":26}],[{"start":{"row":8,"column":56},"end":{"row":8,"column":57},"action":"remove","lines":["o"],"id":27},{"start":{"row":8,"column":55},"end":{"row":8,"column":56},"action":"remove","lines":["a"]},{"start":{"row":8,"column":55},"end":{"row":8,"column":56},"action":"insert","lines":["ạ"]},{"start":{"row":8,"column":56},"end":{"row":8,"column":57},"action":"insert","lines":["o"]}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":6,"column":23},"end":{"row":6,"column":23},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":28,"mode":"ace/mode/php"}},"timestamp":1462373811000,"hash":"83f0af4db5eda565240fa8a462cf19428d4d341d"}