@extends('layouts.sitedefault')
@section('titlepage')
Tất cả bài viết
@stop
@section('note_active')
	class="active"
@stop
@section('body')
<br/><br/><br/><br/>
<!--=========== BEGIN COURSE BANNER SECTION ================-->
    <section id="courseArchive">
      <div class="container">
        <div class="row">
          <!-- start course content -->
          <div class="col-lg-8 col-md-8 col-sm-8">
            <div class="courseArchive_content">
              <div class="row">
				<div class="col-lg-12 col-12 col-sm-12">
                  <div class="single_blog_archive wow fadeInUp">
                    <h2 class="blog_title"><a href="{{route('mmt::detailnotes',$p->id)}}"> <?php echo $p->title;?></a></h2>
                    <div class="blog_commentbox">
                      <p>Đính Kèm</p>
                      <p><a href="{{url('uploads/attachs/'.$p->attached)}}"><?php echo $p->attached;?></a></p>                      
                    </div>
                    <p class="blog_summary"><?php echo $p->description;?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End course content -->

          <!-- start course archive sidebar -->
        </div>
      </div>
    </section>
    <!--=========== END COURSE BANNER SECTION ================-->
@stop
