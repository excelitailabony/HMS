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
             <a href="{{ route('all.accountant') }}" class="waves-effect">
                 <i class="ti-home"></i>
                 <span>Accountant</span>
             </a>
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
         <li>
             <a href="{{ route('all.laboratorist') }}" class="waves-effect">
                 <i class="ti-home"></i>
                 <span>Laboratorist</span>
             </a>
         </li>
         <li>
             <a href="{{ route('all.receptionist') }}" class="waves-effect">
                 <i class="ti-home"></i>
                 <span>Receptionist</span>
             </a>
         </li>


         <li>
             <a href="{{ route('view.nurse') }}" class="waves-effect">
                 <i class="ti-email"></i>
                 <span>Nurse</span>
             </a>
             <ul class="sub-menu" aria-expanded="false">
                 <li><a href="{{ route('view.nurse') }}">View Nurse</a></li>

             </ul>
         </li>

         <li>
             <a href="javascript: void(0);" class="has-arrow waves-effect">
                 <i class="ti-email"></i>
                 <span>Blood Bank</span>
             </a>
             <ul class="sub-menu" aria-expanded="false">
                 <li><a href="{{ route('blood.issue') }}">Blood Issue</a></li>
             </ul>
             <ul class="sub-menu" aria-expanded="false">
                 <li><a href="">Blood Bag</a></li>
             </ul>
             <ul class="sub-menu" aria-expanded="false">
                 <li><a href="{{route('all.blooddonation')}}">Blood Donation</a></li>
             </ul>
             <ul class="sub-menu" aria-expanded="false">
                 <li><a href="{{route('all.blooddonor')}}">Blood Donor</a></li>
             </ul>
         </li>

     </ul>
 </div>
