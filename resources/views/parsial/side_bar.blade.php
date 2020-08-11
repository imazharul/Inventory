<ul class="nav nav-tabs nav-stacked main-menu">
    <li><a href="#"><i class="icon-bar-chart"></i><span class="hidden-tablet">
                Dashboard</span></a>
    </li>
<li><a href="{{ route('pos') }}"><i class="icon-bar-chart"></i><span class="hidden-tablet">
        POS</span></a>
    </li>

                <li>
                    <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span
                            class="hidden-tablet"> Emplyee</span> 
                        </span></a>

                    <ul>
                        <li><a class="submenu" href="{{ URL::to('/addemplyee') }}"><i class="icon-file-alt"></i><span
                                    class="hidden-tablet"> Add Emplyee </span></a></li>
                        <li><a class="submenu" href="{{ URL::to('/allemplyee') }}"><i class="icon-file-alt"></i><span
                                    class="hidden-tablet"> All Emplyee </span></a></li>
                        
                    </ul>
                </li>
                <li>
                    <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span
                            class="hidden-tablet"> Customer</span> 
                        </span></a>
                    <ul>
                        <li><a class="submenu" href="{{ URL::to('/addcustomer') }}"><i class="icon-file-alt"></i><span
                                    class="hidden-tablet"> Add Customer </span></a></li>
                        <li><a class="submenu" href="{{ URL::to('/allcustomer') }}"><i class="icon-file-alt"></i><span
                                    class="hidden-tablet"> All Customer </span></a></li>
                        
                    </ul>
                </li>
                <li>
                    <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span
                            class="hidden-tablet"> Supplier</span> 
                        </span></a>
                    <ul>
                        <li><a class="submenu" href="{{ URL::to('/addsupplier') }}"><i class="icon-file-alt"></i><span
                                    class="hidden-tablet"> Add Supplier </span></a></li>
                        <li><a class="submenu" href="{{ URL::to('/allsupplier') }}"><i class="icon-file-alt"></i><span
                                    class="hidden-tablet"> All Supplier </span></a></li>
                        
                    </ul>
                </li>
                <li>
                    <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span
                            class="hidden-tablet"> Category</span> 
                        </span></a>
                    <ul>
                        <li><a class="submenu" href="{{ URL::to('/addcategory') }}"><i class="icon-file-alt"></i><span
                                    class="hidden-tablet"> Add Category </span></a></li>
                        <li><a class="submenu" href="{{ URL::to('/allcategory') }}"><i class="icon-file-alt"></i><span
                                    class="hidden-tablet"> All Category </span></a></li>
                        
                    </ul>
                </li>

                <li>
                    <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span
                            class="hidden-tablet"> Product </span> 
                        </span></a>
                    <ul>
                        <li><a class="submenu" href="{{ URL::to('/add_product') }}"><i class="icon-file-alt"></i><span
                                    class="hidden-tablet"> Add Product </span></a></li>
                        <li><a class="submenu" href="{{ URL::to('/all_product') }}"><i class="icon-file-alt"></i><span
                                    class="hidden-tablet"> All Product </span></a></li>
                        <li><a class="submenu" href="{{ route('import_product') }}"><i class="icon-file-alt"></i><span
                                    class="hidden-tablet"> Import Product </span></a></li>
                        
                    </ul>
                </li>

                <li>
                    <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span
                            class="hidden-tablet"> Expences </span> 
                        </span></a>
                    <ul>
                        <li><a class="submenu" href="{{ URL::to('/add_expences') }}"><i class="icon-file-alt"></i><span
                                    class="hidden-tablet"> Add Expences </span></a></li>
                        <li><a class="submenu" href="{{ URL::to('/all_expences') }}"><i class="icon-file-alt"></i><span
                                    class="hidden-tablet"> All Expences </span></a></li>
                        <li><a class="submenu" href="{{ URL::to('/today_expences') }}"><i class="icon-file-alt"></i><span
                                    class="hidden-tablet"> Today Expences </span></a></li>
                        <li><a class="submenu" href="{{ URL::to('/monthexpences') }}"><i class="icon-file-alt"></i><span
                                    class="hidden-tablet"> Month Expences </span></a></li>
                        <li><a class="submenu" href="{{ URL::to('/year_expences') }}"><i class="icon-file-alt"></i><span
                                    class="hidden-tablet"> Yearly Expences </span></a></li>
                        
                    </ul>
                </li>
                <li>
                    <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span
                            class="hidden-tablet"> Salary (EMP)</span> 
                        </span></a>
                    <ul>
                        <li><a class="submenu" href="{{ URL::to('/addsalary') }}"><i class="icon-file-alt"></i><span
                                    class="hidden-tablet"> Add Advance Salary </span></a>
                        </li>
                        <li><a class="submenu" href="{{ URL::to('/all_advance_salary_show') }}"><i class="icon-file-alt"></i><span
                                    class="hidden-tablet"> All Advance Salary Show </span></a>
                        </li>
                        <li><a class="submenu" href="{{ URL::to('/paysalary') }}"><i class="icon-file-alt"></i><span
                                        class="hidden-tablet"> Pay Salary </span></a>
                        </li>
                        <li><a class="submenu" href="{{ URL::to('/lastmonthsalary') }}"><i class="icon-file-alt"></i><span
                                            class="hidden-tablet"> Last Month Salary</span></a>
                        </li>
                        
                    </ul>
                </li>
                <li>
                    <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span
                            class="hidden-tablet"> Order</span> 
                        </span></a>
                    <ul>
                    <li><a class="submenu" href="{{ URL::to('/panding_order')}}"><i class="icon-file-alt"></i><span
                                    class="hidden-tablet"> Panding Order </span></a></li>
                        <li><a class="submenu" href="{{ URL::to('/success_order')}}"><i class="icon-file-alt"></i><span
                                    class="hidden-tablet"> Approved Order </span></a></li>
                        
                    </ul>
                </li>
                <li>
                    <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span
                            class="hidden-tablet"> Seles Report</span> 
                        </span></a>
                    <ul>
                        <li><a class="submenu" href="#"><i class="icon-file-alt"></i><span
                                    class="hidden-tablet"> First </span></a></li>
                        <li><a class="submenu" href="#"><i class="icon-file-alt"></i><span
                                    class="hidden-tablet"> Secand </span></a></li>
                        
                    </ul>
                </li>
                <li>
                    <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span
                            class="hidden-tablet"> Attendance</span> 
                        </span></a>
                    <ul>
                        <li><a class="submenu" href="{{ URL::to('/take_attendance') }}"><i class="icon-file-alt"></i><span
                                    class="hidden-tablet"> Take Attendance </span></a></li>
                        <li><a class="submenu" href="{{ URL::to('/all_attendance') }}"><i class="icon-file-alt"></i><span
                                    class="hidden-tablet"> All Attendance </span></a></li>
                        
                    </ul>
                </li>
        

                </li>
                
                <li><a href="#"><i class="icon-lock"></i><span class="hidden-tablet"> Setting</span></a>
                            <ul>
                                <li><a class="submenu" href="{{URL::to('/add_Setting')}}"><i class="icon-file-alt"></i><span
                                            class="hidden-tablet"> Setting </span></a></li>
                                
                            </ul>
                        
               </li>
            </ul>