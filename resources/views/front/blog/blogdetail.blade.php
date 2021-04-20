@extends('front.layouts.app')

@section('content_front')
<style>
    .replay_cmt{
        display: none;
    }
</style>
<div class="col-sm-9">
    <div class="blog-post-area">
        <h2 class="title text-center">Latest From our Blog</h2>
        <div class="single-blog-post">
            <h3>{{ $blog->title }}</h3>
            <div class="post-meta">
                <ul>
                    <li><i class="fa fa-user"></i> Mac Doe</li>
                    <li><i class="fa fa-clock-o"></i> 1:33 pm</li>
                    <li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
                </ul>

            </div>
                <img height="300" src="{{ asset('upload/admin/' . $blog->image) }}" alt="">
            <p>
                {!! $blog->content !!}
            </p>
            <div class="pager-area">
                <ul class="pager pull-right">
                    <li><a href="#">Pre</a></li>
                    <li><a href="#">Next</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!--/blog-post-area-->

    <div class="rating-area">
        <ul class="ratings">
            <li class="rate-this">Rate this item:</li>
            <li>
                <?php if(count($cate)>0){ ?>
                    <?php 
                    $sum = 0;
                    foreach ($cate as $key => $value) {
                        $sum = $sum + $value->rate;
                    }
                    $rate = $sum / count($cate);
                    ?>
                    <div class="rate">
                        <div class="vote">
                            <?php for ($i=1; $i <= 5 ; $i++) { ?>
                                <?php if($i <= round($rate)){ ?>
                                    <div class="star_{{$i}} ratings_stars ratings_over"><input value="{{$i}}" type="hidden" id="star"></div>
                                <?php }else{ ?>

                                    <div class="star_{{$i}} ratings_stars"><input value="{{$i}}" type="hidden" id="star"></div>
                                <?php } ?>
                            <?php } ?>

                            <span class="rate-np">{{ round($rate) }}</span>
                        </div>
                    </div>
                <?php }else{ ?>
                 <div class="rate">
                    <div class="vote">
                        <?php for ($i=1; $i <= 5 ; $i++) { ?>


                            <div class="star_{{$i}} ratings_stars"><input value="{{$i}}" type="hidden" id="star"></div>
                            
                        <?php } ?>

                        <span class="rate-np">0</span>
                    </div>
                </div>
            <?php } ?>
        </li>
        <li class="color">({{count($cate)}} votes)</li>        
    </ul>
    <ul class="tag">
        <li>TAG:</li>
        <li><a class="color" href="">Pink <span>/</span></a></li>
        <li><a class="color" href="">T-Shirt <span>/</span></a></li>
        <li><a class="color" href="">Girls</a></li>
    </ul>
</div>
<!--/rating-area-->

<div class="socials-share">
    <a href=""><img src="images/blog/socials.png" alt=""></a>
</div>
<!--/socials-share-->
<div class="replay-box">
    <div class="row">
        <div class="col-sm-12">
            <div class="text-area">
                <div class="blank-arrow">
                    <label id="note">Write your comment</label>
                </div>
                <span>*</span>

                <textarea name="message" rows="3" id="cmt_blog" required="required"></textarea>
                <button class="btn btn-primary" id="submit_cmt" type="submit" href="" >post comment</button> 
            </div>
        </div>
    </div>
</div>
<!--Comments-->
<div class="response-area">
    <h2><span id="responses">{{count($cmt_con)}}</span> RESPONSES</h2>
    <ul class="media-list">
        <?php 
        foreach ($cmt_cha as $key => $value) { ?>    

            <li class="media" id="cmt{{$value->id}}">
                <a class="pull-left" href="#">
                    <img class="media-object" src="images/blog/man-two.jpg" alt="">
                </a>
                <div class="media-body">
                    <ul class="sinlge-post-meta">
                        <li><i class="fa fa-user"></i>
                         <?php foreach ($user as $key => $users): ?>
                             <?php if ($users->id == $value->userId): ?>
                                 {{$users->name}}
                             <?php endif ?>
                         <?php endforeach ?>
                     </li>
                     <li><i class="fa fa-clock-o"></i> 1:33 pm</li>
                     <li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
                 </ul>
                 <p>{{ $value->content }}</p>
                 <button class="btn btn-primary" onclick="replay({{$value->id}})"><i class="fa fa-reply"></i>Replay</button>
             </div>
         </li>
         
        <?php foreach ($cmt_con as $keys => $value_con) { ?>
            <?php if ($value_con->level == $value->id): ?>
                <li class="media second-media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="images/blog/man-four.jpg" alt="">
                    </a>
                    <div class="media-body">
                        <ul class="sinlge-post-meta">
                            <li><i class="fa fa-user"></i>
                                <?php foreach ($user as $key => $users): ?>
                                 <?php if ($users->id == $value_con->userId): ?>
                                     {{$users->name}}
                                 <?php endif ?>
                             <?php endforeach ?>
                         </li>
                         <li><i class="fa fa-clock-o"></i> 1:33 pm</li>
                         <li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
                     </ul>
                     <p>{{$value_con->content}}</p>
                 </div>
             </li>
         <?php endif ?>
     <?php } ?>
     <li class="media second-media replay replay_cmt" id="replay_cmt{{$value->id}}">
             <div class="row " >
                <div class="col-sm-12">
                    <div class="text-area">
                        <textarea name="message" rows="3" id="replay_cmt_blog{{$value->id}}"></textarea>
                        <button class="btn btn-primary" onclick="replay_cmt({{ $value->userId}},{{$value->id}})" type="submit" href="" >post comment</button> 
                    </div>
                </div>
            </div>
        </li>
 <?php }
 ?>
