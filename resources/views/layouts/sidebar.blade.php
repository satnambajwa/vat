<div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-dark navbar-without-dd-arrow navbar-shadow" role="navigation" data-menu="menu-wrapper">
         <div class="navbar-container main-menu-content" data-menu="menu-container">
            <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
               <li class="dropdown nav-item" data-menu="dropdown">
                  <a class="nav-link" href="{{url('/dashboard')}}" ><i class="la la-home"></i><span>Dashboard</span></a>
               </li>
               <li class="dropdown nav-item" data-menu="dropdown">
                  <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="la la-folder-open"></i><span>Business</span></a>
                  <ul class="dropdown-menu">
                   <li data-menu=""><a class="dropdown-item" href="{{url('/invoices')}}" data-toggle="dropdown">Invoices</a></li>
                   <li data-menu=""><a class="dropdown-item" href="{{url('/quotes')}}" data-toggle="dropdown">Quotes</a></li>
                    <li data-menu=""><a class="dropdown-item" href="{{url('/overview/sales')}}" data-toggle="dropdown">Sales Overview</a></li>
                   <li data-menu=""><a class="dropdown-item" href="{{url('/bills')}}" data-toggle="dropdown">Bills To Pay</a></li>
                    <li data-menu=""><a class="dropdown-item" href="{{url('/purchases')}}" data-toggle="dropdown">Purchase Order</a></li>
                    <li data-menu=""><a class="dropdown-item" href="{{url('/overview/purchase')}}" data-toggle="dropdown">Purchase Overview</a></li>
                   <li data-menu=""><a class="dropdown-item" href="{{url('/expenses')}}" data-toggle="dropdown">Expense Claims</a></li>
                   <li data-menu=""><a class="dropdown-item" href="{{url('/products')}}" data-toggle="dropdown">Product & Services</a></li>
                        </ul>
               </li>
               <li class="dropdown nav-item" data-menu="dropdown">
                  <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="la la-th-list"></i><span>Accounting</span></a>
                  <ul class="dropdown-menu">
                     <li data-menu=""><a class="dropdown-item" href="#" data-toggle="dropdown">Bank Accounts</a></li>
                     <li data-menu=""><a class="dropdown-item" href="{{url('/reports')}}" data-toggle="dropdown">Reports</a></li>
                     <li data-menu=""><a class="dropdown-item" href="{{url('/accounts')}}" data-toggle="dropdown">Accounts</a></li>
                     <li data-menu=""><a class="dropdown-item" href="{{url('/taxRate')}}" data-toggle="dropdown">Tax Rate</a></li>
                     <li data-menu=""><a class="dropdown-item" href="{{url('/advanced')}}" data-toggle="dropdown">Advanced</a></li>
                     <hr>
                     <li data-menu=""><a class="dropdown-item" href="#" data-toggle="dropdown">Cash Summary</a></li>
                  </ul>
               </li>
               
               <li class="dropdown nav-item" data-menu="dropdown">
                  <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="la la-share-alt"></i><span>Contacts</span></a>
                  <ul class="dropdown-menu">
                   <li data-menu=""><a class="dropdown-item" href="{{url('/contacts')}}" data-toggle="dropdown">All Contacts</a></li>
                   <li data-menu=""><a class="dropdown-item" href="{{url('/contacts')}}" data-toggle="dropdown">Customers</a></li>
                    <li data-menu=""><a class="dropdown-item" href="{{url('/contacts')}}" data-toggle="dropdown">Suppliers</a></li>
                  
                        </ul>
               </li>
            </ul>
         </div>
      </div>