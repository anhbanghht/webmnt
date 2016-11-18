@extends('layouts.sitedefault')
@section('titlepage')
Tất cả bài viết
@stop
@section('event_active')
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
				<?php foreach($items as $p):?>
				<div class="single_blog_archive wow fadeInUp">
                    <h2 class="blog_title"><a href="{{route('mmt::detailevent',$p->id)}}"><?php echo $p->task_name;?></a></h2>
                    <div class="blog_commentbox">
                      <p><i class="fa fa-clock-o"></i>Thời gian: 
						<?php 
							if($p->alltime==0): 
								echo $p->start."-".$p->end.",".date('d m Y',strtotime($p->date)); 
							else: 
								echo date('d m Y',strtotime($p->start))."-".date('d m Y',strtotime($p->end));
							endif;
						?>
					  </p>
                      <p><i class="fa fa-map-marker"></i>Địa điểm: <?php echo $p->location;?></p>                      
                    </div>
                    <p class="blog_summary"><?php echo $p->description;?></p>
                    <a class="blog_readmore" href="{{route('mmt::detailevent',$p->id)}}">Chi tiết</a>
                  </div>
				<?php endforeach;?>
              </div>
              <!-- start previous & next button -->
              <div class="single_blog_prevnext">
					<?php echo $items->links(); ?>
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
