@extends('app',['links'=>[['title'=>'Test','url'=>'http://whatever.com']],'h'=>'Tableau de bord'])
@section('content')
<div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Projects (15)</h5>
                            <a href="#" class="btn btn-primary btn-xs m-l-sm pull-right">Add new project</a>
                        </div>
                        <div class="ibox-content">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Project </th>
                                        <th>Video plays</th>
                                        <th>Clicks</th>
                                        <th>Optins</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @for ($i = 0; $i < 11; $i++)
                                    <tr>
                                        <td><a href="#">Project 1</a></td>
                                        <td>50</td>
                                        <td>66</td>
                                        <td>4</td>
                                        <td>4 hours ago</td>
                                        <td>
                                            <a href="#"><i class="fa fa-edit text-navy"></i></a>
                                            <a href="#"><i class="fa fa-trash-o text-navy"></i></a>
                                            <a href="#"><i class="fa fa-search text-navy"></i></a>
                                        </td>
                                    </tr>
                                    @endfor
                                    </tbody>
                                </table>
                                <nav>
  <ul class="pagination">
    <li>
      <a href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li>
      <a href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
@stop