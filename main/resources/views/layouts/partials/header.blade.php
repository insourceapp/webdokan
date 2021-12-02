 <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline  @if(Session::get('dir')=='rtl')ml-auto @else mr-auto @endif">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
        
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <div>
               <div class="text-lg-right top-right-bar mt-2 mt-lg-0">
                 @if(Cache::has('active_languages'))
                 @php
                 $langs=Cache::get('active_languages');
                 @endphp
                  <form class="translate_form" action="{{ route('admin.translate') }}">
                   <select class="translate_option" name="local" onchange="this.form.submit()">
                     @foreach($langs as $key=>$row)
                     <option value="{{ $key }}"  @if(Session::get('locale') == $key) selected @endif>{{ $row }}</option>
                     @endforeach
                  </select>
                 </form>
                 @endif
                  
               </div>
            </div>
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              @if(Auth::user()->role_id == 3)
               @if(Auth::user()->status == 1)
               <a href="{{ route('seller.seller.settings') }}" class="dropdown-item has-icon">
                <i class="far fa-user"></i> {{ __('Profile Settings') }}
               </a>
               @else
               <a href="{{ route('merchant.profile.settings') }}" class="dropdown-item has-icon">
                <i class="far fa-user"></i> {{ __('Profile Settings') }}
               </a>
               @endif
              @else
              <a href="{{ route('admin.profile.settings') }}" class="dropdown-item has-icon">
                <i class="far fa-user"></i> {{ __('Profile Settings') }}
              </a>

              @endif
             
             
              <div class="dropdown-divider"></div>
              <a href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();" class="dropdown-item has-icon text-danger">
              <i class="fas fa-sign-out-alt"></i>  {{ __('Logout') }}
            </a>



            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="none">
              @csrf
            </form>
          </div>
        </li>
      </ul>
    </nav>