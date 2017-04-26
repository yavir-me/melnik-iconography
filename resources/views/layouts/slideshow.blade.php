<div class="row slider-row"> {{-- slider row --}}
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            @for($i=1;$i<count($slides);$i++)
            <li data-target="#myCarousel" data-slide-to="{{$i}}"></li>
            @endfor
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">

            <div class="item active">
                <img src="{{$slides[0]->path}}">
            </div>

            @for($i=1;$i<count($slides);$i++)
            <div class="item">
                <img src="{{$slides[$i]->path}}">
            </div>
            @endfor

        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>  {{-- / slider row --}}