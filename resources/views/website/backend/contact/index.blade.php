@extends('website.backend.layouts.main')
@section('content')
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Contact Us </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            {{--                            <a class="dropdown-item" href="#">Settings 1</a>--}}
                            {{--                            <a class="dropdown-item" href="#">Settings 2</a>--}}
                        </div>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <div id="datatable-responsive_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap no-footer">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="dataTables_length" id="datatable-responsive_length">
                                            <label>
                                                Show
                                                <select name="datatable-responsive_length" aria-controls="datatable-responsive" class="form-control input-sm">
                                                    <option value="10">
                                                        10
                                                    </option>
                                                    <option value="25">
                                                        25
                                                    </option>
                                                    <option value="50">
                                                        50
                                                    </option>
                                                    <option value="100">
                                                        100
                                                    </option>
                                                </select>
                                                entries
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div id="datatable-responsive_filter" class="dataTables_filter">
                                            <label> Create a new Product
                                                <form method="GET" action="{{route('contact.create')}}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success text-sm-center rounded">
                                                        Create
                                                    </button>
                                                </form>

                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div id="datatable-responsive_filter" class="dataTables_filter">
                                            <label>
                                                Search:
                                                <input type="search" class="form-control input-sm" placeholder="" aria-controls="datatable-responsive">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline collapsed" cellspacing="0" width="100%" role="grid" aria-describedby="datatable-responsive_info" style="width: 100%;">
                                            <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 66px;" aria-sort="ascending" aria-label="First name: activate to sort column descending">location</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 65px;" aria-label="Last name: activate to sort column ascending">Email</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 65px;" aria-label="Last name: activate to sort column ascending">Address</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 65px;" aria-label="Last name: activate to sort column ascending">Phone</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 65px;" aria-label="Last name: activate to sort column ascending">Action</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @foreach($contacts as $contact)
                                                <tr role="row" class="odd">
                                                    <td tabindex="0" class="sorting_1">{{$contact->location}}</td>
                                                    <td>{{$contact->email}}</td>
                                                    <td>{{$contact->address}}</td>
                                                    <td>{{$contact->phone}}</td>
                                                    <td class>
                                                        <a class="btn btn-app"
                                                           href="{{route('contact.edit',$contact->id)}}">
                                                            <i class="fa fa-edit"></i>
                                                            Edit
                                                        </a>
                                                        <form method="POST"
                                                              action="{{route('contact.destroy',$contact->id)}}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-app">
                                                                <i class="fa fa-remove"></i>
                                                                Delete
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="dataTables_info" id="datatable-responsive_info" role="status" aria-live="polite">
                                            Showing 1 to 10 of 57 entries
                                        </div>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="dataTables_paginate paging_simple_numbers" id="datatable-responsive_paginate">
                                            <ul class="pagination">
                                                <li class="paginate_button previous disabled" id="datatable-responsive_previous">
                                                    <a href="#" aria-controls="datatable-responsive" data-dt-idx="0" tabindex="0">Previous</a>
                                                </li>
                                                <li class="paginate_button active">
                                                    <a href="#" aria-controls="datatable-responsive" data-dt-idx="1" tabindex="0">1</a>
                                                </li>
                                                <li class="paginate_button ">
                                                    <a href="#" aria-controls="datatable-responsive" data-dt-idx="2" tabindex="0">2</a>
                                                </li>
                                                <li class="paginate_button ">
                                                    <a href="#" aria-controls="datatable-responsive" data-dt-idx="3" tabindex="0">3</a>
                                                </li>
                                                <li class="paginate_button ">
                                                    <a href="#" aria-controls="datatable-responsive" data-dt-idx="4" tabindex="0">4</a>
                                                </li>
                                                <li class="paginate_button ">
                                                    <a href="#" aria-controls="datatable-responsive" data-dt-idx="5" tabindex="0">5</a>
                                                </li>
                                                <li class="paginate_button ">
                                                    <a href="#" aria-controls="datatable-responsive" data-dt-idx="6" tabindex="0">6</a>
                                                </li>
                                                <li class="paginate_button next" id="datatable-responsive_next">
                                                    <a href="#" aria-controls="datatable-responsive" data-dt-idx="7" tabindex="0">Next</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