</ul>
</div>
<!--/Response-area-->

<!--/Repaly Box-->
</div>



<script>
    function replay_cmt(iduser,idcmt){
        // alert(iduser+" "+idcmt)
        var content = $('#replay_cmt_blog'+idcmt).val();
       // alert(content)
       <?php if (Auth::check()) { ?>
            
            var name = "{{$auth_user->name}}";

            var html =
            '<li class="media second-media" >'+
                '<a class="pull-left" href="#">'+
                '<img class="media-object" src="images/blog/man-two.jpg" alt="">'+
                '</a>'+
                '<div class="media-body">'+
                '<ul class="sinlge-post-meta">'+
                '<li><i class="fa fa-user"></i>'+name+'</li>'+
                '<li><i class="fa fa-clock-o"></i> 1:33 pm</li>'+
                '<li><i class="fa fa-calendar"></i> DEC 5, 2013</li>'+
                ' </ul>'+
                '<p>'+content+'</p>'+
                '</div>'+
                ' </li>';

             $.ajax({
                    method: "POST",
                    url: "{{ URL::to('/replay-cmt-blog/'.$blog->id) }}",
                    data: {
                        "_token" : "{{ csrf_token() }}",
                        content : content,
                        level : idcmt
                    },
                    success : function(response){
                      console.log(response);
                      $('#cmt'+idcmt).after(html);
                      $('#replay_cmt_blog'+idcmt).val("");
                      $('#replay_cmt'+idcmt).addClass('replay_cmt')
                  }
              });
        <?php }else{ ?>
            if(confirm('Bạn cần đăng nhập để dùng tính năng này!')) window.location.href = 
                    "{{ URL::to('/member-login') }}";
        <?php } ?>
    }
    function replay(idcmt){
        // alert(iduser+" "+idcmt)
        $('li.replay').addClass('replay_cmt')
        $('li#replay_cmt'+idcmt).removeClass('replay_cmt')

    }

    $(document).ready(function() {

        $('#submit_cmt').click(function(event) {
            var content = $(this).prev().val();
            var text = $(this).prev();
            
            
            
            <?php
            if (Auth::check()) {
                ?>
                var name = "{{$auth_user->name}}";
                var html = 
                '<li class="media" >'+
                '<a class="pull-left" href="#">'+
                '<img class="media-object" src="images/blog/man-two.jpg" alt="">'+
                '</a>'+
                '<div class="media-body">'+
                '<ul class="sinlge-post-meta">'+
                '<li><i class="fa fa-user"></i>'+name+'</li>'+
                '<li><i class="fa fa-clock-o"></i> 1:33 pm</li>'+
                '<li><i class="fa fa-calendar"></i> DEC 5, 2013</li>'+
                ' </ul>'+
                '<p>'+content+'</p>'+
                '<a class="btn btn-primary" ><i class="fa fa-reply"></i>Replay</a>'+
                '</div>'+
                ' </li>';
                $.ajax({
                    method: "POST",
                    url: "{{ URL::to('/cmt-blog/'.$blog->id) }}",
                    data: {
                        "_token" : "{{ csrf_token() }}",
                        content : content
                    },
                    success : function(response){
                      console.log(response);
                      $('.media-list').prepend(html);
                      text.val('');
                      // responses->text(res)

                  }
              });
                <?php
            } else {
                ?>
                if(confirm('Bạn cần đăng nhập để dùng tính năng này!')) window.location.href = 
                    "{{ URL::to('/member-login') }}";
                <?php
            } ?>
        });
            //vote
            $('.ratings_stars').hover(
                // Handles the mouseover
                function() {
                    $(this).prevAll().andSelf().addClass('ratings_hover');
                    // $(this).nextAll().removeClass('ratings_vote'); 
                },
                function() {
                    $(this).prevAll().andSelf().removeClass('ratings_hover');
                    // set_votes($(this).parent());
                }
                );

            $('.ratings_stars').click(function() {
                <?php
                if (Auth::check()) {
                    ?>
                    var Values = $(this).find("input").val();

                    if ($(this).hasClass('ratings_over')) {
                        $('.ratings_stars').removeClass('ratings_over');
                        $(this).prevAll().andSelf().addClass('ratings_over');
                    } else {
                        $(this).prevAll().andSelf().addClass('ratings_over');
                    }
                    $.ajax({
                        method: "POST",
                        url: "{{ URL::to('/rate-blog/'.$blog->id) }}",
                        data: {
                            "_token" : "{{ csrf_token() }}",
                            value : Values
                        },
                        success : function(response){
                          console.log(response);
                          alert('Cảm ơn bạn đã đánh giá')
                      }
                  });
                    
                    <?php
                } else {
                    ?>
                    if(confirm('Bạn cần đăng nhập để dùng tính năng này!')) window.location.href = 
                        "{{ URL::to('/member-login') }}";
                    <?php
                } ?>
            });
        });
    </script>

    @endsection
