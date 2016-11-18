@extends('layouts.sitedefault')
@section('titlepage')
 Trang Chủ
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
              <!-- start blog archive  -->
              <div class="row">
                <!-- start single blog -->
                <div class="col-lg-12 col-12 col-sm-12">
                  <div class="single_blog">
                    <div class="blogimg_container">
                      <a href="{{route('mmt::detailpage',$item->id)}}" class="blog_img">
                        <img alt="img" style="max-height:400px" src="{{url('uploads/images/'.$item->image)}}">
                      </a>
                    </div>
                    <h2 class="blog_title"><a href="{{route('mmt::detailpage',$item->id)}}"><?php echo $item->title;?></a></h2>
                    <div class="blog_commentbox">
                      <p><i class="fa fa-user"></i><?php echo Helps::getUser($item->created_by)->name;?></p>
                      <p><i class="fa fa-calendar"></i><?php echo date('d m Y',strtotime($item->created_at));?></p>
                    </div>
                    <?php echo $item->content;?>
					<?php if($item->attached!=''):?>
                    <ul>
                      <li><a href="{{url('uploads/attachs/'.$item->attached)}}"><span class="fa fa-angle-double-right"></span><?php echo $item->attached;?></a></li>
                    </ul>
                    <?php endif;?>
                  </div>
                </div>
                <!-- End single blog -->                
              </div>
              <!-- end blog archive  -->    
            </div>
          </div>
          <!-- End course content -->

          <!-- start course archive sidebar -->
        </div>
      </div>
    </section>
    <!--=========== END COURSE BANNER SECTION ================-->
@stop
