<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>{!! $h !!}</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{!!url('/')!!}">Acceuil</a>
            </li>
            @if(count($links)>1)
                <li>
                    <a href="{!! $links[0]['url'] !!}">{!! $links[0]['title'] !!}</a>
                </li>
                <li class="active">
                    <strong>{!! $links[1]['title'] !!}</strong>
                </li>
            @elseif(count($links)==1)
                <li class="active">
                    <strong>{!! $links[0]['title'] !!}</strong>
                </li>
            @endif
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>