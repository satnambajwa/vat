@extends('layouts.app')
@section('title', 'Dashboard Title')
@section('content')
<div class="content-wrapper">
    <div class="content-body">
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h1>Contacts</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-bottom: 1%;">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                <div class="col-md-5"></div>
                                <div class="col-md-2">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddContactModal">Import</button>
                                        <button type="submit" class="btn btn-primary">Export</button>
                                    </div>

                                    <div class="modal fade" id="AddContactModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <section class="contact-form">
                                                    <form id="form-add-contact" class="contact-input">
                                                        <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel1">Step 1. Download our contacts template file</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        </div>
                                                        <div class="modal-body">
                                                        
                                                        <h5>Step 2. Copy your contacts into the template</h5>
                                                        <h5>Step 3. Import the updated template file</h5>
                                                        </div>
                                                        <div class="modal-footer">
                                                        <fieldset class="form-group position-relative has-icon-left mb-0">
                                                            <button type="button" id="add-contact-item" class="btn btn-info add-contact-item" data-dismiss="modal"><i
                                                                class="la la-paper-plane-o d-lg-none"></i> <span class="d-none d-lg-block">Import</span></button>

                                                                    <button type="button" id="add-contact-item" class="btn btn-danger add-contact-item" data-dismiss="modal"><i
                                                                class="la la-paper-plane-o d-lg-none"></i> <span class="d-none d-lg-block">Cancel</span></button>
                                                        </fieldset>
                                                        </div>
                                                    </form>
                                                </section>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="col-md-2">
                                    <a href="Statements.html"> <button type="button" class="btn btn-secondary">Send Statements</button></a>
                                </div>
                                <div class="col-md-2">
                                    <a href="{{url('/contact')}}"> <button type="button" class="btn btn-success">Add Contacts</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="tab">
                                <button class="tablinks" onclick="openCity(event, 'all')" id="defaultOpen">All({{count($all)}})</button>
                                <button class="tablinks" onclick="openCity(event, 'customers')">Customers({{count($customer)}})</button>
                                <button class="tablinks" onclick="openCity(event, 'Suppliers')">Suppliers({{count($supplier)}})</button>
                                <button class="tablinks" onclick="openCity(event, 'Employees')">Employees({{count($employee)}})</button>
                                <button class="tablinks" onclick="openCity(event, 'Archived')">Archived(1)</button>
                                <div class="tab-new"> New Groups</div>
                                <button class="tablinks" onclick="openCity(event, 'TestGroup')">Test Group(2)</button>
                                <div class="tab-new"> Smart Lists</div>
                                <button class="tablinks" onclick="openCity(event, 'Purchased')">Have Purchased an Item</button>
                                <button class="tablinks" onclick="openCity(event, 'Outstanding')">Outstanding > 30 days</button>
                                <button class="tablinks" onclick="openCity(event, 'Outstanding')">Overdue > 7 days</button>
                                <button class="tablinks" onclick="openCity(event, 'Outstanding')">Paid us ( in the last year)</button>

                            </div>
                        
                            <div id="all" class="tabcontent">
                                <div class="row tab-row">
                                    <div class="col-md-3">
                                        <nav class="navbar navbar-expand-sm navbar-light bg-faded">
                                            <div class="collapse navbar-collapse" id="nav-content">
                                                <ul class="navbar-nav">
                                                    <li class="nav-item dropdown">
                                                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" id="Preview" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                                        Options
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="Preview">
                                                            <a class="dropdown-item" href="#">Dropdown Link 1</a>
                                                            <a class="dropdown-item" href="#">Dropdown Link 2</a>
                                                            <a class="dropdown-item" href="#">Dropdown Link 3</a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </nav>
                                    </div>
                                    <div class="col-md-1 tab-text">Edit</div>
                                    <div class="col-md-2 tab-text">1 Item Selected</div>
                                    <div class="col-md-3 tab-text">
                                        <form action="#">
                                            <div class="position-relative">
                                            <input type="search" id="search-contacts" class="form-control" placeholder="Search contacts...">
                                            <div class="form-control-position">
                                                <i class="la la-search text-size-base text-muted la-rotate-270"></i>
                                            </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="col-md-3">
                                        <nav class="navbar navbar-expand-sm navbar-light bg-faded">
                                            <!-- Links -->
                                            <div class="collapse navbar-collapse" id="nav-content">
                                            <ul class="navbar-nav">
                                                <li class="nav-item dropdown">
                                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" id="Preview" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                                    <span style="color: #666ee8;">Sort by:</span> Name
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="Preview">
                                                        <a class="dropdown-item" href="#">Dropdown Link 1</a>
                                                        <a class="dropdown-item" href="#">Dropdown Link 2</a>
                                                        <a class="dropdown-item" href="#">Dropdown Link 3</a>
                                                    </div>
                                                </li>
                                            </ul>
                                            </div>
                                        </nav>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="table-responsive">
                                        <table  class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable" role="grid" style="border: 1px solid #ccc;" >
                                            <thead>
                                                <tr role="row">
                                                    <th  tabindex="0"  >
                                                    <input type="checkbox" id="defaultCheck checkAll" name="example2">
                                                    </th>
                                                    <th  tabindex="0"> CONTACT</th>
                                                    <th  tabindex="0"> EMAIL</th>
                                                    <th  tabindex="0"> YOU OWE THEM</th>
                                                    <th  tabindex="0"> THEY OWE YOU</th>
                                                                                    </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($all as $user)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">
                                                    <input type="checkbox" id="defaultCheck" name="example2">
                                                    </td>
                                                    <td><a href="{{url('/contact')}}" class="text-bold-600">{{$user->contact_name}}</a></td>
                                                    <td>{{$user->email}}</td>
                                                    <td>{{$user->last_name}}</td>
                                                    <td>{{$user->phone}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div id="customers" class="tabcontent">
                            <div class="row tab-row">
                                    <div class="col-md-3">
                                        <nav class="navbar navbar-expand-sm navbar-light bg-faded">
                                            <div class="collapse navbar-collapse" id="nav-content">
                                                <ul class="navbar-nav">
                                                    <li class="nav-item dropdown">
                                                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" id="Preview" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                                        Options
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="Preview">
                                                            <a class="dropdown-item" href="#">Dropdown Link 1</a>
                                                            <a class="dropdown-item" href="#">Dropdown Link 2</a>
                                                            <a class="dropdown-item" href="#">Dropdown Link 3</a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </nav>
                                    </div>
                                    <div class="col-md-1 tab-text">Edit</div>
                                    <div class="col-md-2 tab-text">1 Item Selected</div>
                                    <div class="col-md-3 tab-text">
                                        <form action="#">
                                            <div class="position-relative">
                                            <input type="search" id="search-contacts" class="form-control" placeholder="Search contacts...">
                                            <div class="form-control-position">
                                                <i class="la la-search text-size-base text-muted la-rotate-270"></i>
                                            </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="col-md-3">
                                        <nav class="navbar navbar-expand-sm navbar-light bg-faded">
                                            <!-- Links -->
                                            <div class="collapse navbar-collapse" id="nav-content">
                                            <ul class="navbar-nav">
                                                <li class="nav-item dropdown">
                                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" id="Preview" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                                    <span style="color: #666ee8;">Sort by:</span> Name
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="Preview">
                                                        <a class="dropdown-item" href="#">Dropdown Link 1</a>
                                                        <a class="dropdown-item" href="#">Dropdown Link 2</a>
                                                        <a class="dropdown-item" href="#">Dropdown Link 3</a>
                                                    </div>
                                                </li>
                                            </ul>
                                            </div>
                                        </nav>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="table-responsive">
                                        <table  class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable" role="grid" style="border: 1px solid #ccc;" >
                                            <thead>
                                                <tr role="row">
                                                    <th  tabindex="0"  >
                                                    <input type="checkbox" id="defaultCheck checkAll" name="example2">
                                                    </th>
                                                    <th  tabindex="0"> CONTACT</th>
                                                    <th  tabindex="0"> EMAIL</th>
                                                    <th  tabindex="0"> YOU OWE THEM</th>
                                                    <th  tabindex="0"> THEY OWE YOU</th>
                                                                                    </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($customer as $user)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">
                                                    <input type="checkbox" id="defaultCheck" name="example2">
                                                    </td>
                                                    <td><a href="{{url('/contact')}}" class="text-bold-600">{{$user->contact_name}}</a></td>
                                                    <td>{{$user->email}}</td>
                                                    <td>{{$user->last_name}}</td>
                                                    <td>{{$user->phone}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div id="Suppliers" class="tabcontent">
                                <div class="row tab-row">
                                    <div class="col-md-3">
                                        <nav class="navbar navbar-expand-sm navbar-light bg-faded">
                                            <div class="collapse navbar-collapse" id="nav-content">
                                                <ul class="navbar-nav">
                                                    <li class="nav-item dropdown">
                                                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" id="Preview" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                                        Options
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="Preview">
                                                            <a class="dropdown-item" href="#">Dropdown Link 1</a>
                                                            <a class="dropdown-item" href="#">Dropdown Link 2</a>
                                                            <a class="dropdown-item" href="#">Dropdown Link 3</a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </nav>
                                    </div>
                                    <div class="col-md-1 tab-text">Edit</div>
                                    <div class="col-md-2 tab-text">1 Item Selected</div>
                                    <div class="col-md-3 tab-text">
                                        <form action="#">
                                            <div class="position-relative">
                                            <input type="search" id="search-contacts" class="form-control" placeholder="Search contacts...">
                                            <div class="form-control-position">
                                                <i class="la la-search text-size-base text-muted la-rotate-270"></i>
                                            </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="col-md-3">
                                        <nav class="navbar navbar-expand-sm navbar-light bg-faded">
                                            <!-- Links -->
                                            <div class="collapse navbar-collapse" id="nav-content">
                                            <ul class="navbar-nav">
                                                <li class="nav-item dropdown">
                                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" id="Preview" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                                    <span style="color: #666ee8;">Sort by:</span> Name
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="Preview">
                                                        <a class="dropdown-item" href="#">Dropdown Link 1</a>
                                                        <a class="dropdown-item" href="#">Dropdown Link 2</a>
                                                        <a class="dropdown-item" href="#">Dropdown Link 3</a>
                                                    </div>
                                                </li>
                                            </ul>
                                            </div>
                                        </nav>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="table-responsive">
                                        <table  class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable" role="grid" style="border: 1px solid #ccc;" >
                                            <thead>
                                                <tr role="row">
                                                    <th  tabindex="0"  >
                                                    <input type="checkbox" id="defaultCheck checkAll" name="example2">
                                                    </th>
                                                    <th  tabindex="0"> CONTACT</th>
                                                    <th  tabindex="0"> EMAIL</th>
                                                    <th  tabindex="0"> YOU OWE THEM</th>
                                                    <th  tabindex="0"> THEY OWE YOU</th>
                                                                                    </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($supplier as $user)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">
                                                    <input type="checkbox" id="defaultCheck" name="example2">
                                                    </td>
                                                    <td><a href="{{url('/contact')}}" class="text-bold-600">{{$user->contact_name}}</a></td>
                                                    <td>{{$user->email}}</td>
                                                    <td>{{$user->last_name}}</td>
                                                    <td>{{$user->phone}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div id="Employees" class="tabcontent">
                            <div class="row tab-row">
                                    <div class="col-md-3">
                                        <nav class="navbar navbar-expand-sm navbar-light bg-faded">
                                            <div class="collapse navbar-collapse" id="nav-content">
                                                <ul class="navbar-nav">
                                                    <li class="nav-item dropdown">
                                                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" id="Preview" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                                        Options
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="Preview">
                                                            <a class="dropdown-item" href="#">Dropdown Link 1</a>
                                                            <a class="dropdown-item" href="#">Dropdown Link 2</a>
                                                            <a class="dropdown-item" href="#">Dropdown Link 3</a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </nav>
                                    </div>
                                    <div class="col-md-1 tab-text">Edit</div>
                                    <div class="col-md-2 tab-text">1 Item Selected</div>
                                    <div class="col-md-3 tab-text">
                                        <form action="#">
                                            <div class="position-relative">
                                            <input type="search" id="search-contacts" class="form-control" placeholder="Search contacts...">
                                            <div class="form-control-position">
                                                <i class="la la-search text-size-base text-muted la-rotate-270"></i>
                                            </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="col-md-3">
                                        <nav class="navbar navbar-expand-sm navbar-light bg-faded">
                                            <!-- Links -->
                                            <div class="collapse navbar-collapse" id="nav-content">
                                            <ul class="navbar-nav">
                                                <li class="nav-item dropdown">
                                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" id="Preview" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                                    <span style="color: #666ee8;">Sort by:</span> Name
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="Preview">
                                                        <a class="dropdown-item" href="#">Dropdown Link 1</a>
                                                        <a class="dropdown-item" href="#">Dropdown Link 2</a>
                                                        <a class="dropdown-item" href="#">Dropdown Link 3</a>
                                                    </div>
                                                </li>
                                            </ul>
                                            </div>
                                        </nav>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="table-responsive">
                                        <table  class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable" role="grid" style="border: 1px solid #ccc;" >
                                            <thead>
                                                <tr role="row">
                                                    <th  tabindex="0"  >
                                                    <input type="checkbox" id="defaultCheck checkAll" name="example2">
                                                    </th>
                                                    <th  tabindex="0"> CONTACT</th>
                                                    <th  tabindex="0"> EMAIL</th>
                                                    <th  tabindex="0"> YOU OWE THEM</th>
                                                    <th  tabindex="0"> THEY OWE YOU</th>
                                                                                    </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($employee as $user)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">
                                                    <input type="checkbox" id="defaultCheck" name="example2">
                                                    </td>
                                                    <td><a href="{{url('/contact')}}" class="text-bold-600">{{$user->contact_name}}</a></td>
                                                    <td>{{$user->email}}</td>
                                                    <td>{{$user->last_name}}</td>
                                                    <td>{{$user->phone}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div id="Archived" class="tabcontent">
                            <div class="row tab-row">
                                    <div class="col-md-3">
                                        <nav class="navbar navbar-expand-sm navbar-light bg-faded">
                                            <div class="collapse navbar-collapse" id="nav-content">
                                                <ul class="navbar-nav">
                                                    <li class="nav-item dropdown">
                                                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" id="Preview" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                                        Options
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="Preview">
                                                            <a class="dropdown-item" href="#">Dropdown Link 1</a>
                                                            <a class="dropdown-item" href="#">Dropdown Link 2</a>
                                                            <a class="dropdown-item" href="#">Dropdown Link 3</a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </nav>
                                    </div>
                                    <div class="col-md-1 tab-text">Edit</div>
                                    <div class="col-md-2 tab-text">1 Item Selected</div>
                                    <div class="col-md-3 tab-text">
                                        <form action="#">
                                            <div class="position-relative">
                                            <input type="search" id="search-contacts" class="form-control" placeholder="Search contacts...">
                                            <div class="form-control-position">
                                                <i class="la la-search text-size-base text-muted la-rotate-270"></i>
                                            </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="col-md-3">
                                        <nav class="navbar navbar-expand-sm navbar-light bg-faded">
                                            <!-- Links -->
                                            <div class="collapse navbar-collapse" id="nav-content">
                                            <ul class="navbar-nav">
                                                <li class="nav-item dropdown">
                                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" id="Preview" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                                    <span style="color: #666ee8;">Sort by:</span> Name
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="Preview">
                                                        <a class="dropdown-item" href="#">Dropdown Link 1</a>
                                                        <a class="dropdown-item" href="#">Dropdown Link 2</a>
                                                        <a class="dropdown-item" href="#">Dropdown Link 3</a>
                                                    </div>
                                                </li>
                                            </ul>
                                            </div>
                                        </nav>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="table-responsive">
                                        <table  class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable" role="grid" style="border: 1px solid #ccc;" >
                                            <thead>
                                                <tr role="row">
                                                    <th  tabindex="0"  >
                                                    <input type="checkbox" id="defaultCheck checkAll" name="example2">
                                                    </th>
                                                    <th  tabindex="0"> CONTACT</th>
                                                    <th  tabindex="0"> EMAIL</th>
                                                    <th  tabindex="0"> YOU OWE THEM</th>
                                                    <th  tabindex="0"> THEY OWE YOU</th>
                                                                                    </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($supplier as $user)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">
                                                    <input type="checkbox" id="defaultCheck" name="example2">
                                                    </td>
                                                    <td><a href="{{url('/contact')}}" class="text-bold-600">{{$user->contact_name}}</a></td>
                                                    <td>{{$user->email}}</td>
                                                    <td>{{$user->last_name}}</td>
                                                    <td>{{$user->phone}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<script>
    function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
    }
    
    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
</script>
@endsection