<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
   <script type="text/javascript">
      try{ace.settings.loadState('sidebar')}catch(e){}
   </script>
   <!-- /.sidebar-shortcuts -->
   <ul class="nav nav-list">
      <li class="{{ request()->is('home') ? 'active' : '' }}">
         <a class="app-menu__item"  target="_blank"  href="{{route('user.home')}}">
         <i class="menu-icon fa fa-globe"></i>
         <span class="app-menu__label">Visit Site</span>
         </a>
      </li>
      <li class="{{ request()->is('admin/home') ? 'active' : '' }}">
         <a href="{{ url('admin/home') }}">
         <i class="menu-icon fa fa-tachometer"></i>
         <span class="menu-text"> Dashboard </span>
         </a> <b class="arrow"></b>
      </li>
      <!-- Global Settings -->
      <li class="">
         <a href="#" class="dropdown-toggle" style="">
         <i class="menu-icon fa fa-child"></i>
         <span class="menu-text">Global Settings</span>
         <b class="arrow fa fa-angle-down"></b>
         </a>
         <b class="arrow"></b>
         <ul class="submenu">
            <li class="{{ request()->is('admin/siteConfig') ? 'active' : '' }}">
                  <a href="{{ url('admin/siteConfig') }}">
                  <i class="menu-icon fa fa-sliders" ></i>
                  <span class="menu-text"> Institute </span>
                  </a>  <b class="arrow"></b>
            </li>
            <li class="{{ request()->is('admin_sms') ? 'active' : '' }}">
                  <a href="{{ url('admin_sms') }}">
                  <i class="menu-icon fa fa-sliders" ></i>
                  <span class="menu-text"> Sms Panel </span>
                  </a>  <b class="arrow"></b>
            </li>
            
         </ul>
      </li>
      <!-- Global Settings End -->
      {{-- UI Element --}}
      {{--    
      <li class="">
         <a href="#" class="dropdown-toggle">
         <i class="menu-icon fa fa-desktop"></i>
         <span class="menu-text">
         UI &amp; Elements
         </span>
         <b class="arrow fa fa-angle-down"></b>
         </a>
         <b class="arrow"></b>
         <ul class="submenu">
            <li class="">
               <a href="#" class="dropdown-toggle">
               <i class="menu-icon fa fa-caret-right"></i>
               Layouts
               <b class="arrow fa fa-angle-down"></b>
               </a>
               <b class="arrow"></b>
               <ul class="submenu">
                  <li class="">
                     <a href="mobile-menu-3.html">
                     <i class="menu-icon fa fa-caret-right"></i>
                     Mobile Menu 3
                     </a>
                     <b class="arrow"></b>
                  </li>
               </ul>
            </li>
            <li class="">
               <a href="#" class="dropdown-toggle">
               <i class="menu-icon fa fa-caret-right"></i>
               Three Level Menu
               <b class="arrow fa fa-angle-down"></b>
               </a>
               <b class="arrow"></b>
               <ul class="submenu">
                  <li class="">
                     <a href="#">
                     <i class="menu-icon fa fa-leaf green"></i>
                     Item #1
                     </a>
                     <b class="arrow"></b>
                  </li>
                  <li class="">
                     <a href="#" class="dropdown-toggle">
                     <i class="menu-icon fa fa-pencil orange"></i>
                     4th level
                     <b class="arrow fa fa-angle-down"></b>
                     </a>
                     <b class="arrow"></b>
                     <ul class="submenu">
                        <li class="">
                           <a href="#">
                           <i class="menu-icon fa fa-plus purple"></i>
                           Add Product
                           </a>
                           <b class="arrow"></b>
                        </li>
                        <li class="">
                           <a href="#">
                           <i class="menu-icon fa fa-eye pink"></i>
                           View Products
                           </a>
                           <b class="arrow"></b>
                        </li>
                     </ul>
                  </li>
               </ul>
            </li>
         </ul>
      </li>
      --}}
      {{-- Web Management --}}
      <li class="">
         <a href="#" class="dropdown-toggle">
         <i class="menu-icon fa fa-desktop"></i>
         <span class="menu-text">
         Web Management
         </span>
         <b class="arrow fa fa-angle-down"></b>
         </a>
         <b class="arrow"></b>
         <ul class="submenu">
            <li class="{{ request()->is('admin/aboutUs') ? 'active' : '' }}">
               <a href="{{ url('admin/aboutUs') }}">
               <i class="menu-icon fa fa-list-alt" ></i>
               <span class="menu-text"> About Us </span>
               </a> <b class="arrow"></b>
            </li>
            <li class="{{ request()->is('admin/message') ? 'active' : '' }}">
               <a href="{{ url('admin/message') }}">
               <i class="menu-icon fa fa-quote-left"></i>
               <span class="menu-text"> Message </span>
               </a> <b class="arrow"></b>
            </li>
            <li class="{{ request()->is('admin/slider') ? 'active' : '' }}">
               <a href="{{ url('admin/slider') }}">
               <i class="menu-icon fa fa-sliders" ></i>
               <span class="menu-text"> Slider </span>
               </a>  <b class="arrow"></b>
            </li>
            <li class="{{ request()->is('admin/newsUpdate','admin/newsUpdate/create','admin/newsUpdate/') ? 'active' : '' }}">
               <a href="{{ url('admin/newsUpdate') }}">
               <i class="menu-icon fa fa-building-o" ></i>
               <span class="menu-text"> News & Update </span>
               </a>  <b class="arrow"></b>
            </li>
{{--            <li class="{{ request()->is('admin/newsUpdate/create') ? 'active' : '' }}">--}}
{{--               <a href="{{ url('admin/newsUpdate/create') }}">--}}
{{--               <i class="menu-icon fa fa-building-o" ></i>--}}
{{--               <span class="menu-text"> News & Update crea </span>--}}
{{--               </a>  <b class="arrow"></b>--}}
{{--            </li>--}}
            <li class="{{ request()->is('admin/notice-board','admin/notice-board/create') ? 'active' : '' }}">
               <a href="{{ url('admin/notice-board') }}">
               <i class="menu-icon fa fa-sliders" ></i>
               <span class="menu-text">Notice Board </span>
               </a>  <b class="arrow"></b>
            </li>

            <li class="{{ request()->is('admin/faculty','admin/faculty/create') ? 'active' : '' }}">
               <a href="{{ url('admin/faculty') }}">
               <i class="menu-icon fa fa-file"></i>
               <span class="menu-text"> Teacher List </span>
               </a> <b class="arrow"></b>
            </li>

            <li class="{{ request()->is('admin/portfolio','admin/portfolio/create') ? 'active' : '' }}">
               <a href="{{ url('admin/portfolio') }}">
               <i class="menu-icon fa fa-sliders" ></i>
               <span class="menu-text">Portfolio </span>
               </a>  <b class="arrow"></b>
            </li>

            <li class="{{ request()->is('admin/successStudent','admin/successStudent/create') ? 'active' : '' }}">
               <a href="{{ url('admin/successStudent') }}">
               <i class="menu-icon fa fa-quote-left"></i>
               <span class="menu-text"> Success Student </span>
               </a> <b class="arrow"></b>
            </li>
            <li class="{{ request()->is('admin/addmissionOn','admin/addmissionOn/create') ? 'active' : '' }}">
               <a href="{{ url('admin/addmissionOn') }}">
               <i class="menu-icon fa fa-sliders" ></i>
               <span class="menu-text"> Admission On </span>
               </a> <b class="arrow"></b>
            </li>
           <?php  if(Auth::user()->role != '1'):?>
               <li class="{{ request()->is('admin/service','admin/service/create') ? 'active' : '' }}">
                  <a href="{{ url('admin/service') }}">
                  <i class="menu-icon fa fa-sliders" ></i>
                  <span class="menu-text">MMIT Services </span>
                  </a>  <b class="arrow"></b>
               </li>
            <?php endif; ?>
            
            <li class="{{ request()->is('admin/photoGallary','admin/photoGallary/create','admin/vedioGallary','admin/vedioGallary/create') ? 'active' : '' }}">
               <a href="#" class="dropdown-toggle">
               <i class="menu-icon fa fa-desktop"></i>
               <span class="menu-text">
               Gallary
               </span>
               <b class="arrow fa fa-angle-down"></b>
               </a>
               <b class="arrow"></b>
               <ul class="submenu">
                  <li class="{{ request()->is('admin/photoGallary') ? 'active' : '' }}">
                     <a href="{{ url('admin/photoGallary') }}">
                     <i class="menu-icon fa fa-caret-right"></i>
                     Photo Gallary 
                     </a> 
                  </li>
                  <li class="{{ request()->is('admin/vedioGallary') ? ' active' : '' }}">
                     <a href="{{ url('admin/vedioGallary') }}">
                     <i class="menu-icon fa fa-list-alt" ></i>
                     <span class="menu-text"> Video Gallary </span>
                     </a>
                  </li>
               </ul>
            </li>
            {{--      MENU--}}
            <li class="">
               <a href="#" class="dropdown-toggle">
                  <i class="menu-icon fa fa-list"></i>
                  <span class="menu-text">
                     Menu
                  </span>
                  <b class="arrow fa fa-angle-down"></b>
               </a>
               <b class="arrow"></b>
               <ul class="submenu">
                  <li class="{{ request()->is('mcreate') ? 'active' : ''   }}">
                     <a href="{{ url('mcreate') }}">
                        <i class="menu-icon fa fa-sliders" ></i>
                        <span class="menu-text"> Create </span>
                     </a>  <b class="arrow"></b>
                  </li>
      
                  <li class="{{ request()->is('mview') ? 'active' : ''   }}">
                     <a href="{{ url('mview') }}">
                        <i class="menu-icon fa fa-sliders" ></i>
                        <span class="menu-text"> Menu List </span>
                     </a>  <b class="arrow"></b>
                  </li>
               </ul>
            </li>
            {{--    END  MENU--}}
            
            {{-- Social Icon --}}
            <li class="">
               <a href="#" class="dropdown-toggle">
                  <i class="menu-icon fa fa-facebook"></i>
                  <span class="menu-text">
                     Social Icon
                  </span>
                  <b class="arrow fa fa-angle-down"></b>
               </a>
               <b class="arrow"></b>
               <ul class="submenu">
                  <li class="{{ request()->is('icon/create') ? 'active' : ''   }}">
                     <a href="{{ url('/icon/create/') }}">
                        <i class="menu-icon fa fa-sliders" ></i>
                        <span class="menu-text"> Create </span>
                     </a> 
                     <b class="arrow"></b>
                  </li>
      
                  <li class="{{ request()->is('icon/view') ? 'active' : ''   }}">
                     <a href="{{ url('/icon/view/') }}">
                        <i class="menu-icon fa fa-sliders" ></i>
                        <span class="menu-text"> Icon List </span>
                     </a>  <b class="arrow"></b>
                  </li>
               </ul>
            </li>
            <!-- <li>
               <a href="https://mmitsms.com/" target="blank">
                  <i class="menu-icon fa fa-building-o" ></i>
                  <span class="menu-text"> SMS Software </span>
               </a>
               <b class="arrow"></b>
            </li>   -->          
            {{--    END  MENU--}}
      
         </ul>
      </li>
      <li class="">
         <a href="#" class="dropdown-toggle" style="">
         <i class="menu-icon fa fa-child"></i>
         <span class="menu-text">Student Manage</span>
         <b class="arrow fa fa-angle-down"></b>
         </a>
         <b class="arrow"></b>
         <ul class="submenu">
            <li class="<!-- {{ request()->is('admin/year') ? 'active' : '' }} -->">
                  <a href="{{ route('year.index') }}">
                  <i class="menu-icon fa fa-sliders" ></i>
                  <span class="menu-text"> Year </span>
                  </a>  <b class="arrow"></b>
            </li>
            <li class="{{ request()->is('admin/session') ? 'active' : '' }}">
                  <a href="{{ url('admin/session') }}">
                  <i class="menu-icon fa fa-sliders" ></i>
                  <span class="menu-text"> Session </span>
                  </a>  <b class="arrow"></b>
            </li>
            <li class="{{ request()->is('admin/batch') ? 'active' : '' }}">
               <a href="{{ url('admin/batch') }}">
               <i class="menu-icon fa fa-sliders" ></i>
               <span class="menu-text"> Batch </span>
               </a>  <b class="arrow"></b>
            </li>
            <li class="{{ request()->is('admin/course') ? 'active' : '' }}">
               <a href="{{ url('admin/course') }}">
                  <i class="menu-icon fa fa-list-alt" ></i>
                  <span class="menu-text"> Courses </span>
               </a>  <b class="arrow"></b>
            </li>
            <li class="{{ request()->is('admin/applyNow') ? 'active' : '' }}">
               <a href="{{ url('admin/applyNow') }}">
               <i class="menu-icon fa fa-sliders" ></i>
               <span class="menu-text">  Online Applicant </span>
               </a>  <b class="arrow"></b>
            </li>

            <li class="{{ request()->is('admin/studentProfile/create') ? 'active' : '' }}">
               <a href="{{ url('admin/studentProfile/create') }}">
                  <i class="menu-icon fa fa-sliders" ></i>
                  <span class="menu-text"> Student Admission </span>
               </a>  <b class="arrow"></b>
            </li>
            <li class="{{ request()->is('admin/studentProfile') ? 'active' : '' }}">
               <a href="{{ url('admin/studentProfile') }}">
               <i class="menu-icon fa fa-sliders" ></i>
               <span class="menu-text"> Student List </span>
               </a>  <b class="arrow"></b>
            </li>
            <li class="{{ request()->is('admin/student/Result') ? 'active' : '' }}">
               <a href="{{ url('admin/student/Result') }}">
               <i class="menu-icon fa fa-sliders" ></i>
               <span class="menu-text"> Result </span>
               </a>  <b class="arrow"></b>
            </li>
         </ul>
      </li>
      <!-- {{--accounts--}} -->
      <li class="">
         <a href="#" class="dropdown-toggle">
            <i class="menu-icon fa fa-user"></i>
            <span class="menu-text">
            Accounts
            </span>
            <b class="arrow fa fa-angle-down"></b>
         </a>
         <b class="arrow"></b>
         <ul class="submenu">
            <li class="{{ request()->is('admin/account/create','admin/account') ? 'active' : '' }}">
               <a href="{{ url('admin/account/create') }}">
               <i class="menu-icon fa fa-sliders" ></i>
               <span class="menu-text"> Chart of Account </span>
               </a>  <b class="arrow"></b>
            </li>
            <li class="{{ request()->is('admin/party/create','admin/party') ? 'active' : '' }}">
               <a href="{{ url('admin/party/create') }}">
               <i class="menu-icon fa fa-sliders" ></i>
               <span class="menu-text"> Party Information</span>
               </a>  <b class="arrow"></b>
            </li>
            <li class="{{ request()->is('admin/student-payment/create','admin/student-payment') ? 'active' : '' }}">
               <a href="{{ url('admin/student-payment/create') }}">
               <i class="menu-icon fa fa-sliders" ></i>
               <span class="menu-text"> Student Payment </span>
               </a>  <b class="arrow"></b>
            </li>
            <li class="{{ request()->is('admin/dueReceive') ? 'active' : '' }}">
               <a href="{{ url('admin/dueReceive') }}">
               <i class="menu-icon fa fa-sliders" ></i>
               <span class="menu-text">Student Payment Due</span>
               </a>  <b class="arrow"></b>
            </li>
            <li class="{{ request()->is('admin/incomeDue') ? 'active' : '' }}">
               <a href="{{ url('admin/incomeDue') }}">
               <i class="menu-icon fa fa-sliders" ></i>
               <span class="menu-text">Income Due</span>
               </a>  <b class="arrow"></b>
            </li>
            <li class="{{ request()->is('admin/expenceDue') ? 'active' : '' }}">
               <a href="{{ url('admin/expenceDue') }}">
               <i class="menu-icon fa fa-sliders" ></i>
               <span class="menu-text">Expence Due</span>
               </a>  <b class="arrow"></b>
            </li>
            <li class="{{ request()->is('admin/income/create','admin/income')? 'active':''}}">
               <a href="{{ url('admin/income/create') }}">
               <i class="menu-icon fa fa-sliders" ></i>
               <span class="menu-text"> Institute Income </span>
               </a>  <b class="arrow"></b>
            </li>
            <li class="{{ request()->is('admin/expense/create','admin/expense') ? 'active' : '' }}">
               <a href="{{ url('admin/expense/create')}}">
               <i class="menu-icon fa fa-sliders" ></i>
               <span class="menu-text"> Institute Expense </span>
               </a>  <b class="arrow"></b>
            </li>
             <li class="{{ request()->is('admin/expenseReport','admin/incomeReport','admin/studentPaymentReport','admin/incomeExpenseReport') ? 'active' : '' }}">
               <a href="#" class="dropdown-toggle">
               <i class="menu-icon fa fa-desktop"></i>
               <span class="menu-text">
               Report
               </span>
               <b class="arrow fa fa-angle-down"></b>
               </a>
               <b class="arrow"></b>
               <ul class="submenu"> 
               <li class="{{ request()->is('admin/studentPaymentReport') ? 'active' : '' }}">
                  <a href="{{url('admin/studentPaymentReport')}}">
                  <i class="menu-icon fa fa-sliders" ></i>
                  <span class="menu-text" style="font-size: 11px;"> Student Payment Report </span>
                  </a>  <b class="arrow"></b>
               </li>

               <li class="{{ request()->is('admin/incomeReport') ? 'active' : '' }}">
                  <a href="{{url('admin/incomeReport')}}">
                  <i class="menu-icon fa fa-sliders" ></i>
                  <span class="menu-text"> Income Report </span>
                  </a>  <b class="arrow"></b>
               </li>

               <li class="{{ request()->is('admin/expenseReport') ? 'active' : '' }}">
                  <a href="{{url('admin/expenseReport')}}">
                  <i class="menu-icon fa fa-sliders" ></i>
                  <span class="menu-text"> Expense Report </span>
                  </a>  <b class="arrow"></b>
               </li>
               
               
               <li class="{{ request()->is('admin/incomeExpenseReport') ? 'active' : '' }}">
                  <a href="{{ url('admin/incomeExpenseReport') }}">
                  <i class="menu-icon fa fa-sliders" ></i>
                  <span class="menu-text" style="font-size: 11px;">Income Expense Report </span>
                  </a>  <b class="arrow"></b>
               </li>
               </ul>
            </li>
         </ul>

      {{-- <li class="{{ request()->is('contact') ? 'active' : '' }}">
         <a href="{{ url('admin/contact') }}">
         <i class="menu-icon fa fa-sliders" ></i>
         <span class="menu-text"> Contact </span>
         </a>  <b class="arrow"></b>
      </li>--}}
      <?php  if(Auth::user()->role != '1'):?>
      
            <li class="{{ request()->is('admin/user') ? 'active' : '' }}">
               <a href="{{ url('admin/user') }}">
               <i class="menu-icon fa fa-sliders" ></i>
               <span class="menu-text"> Users </span>
               </a>  <b class="arrow"></b>
            </li>
         <?php endif; ?>
      </li>


   </ul>
   <!-- /.nav-list -->
   <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
      <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
   </div>
</div>