<style>
    .disableTab {
        color: inherit !important;
        text-decoration: none !important;
        pointer-events: none !important;
    }

    .filled-circle {
        margin-left: 10%;
    }

    .side-bar .menu .item a {
        color: #fff;
        font-size: 16px;
        text-decoration: none;
        display: block;
        padding: 5px 10px 5px 18px;
        line-height: 30px;
    }

    .filled-circle {
        position: absolute;
        top: 50%;
        right: 0;
        transform: translateY(-50%);
    }

    .logoImg {
        max-width: 250px;
        width: 80% !important;
        border: none;
        object-fit: contain;
        border-radius: none !important;
    }

    img {
        border-radius: 0px !important;
    }
</style>
<?php
$sections = bookProgress()['sections'];
?>
<div class="side-bar">

    <div class="menu">
        <div class=" text-center text-white" style="height: 85px; display:flex; font-size:30px; justify-content:center; align-items:center"><img class="logoImg m-0" style="border-radius:none !important;" src="{{asset('assets/images/LOGO_PNG.png')}}" alt=""></div>
        <div class="item position-relative">
            <a href="{{url('/avatar')}}" class="@if(!$sections['avatar']) disableTab @endif"><i class="fas fa-book"></i>Avatar
                @if($sections['avatar'])<i class="fas fa-check-circle filled-circle"></i>@endif
            </a>

        </div>
        <div class="item"><a href="{{url('/book-title')}}" class="@if(!$sections['book_title']) disableTab @endif"><i class="fas fa-heading"></i>Book Title
                @if($sections['book_title'])<i class="fas fa-check-circle filled-circle"></i>@endif
            </a></div>
        <div class="item">
            <a href="{{url('/outline')}}" class="@if(!$sections['outline']) disableTab @endif sub-btn"><i class="fas fa-file-alt"></i>Outline
                @if($sections['outline'])<i class="fas fa-check-circle filled-circle"></i>@endif
            </a>
        </div>
        <div class="item"><a href="{{url('/cover-art')}}" class="@if(!$sections['cover_art']) disableTab @endif"><i class="fas fa-images"></i>Cover Art
                @if($sections['cover_art'])<i class="fas fa-check-circle filled-circle"></i>@endif
            </a></div>
        <div class="item"><a href="{{url('/inside-cover')}}" class="@if(!$sections['inside_cover']) disableTab @endif"><i class="fas fa-book-open"></i>Inside Cover
                @if($sections['inside_cover'])<i class="fas fa-check-circle filled-circle"></i>@endif
            </a></div>
        <div class="item"><a href="{{url('/copyright')}}" class="@if(!$sections['copy_right']) disableTab @endif"><i class="fas fa-copyright"></i>Copyright
                @if($sections['copy_right'])<i class="fas fa-check-circle filled-circle"></i>@endif
            </a></div>
        <div class="item"><a href="{{url('/praise')}}" class="@if(!$sections['praise']) disableTab @endif"><i class="fas fa-thumbs-up"></i>Praise
                @if($sections['praise'])<i class="fas fa-check-circle filled-circle"></i>@endif
            </a></div>
        <div class="item"><a href="{{url('/dedication')}}" class="@if(!$sections['dedication']) disableTab @endif"><i class="fas fa-heart"></i>Dedication
                @if($sections['dedication'])<i class="fas fa-check-circle filled-circle"></i>@endif
            </a></div>
        <div class="item"><a href="{{url('/how-to-use')}}" class="@if(!$sections['how_to_use']) disableTab @endif"><i class="fas fa-question-circle"></i>How To Use
                @if($sections['how_to_use'])<i class="fas fa-check-circle filled-circle"></i>@endif
            </a></div>
        <div class="item"><a href="{{url('/forward')}}" class="@if(!$sections['forword']) disableTab @endif"><i class="fas fa-share"></i>Forward
                @if($sections['forword'])<i class="fas fa-check-circle filled-circle"></i>@endif
            </a></div>
        <div class="item">
            <a class="sub-btn @if(!$sections['table_of_content']) disableTab @endif"><i class="fas fa-list"></i>Chapters
                <!-- @if($sections['table_of_content'])<i class="fas fa-check-circle filled-circle"></i>@endif -->
            </a>
            <div class="sub-menu">
                @foreach(outlines() as $outline)<?php
                                                $id = $sections['sub_outline_' . $outline['id']];
                                                ?>
                <a href="{{route('content', ['id'=> $outline['id']] )}}" data-class="{{$outline['id']}}" class="sub-item position-relative">{{$outline['outline_name']}}

                    @if($id)<i class="fas fa-check-circle filled-circle"></i>@endif
                </a>
                @endforeach
            </div>
        </div>
        <div class="item"><a href="{{url('/conclusion')}}" class="@if(!$sections['conclusion']) disableTab @endif"><i class="fas fa-flag-checkered"></i>Conclusion
                @if($sections['conclusion'])<i class="fas fa-check-circle filled-circle"></i>@endif
            </a></div>
        <div class="item"><a href="{{url('/work-with-us')}}" class="@if(!$sections['work_with_us']) disableTab @endif"><i class="fas fa-handshake"></i>Work with Us
                @if($sections['work_with_us'])<i class="fas fa-check-circle filled-circle"></i>@endif
            </a></div>
        <div class="item"><a href="{{url('/about')}}" class="@if(!$sections['about']) disableTab @endif"><i class="fas fa-user"></i>About
                @if($sections['about'])<i class="fas fa-check-circle filled-circle"></i>@endif
            </a></div>
    </div>
</div>
<!-- @if($sections['table_of_content'])
<script>
     $('.sub-menu').slideToggle();
</script>
@endif -->