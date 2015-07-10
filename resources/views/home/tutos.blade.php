@extends('app',['links'=>[['title'=>'Tutorials','url'=>'http://whatever.com']],'h'=>'Tutorials'])
@section('content')
<div class="row">
    @for ($i = 0; $i < 9; $i++)
    <div class="col-lg-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Video window</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#">Config option 1</a>
                        </li>
                        <li><a href="#">Config option 2</a>
                        </li>
                    </ul>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <figure>
                    <iframe width="425" height="349" src="http://www.youtube.com/embed/bwj2s_5e12U" frameborder="0" allowfullscreen></iframe>
                </figure>
            </div>
        </div>
    </div>
    @endfor
</div>
@stop