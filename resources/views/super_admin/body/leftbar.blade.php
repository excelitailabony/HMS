 <div id="sidebar-menu">
     <!-- Left Menu Start -->
     <ul class="metismenu list-unstyled" id="side-menu">
         <li class="menu-title">Main</li>

         <li>
             <a href="{{ url('/admin/dashboard') }}" class="waves-effect">
                 <i class="ti-home"></i>
                 <span>Dashboard</span>
             </a>
         </li>

         <li>
             <a href="javascript: void(0);" class="has-arrow waves-effect">
                 <i class="ti-email"></i>
                 <span>Email</span>
             </a>
             <ul class="sub-menu" aria-expanded="false">
                 <li><a href="email-inbox.html">Inbox</a></li>
                 <li><a href="email-read.html">Email Read</a></li>
                 <li><a href="email-compose.html">Email Compose</a></li>
             </ul>
         </li>

         <li>
             <a href="{{ route('all.patient') }}" class="waves-effect">
                 <i class="ti-home"></i>
                 <span>Patient</span>
             </a>
         </li>

         <li>
             <a href="{{ route('all.doctor') }}" class="waves-effect">
                 <i class="ti-home"></i>
                 <span>Doctor</span>
             </a>
         </li>


     </ul>
 </div>
