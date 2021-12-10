@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@stop

@section('content')

    <!-- Content Header (Page header) -->

    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->

                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $todos->count() }}</h3>

                            <p>ToDo</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{ route('dash.home') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>

                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $clients->count() }}</h3>

                            <p>Clienti Totali</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{ route('dash.clients.index') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $products->count() }}</h3>

                            <p>Prodotti Totali</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{ route('dash.products.index') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $users->count() }}</h3>

                            <p>Utenti Totali</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="{{ route('dash.users.index') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-7 connectedSortable ui-sortable">


                    <!-- TO DO List -->
                    <div class="card">
                        <div class="card-header ui-sortable-handle" style="cursor: move;">
                            <div class="pull-right">
                                <a class="btn btn-success float-left" href="{{ route('dash.todos.create') }}"> ToDo</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <table class="table table-bordered">
                            <tr>
                                <th width="50px">No.</th>
                                <th>ToDo</th>
                                <th width="250px">Action</th>
                            </tr>
                            @foreach ($todos as $todo)
                                <tr>
                                    <td>{{ $todo->id }}</td>
                                    <td><strong>{{ $todo->todo }}</strong></td>
                                    <td>
                                        <form action="{{ route('dash.todos.destroy', $todo->id) }}" method="POST">

                                            @can('dash.todos.show')
                                                <a class="btn btn-info"
                                                    href="{{ route('dash.todos.show', $todo->id) }}">Show</a>
                                            @endcan


                                            @can('dash.todos.edit')
                                                <a class="btn btn-primary"
                                                    href="{{ route('dash.todos.edit', $todo->id) }}">Edit</a>
                                            @endcan

                                            @can('dash.todos.destroy')

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger">Delete</button>

                                            @endcan


                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </table>
                        {!! $todos->links() !!}

                </section>
                <!-- /.Left col -->
                <!-- right col (We are only adding the ID to make the widgets sortable)-->
                <section class="col-lg-5 connectedSortable ui-sortable">

                    <!-- Calendar -->
                    <div class="card bg-gradient-success">
                        <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">

                            <h3 class="card-title">
                                <i class="far fa-calendar-alt"></i>
                                Calendar
                            </h3>
                            <!-- tools card -->
                            <div class="card-tools">
                                <!-- button with a dropdown -->
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>

                            </div>
                            <!-- /. tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body pt-0">
                            <!--The calendar -->
                            <div id="calendar" style="width: 100%">
                                <div class="bootstrap-datetimepicker-widget usetwentyfour">
                                    <ul class="list-unstyled">
                                        <li class="show">
                                            <div class="datepicker">
                                                <div class="datepicker-days" style="">
                                                    <table class="table table-sm">
                                                        <thead>
                                                            <tr>
                                                                <th class="prev" data-action="previous"><span
                                                                        class="fa fa-chevron-left"
                                                                        title="Previous Month"></span></th>
                                                                <th class="picker-switch" data-action="pickerSwitch"
                                                                    colspan="5" title="Select Month">December 2021</th>
                                                                <th class="next" data-action="next"><span
                                                                        class="fa fa-chevron-right"
                                                                        title="Next Month"></span></th>
                                                            </tr>
                                                            <tr>
                                                                <th class="dow">Su</th>
                                                                <th class="dow">Mo</th>
                                                                <th class="dow">Tu</th>
                                                                <th class="dow">We</th>
                                                                <th class="dow">Th</th>
                                                                <th class="dow">Fr</th>
                                                                <th class="dow">Sa</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td data-action="selectDay" data-day="11/28/2021"
                                                                    class="day old weekend">28</td>
                                                                <td data-action="selectDay" data-day="11/29/2021"
                                                                    class="day old">29</td>
                                                                <td data-action="selectDay" data-day="11/30/2021"
                                                                    class="day old">30</td>
                                                                <td data-action="selectDay" data-day="12/01/2021"
                                                                    class="day">1</td>
                                                                <td data-action="selectDay" data-day="12/02/2021"
                                                                    class="day">2</td>
                                                                <td data-action="selectDay" data-day="12/03/2021"
                                                                    class="day">3</td>
                                                                <td data-action="selectDay" data-day="12/04/2021"
                                                                    class="day active today weekend">4</td>
                                                            </tr>
                                                            <tr>
                                                                <td data-action="selectDay" data-day="12/05/2021"
                                                                    class="day weekend">5</td>
                                                                <td data-action="selectDay" data-day="12/06/2021"
                                                                    class="day">6</td>
                                                                <td data-action="selectDay" data-day="12/07/2021"
                                                                    class="day">7</td>
                                                                <td data-action="selectDay" data-day="12/08/2021"
                                                                    class="day">8</td>
                                                                <td data-action="selectDay" data-day="12/09/2021"
                                                                    class="day">9</td>
                                                                <td data-action="selectDay" data-day="12/10/2021"
                                                                    class="day">10</td>
                                                                <td data-action="selectDay" data-day="12/11/2021"
                                                                    class="day weekend">11</td>
                                                            </tr>
                                                            <tr>
                                                                <td data-action="selectDay" data-day="12/12/2021"
                                                                    class="day weekend">12</td>
                                                                <td data-action="selectDay" data-day="12/13/2021"
                                                                    class="day">13</td>
                                                                <td data-action="selectDay" data-day="12/14/2021"
                                                                    class="day">14</td>
                                                                <td data-action="selectDay" data-day="12/15/2021"
                                                                    class="day">15</td>
                                                                <td data-action="selectDay" data-day="12/16/2021"
                                                                    class="day">16</td>
                                                                <td data-action="selectDay" data-day="12/17/2021"
                                                                    class="day">17</td>
                                                                <td data-action="selectDay" data-day="12/18/2021"
                                                                    class="day weekend">18</td>
                                                            </tr>
                                                            <tr>
                                                                <td data-action="selectDay" data-day="12/19/2021"
                                                                    class="day weekend">19</td>
                                                                <td data-action="selectDay" data-day="12/20/2021"
                                                                    class="day">20</td>
                                                                <td data-action="selectDay" data-day="12/21/2021"
                                                                    class="day">21</td>
                                                                <td data-action="selectDay" data-day="12/22/2021"
                                                                    class="day">22</td>
                                                                <td data-action="selectDay" data-day="12/23/2021"
                                                                    class="day">23</td>
                                                                <td data-action="selectDay" data-day="12/24/2021"
                                                                    class="day">24</td>
                                                                <td data-action="selectDay" data-day="12/25/2021"
                                                                    class="day weekend">25</td>
                                                            </tr>
                                                            <tr>
                                                                <td data-action="selectDay" data-day="12/26/2021"
                                                                    class="day weekend">26</td>
                                                                <td data-action="selectDay" data-day="12/27/2021"
                                                                    class="day">27</td>
                                                                <td data-action="selectDay" data-day="12/28/2021"
                                                                    class="day">28</td>
                                                                <td data-action="selectDay" data-day="12/29/2021"
                                                                    class="day">29</td>
                                                                <td data-action="selectDay" data-day="12/30/2021"
                                                                    class="day">30</td>
                                                                <td data-action="selectDay" data-day="12/31/2021"
                                                                    class="day">31</td>
                                                                <td data-action="selectDay" data-day="01/01/2022"
                                                                    class="day new weekend">1</td>
                                                            </tr>
                                                            <tr>
                                                                <td data-action="selectDay" data-day="01/02/2022"
                                                                    class="day new weekend">2</td>
                                                                <td data-action="selectDay" data-day="01/03/2022"
                                                                    class="day new">3</td>
                                                                <td data-action="selectDay" data-day="01/04/2022"
                                                                    class="day new">4</td>
                                                                <td data-action="selectDay" data-day="01/05/2022"
                                                                    class="day new">5</td>
                                                                <td data-action="selectDay" data-day="01/06/2022"
                                                                    class="day new">6</td>
                                                                <td data-action="selectDay" data-day="01/07/2022"
                                                                    class="day new">7</td>
                                                                <td data-action="selectDay" data-day="01/08/2022"
                                                                    class="day new weekend">8</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="datepicker-months" style="display: none;">
                                                    <table class="table-condensed">
                                                        <thead>
                                                            <tr>
                                                                <th class="prev" data-action="previous"><span
                                                                        class="fa fa-chevron-left"
                                                                        title="Previous Year"></span></th>
                                                                <th class="picker-switch" data-action="pickerSwitch"
                                                                    colspan="5" title="Select Year">2021</th>
                                                                <th class="next" data-action="next"><span
                                                                        class="fa fa-chevron-right"
                                                                        title="Next Year"></span></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="7"><span data-action="selectMonth"
                                                                        class="month">Jan</span><span
                                                                        data-action="selectMonth"
                                                                        class="month">Feb</span><span
                                                                        data-action="selectMonth"
                                                                        class="month">Mar</span><span
                                                                        data-action="selectMonth"
                                                                        class="month">Apr</span><span
                                                                        data-action="selectMonth"
                                                                        class="month">May</span><span
                                                                        data-action="selectMonth"
                                                                        class="month">Jun</span><span
                                                                        data-action="selectMonth"
                                                                        class="month">Jul</span><span
                                                                        data-action="selectMonth"
                                                                        class="month">Aug</span><span
                                                                        data-action="selectMonth"
                                                                        class="month">Sep</span><span
                                                                        data-action="selectMonth"
                                                                        class="month">Oct</span><span
                                                                        data-action="selectMonth"
                                                                        class="month">Nov</span><span
                                                                        data-action="selectMonth"
                                                                        class="month active">Dec</span></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="datepicker-years" style="display: none;">
                                                    <table class="table-condensed">
                                                        <thead>
                                                            <tr>
                                                                <th class="prev" data-action="previous"><span
                                                                        class="fa fa-chevron-left"
                                                                        title="Previous Decade"></span></th>
                                                                <th class="picker-switch" data-action="pickerSwitch"
                                                                    colspan="5" title="Select Decade">2020-2029</th>
                                                                <th class="next" data-action="next"><span
                                                                        class="fa fa-chevron-right"
                                                                        title="Next Decade"></span></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="7"><span data-action="selectYear"
                                                                        class="year old">2019</span><span
                                                                        data-action="selectYear"
                                                                        class="year">2020</span><span
                                                                        data-action="selectYear"
                                                                        class="year active">2021</span><span
                                                                        data-action="selectYear"
                                                                        class="year">2022</span><span
                                                                        data-action="selectYear"
                                                                        class="year">2023</span><span
                                                                        data-action="selectYear"
                                                                        class="year">2024</span><span
                                                                        data-action="selectYear"
                                                                        class="year">2025</span><span
                                                                        data-action="selectYear"
                                                                        class="year">2026</span><span
                                                                        data-action="selectYear"
                                                                        class="year">2027</span><span
                                                                        data-action="selectYear"
                                                                        class="year">2028</span><span
                                                                        data-action="selectYear"
                                                                        class="year">2029</span><span
                                                                        data-action="selectYear"
                                                                        class="year old">2030</span></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="datepicker-decades" style="display: none;">
                                                    <table class="table-condensed">
                                                        <thead>
                                                            <tr>
                                                                <th class="prev" data-action="previous"><span
                                                                        class="fa fa-chevron-left"
                                                                        title="Previous Century"></span></th>
                                                                <th class="picker-switch" data-action="pickerSwitch"
                                                                    colspan="5">2000-2090</th>
                                                                <th class="next" data-action="next"><span
                                                                        class="fa fa-chevron-right"
                                                                        title="Next Century"></span></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="7"><span data-action="selectDecade"
                                                                        class="decade old"
                                                                        data-selection="2006">1990</span><span
                                                                        data-action="selectDecade" class="decade"
                                                                        data-selection="2006">2000</span><span
                                                                        data-action="selectDecade" class="decade active"
                                                                        data-selection="2016">2010</span><span
                                                                        data-action="selectDecade" class="decade active"
                                                                        data-selection="2026">2020</span><span
                                                                        data-action="selectDecade" class="decade"
                                                                        data-selection="2036">2030</span><span
                                                                        data-action="selectDecade" class="decade"
                                                                        data-selection="2046">2040</span><span
                                                                        data-action="selectDecade" class="decade"
                                                                        data-selection="2056">2050</span><span
                                                                        data-action="selectDecade" class="decade"
                                                                        data-selection="2066">2060</span><span
                                                                        data-action="selectDecade" class="decade"
                                                                        data-selection="2076">2070</span><span
                                                                        data-action="selectDecade" class="decade"
                                                                        data-selection="2086">2080</span><span
                                                                        data-action="selectDecade" class="decade"
                                                                        data-selection="2096">2090</span><span
                                                                        data-action="selectDecade" class="decade old"
                                                                        data-selection="2106">2100</span></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="picker-switch accordion-toggle"></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- DIRECT CHAT -->
                    <div class="card direct-chat direct-chat-primary">
                        <div class="card-header ui-sortable-handle" style="cursor: move;">
                            <h3 class="card-title">Direct Chat</h3>

                            <div class="card-tools">
                                <span title="3 New Messages" class="badge badge-primary">3</span>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" title="Contacts"
                                    data-widget="chat-pane-toggle">
                                    <i class="fas fa-comments"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- Conversations are loaded here -->
                            <div class="direct-chat-messages">
                                <!-- Message. Default to the left -->
                                <div class="direct-chat-msg">
                                    <div class="direct-chat-infos clearfix">
                                        <span class="direct-chat-name float-left">Alexander Pierce</span>
                                        <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                                    </div>
                                    <!-- /.direct-chat-infos -->
                                    <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">
                                    <!-- /.direct-chat-img -->
                                    <div class="direct-chat-text">
                                        Is this template really for free? That's unbelievable!
                                    </div>
                                    <!-- /.direct-chat-text -->
                                </div>
                                <!-- /.direct-chat-msg -->

                                <!-- Message to the right -->
                                <div class="direct-chat-msg right">
                                    <div class="direct-chat-infos clearfix">
                                        <span class="direct-chat-name float-right">Sarah Bullock</span>
                                        <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                                    </div>
                                    <!-- /.direct-chat-infos -->
                                    <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image">
                                    <!-- /.direct-chat-img -->
                                    <div class="direct-chat-text">
                                        You better believe it!
                                    </div>
                                    <!-- /.direct-chat-text -->
                                </div>
                                <!-- /.direct-chat-msg -->

                                <!-- Message. Default to the left -->
                                <div class="direct-chat-msg">
                                    <div class="direct-chat-infos clearfix">
                                        <span class="direct-chat-name float-left">Alexander Pierce</span>
                                        <span class="direct-chat-timestamp float-right">23 Jan 5:37 pm</span>
                                    </div>
                                    <!-- /.direct-chat-infos -->
                                    <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">
                                    <!-- /.direct-chat-img -->
                                    <div class="direct-chat-text">
                                        Working with AdminLTE on a great new app! Wanna join?
                                    </div>
                                    <!-- /.direct-chat-text -->
                                </div>
                                <!-- /.direct-chat-msg -->

                                <!-- Message to the right -->
                                <div class="direct-chat-msg right">
                                    <div class="direct-chat-infos clearfix">
                                        <span class="direct-chat-name float-right">Sarah Bullock</span>
                                        <span class="direct-chat-timestamp float-left">23 Jan 6:10 pm</span>
                                    </div>
                                    <!-- /.direct-chat-infos -->
                                    <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image">
                                    <!-- /.direct-chat-img -->
                                    <div class="direct-chat-text">
                                        I would love to.
                                    </div>
                                    <!-- /.direct-chat-text -->
                                </div>
                                <!-- /.direct-chat-msg -->

                            </div>
                            <!--/.direct-chat-messages-->

                            <!-- Contacts are loaded here -->
                            <div class="direct-chat-contacts">
                                <ul class="contacts-list">
                                    <li>
                                        <a href="#">
                                            <img class="contacts-list-img" src="dist/img/user1-128x128.jpg"
                                                alt="User Avatar">

                                            <div class="contacts-list-info">
                                                <span class="contacts-list-name">
                                                    Count Dracula
                                                    <small class="contacts-list-date float-right">2/28/2015</small>
                                                </span>
                                                <span class="contacts-list-msg">How have you been? I was...</span>
                                            </div>
                                            <!-- /.contacts-list-info -->
                                        </a>
                                    </li>
                                    <!-- End Contact Item -->
                                    <li>
                                        <a href="#">
                                            <img class="contacts-list-img" src="dist/img/user7-128x128.jpg"
                                                alt="User Avatar">

                                            <div class="contacts-list-info">
                                                <span class="contacts-list-name">
                                                    Sarah Doe
                                                    <small class="contacts-list-date float-right">2/23/2015</small>
                                                </span>
                                                <span class="contacts-list-msg">I will be waiting for...</span>
                                            </div>
                                            <!-- /.contacts-list-info -->
                                        </a>
                                    </li>
                                    <!-- End Contact Item -->
                                    <li>
                                        <a href="#">
                                            <img class="contacts-list-img" src="dist/img/user3-128x128.jpg"
                                                alt="User Avatar">

                                            <div class="contacts-list-info">
                                                <span class="contacts-list-name">
                                                    Nadia Jolie
                                                    <small class="contacts-list-date float-right">2/20/2015</small>
                                                </span>
                                                <span class="contacts-list-msg">I'll call you back at...</span>
                                            </div>
                                            <!-- /.contacts-list-info -->
                                        </a>
                                    </li>
                                    <!-- End Contact Item -->
                                    <li>
                                        <a href="#">
                                            <img class="contacts-list-img" src="dist/img/user5-128x128.jpg"
                                                alt="User Avatar">

                                            <div class="contacts-list-info">
                                                <span class="contacts-list-name">
                                                    Nora S. Vans
                                                    <small class="contacts-list-date float-right">2/10/2015</small>
                                                </span>
                                                <span class="contacts-list-msg">Where is your new...</span>
                                            </div>
                                            <!-- /.contacts-list-info -->
                                        </a>
                                    </li>
                                    <!-- End Contact Item -->
                                    <li>
                                        <a href="#">
                                            <img class="contacts-list-img" src="dist/img/user6-128x128.jpg"
                                                alt="User Avatar">

                                            <div class="contacts-list-info">
                                                <span class="contacts-list-name">
                                                    John K.
                                                    <small class="contacts-list-date float-right">1/27/2015</small>
                                                </span>
                                                <span class="contacts-list-msg">Can I take a look at...</span>
                                            </div>
                                            <!-- /.contacts-list-info -->
                                        </a>
                                    </li>
                                    <!-- End Contact Item -->
                                    <li>
                                        <a href="#">
                                            <img class="contacts-list-img" src="dist/img/user8-128x128.jpg"
                                                alt="User Avatar">

                                            <div class="contacts-list-info">
                                                <span class="contacts-list-name">
                                                    Kenneth M.
                                                    <small class="contacts-list-date float-right">1/4/2015</small>
                                                </span>
                                                <span class="contacts-list-msg">Never mind I found...</span>
                                            </div>
                                            <!-- /.contacts-list-info -->
                                        </a>
                                    </li>
                                    <!-- End Contact Item -->
                                </ul>
                                <!-- /.contacts-list -->
                            </div>
                            <!-- /.direct-chat-pane -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <form action="#" method="post">
                                <div class="input-group">
                                    <input type="text" name="message" placeholder="Type Message ..."
                                        class="form-control">
                                    <span class="input-group-append">
                                        <button type="button" class="btn btn-primary">Send</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-footer-->
                    </div>
                    <!--/.direct-chat -->

                </section>
                <!-- right col -->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    @if ($message = Session::get('success'))
        <script>
            Swal.fire(
                'Good job!',
                'You added a todo',
                'success'
            )
        </script>
    @endif
@stop
