@extends('layouts.core.base')
@section('content')
    <div class="row">
        <div class="box col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    NavMakers
                </div>
                <div class="panel-body">
                    <div class="navbar-form navbar-right" >
                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                            <div class="btn-group" role="group" aria-label="Third group">
                                <form action="{!! UIHelper::getURL("navMaker") !!}">
                                    <div class="input-group" id="search-area">
                                        <div class="input-group-btn">
                                            <div class="btn-group">
                                                {!! UIHelper::selectedColumn() !!}
                                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    <span class="caret"></span>
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <ul class="dropdown-menu selected-column-name" role="menu">
                                                    <li data="name"><a href="#"> Name</a></li>
                                                    <li data="uuid"><a href="#"> Uuid</a></li>
                                                    <li data="isEnable"><a href="#"> Is Enable</a></li>

                                                </ul>
                                            </div>
                                        </div>
                                        {!! UIHelper::selectedSearch() !!}
                                        <span class="input-group-btn">
                                             <button class="btn btn-default" type="submit">Search</button>
                                    </span>
                                    </div>
                                </form>
                            </div>
                            <div class="btn-group" role="group" aria-label="First group">
                                <button type="button" text-callback="MIS.wmNavManager.init" class="btn btn-success open-wizard" wizard-url="{!! UIHelper::getURL("navMaker/create") !!}" {!! WMLayoutHelper::formSize("navMaker") !!} wizard-title="Create New NavMaker">Add New</button>
                                <a href="{!! UIHelper::getURL("navMaker") !!}" class="btn  btn-info">Reload</a>
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered table-striped table-condensed">
                        <thead>
                        <tr class="">
                            {!! UIHelper::tableHeader(array("url"=>UIHelper::getURL("navMaker"),"columns"=>array("name","uuid","isEnable"))) !!}
                        </tr>
                        </thead>
                        <tbody>
                        @dynamicCustomContent("57C1B38C68B59")
                            <tr>
                                <td>{{ $navMaker->name }}</td>
                                <td>{{ $navMaker->uuid }}</td>
                                <td> {!! UIHelper::isEnableDisable($navMaker->isEnable) !!}</td>
                                <td class="action-columns">
                                    <div class="btn-toolbar">
                                        <div class="btn-group">
                                            <a href="#"  class="btn btn-default open-wizard"  wizard-url="{!! UIHelper::getURL("navMaker") !!}/details/{{ $navMaker->id }}" wizard-title="View NavMaker Details"><i class="glyphicon glyphicon-eye-open"></i></a>
                                            <a href="#" class="btn btn-default open-wizard" text-callback="MIS.wmNavManager.init" {!! WMLayoutHelper::formSize("navMaker") !!}  wizard-url="{!! UIHelper::getURL("navMaker") !!}/edit/{{ $navMaker->id }}" wizard-title="Edit NavMaker"><i class="glyphicon glyphicon-edit"></i></a>
                                            <a href="#" class="btn btn-default open-confirm-box" wizard-url="{!! UIHelper::getURL("navMaker") !!}/delete/{{ $navMaker->id }}" wizard-title="Delete"><i class="glyphicon glyphicon-trash"></i></a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endDynamicCustomContent
                        </tbody>
                    </table>
                    <div class="table-panel-footer">
                        <ul class="pagination pagination-centered">
                            <?php echo $navMakers->render(); ?>
                        </ul>
                        {!! UIHelper::itemPerPage(array("url"=>UIHelper::getURL("navMaker"))) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('webmaster::layouts.head')
@stop