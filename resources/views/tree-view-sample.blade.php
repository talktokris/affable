@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Recent Users</div>
                <div class="card-body">
                 
                    <ul>
                        <li> <a href="#">100000</a> 
                            <ul> 
                                <li>  <a href="#">100001-2</a>
                                    <ul><li><a href="#">100003-4</a>
                                            <ul><li><a href="#">100006-7</a></li></ul>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="#">100002-3</a>
                                    <ul><li><a href="#">100003-4</a>
                                            <ul><li><a href="#">100006-7</a></li></ul>
                                        </li>
                                        <li><a href="#">100005-6</a>
                                            <ul><li><a href="#">100008-9</a></li></ul>
                                        </li>
                                    </ul>
                                </li>
                          </ul>
                        </li>
                      </ul>
                      
                <div class="tree">
                    <ul>
                        <li>
                            <a href="#">Parent</a>
                            <ul>
                                <li>
                                    <a href="#">Child</a>
                                    <ul>
                                        <li>
                                            <a href="#">Grand Child</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Child</a>
                                    <ul>
                                        <li><a href="#">Grand Child</a></li>
                                        <li>
                                            <a href="#">Grand Child</a>
                                            <ul>
                                                <li>
                                                    <a href="#">Great Grand Child</a>
                                                </li>
                                                <li>
                                                    <a href="#">Great Grand Child</a>
                                                </li>
                                                <li>
                                                    <a href="#">Great Grand Child</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Grand Child</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
