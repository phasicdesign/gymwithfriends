<nav class="">
  <div class="nav-wrapper">
    <div class="col s12">
      <a href="{!!esc_url( home_url('/'))!!}" class="brand-logo flow-text" style="font-size:1.5em;"><strong>Gym</strong> with Friends</a></a>

      <ul id="slide-out" class="side-nav">
    @if (!is_user_logged_in())
        <li class="waves-effect waves-light link"><a href="/about">About</a></li>
        <li class="waves-effect waves-light link"><a href="/features">Features</a></li>
    @else
      @php global $current_user;
      @endphp
          <li><div class="userView">
            <div class="background light-green">
            </div>
            <a href="#!user"><img class="circle" src="{{ get_avatar_url($current_user->ID) }}"></a>
            <a href="#!name"><span class="white-text name">{{ bp_core_get_user_displayname($current_user->ID) }}</span></a>
            <a href="#!email"><span class="white-text email">{{$current_user->user_email}}</span></a>
          </div></li>
          <li><a href="#!"><i class="mdi mdi-account"></i>Stats</a></li>
          <li><a href="#!"><i class="mdi mdi-account-multiple"></i>Friends</a></li>
          <li><a href="#!"><i class="mdi mdi-trophy"></i>Challenges</a></li>
          <li><div class="divider"></div></li>
          <li><a href="#!"><i class="mdi mdi-settings"></i>Settings</a></li>
          <li><a href="#!"><i class="mdi mdi-watch"></i>Trackers</a></li>
          <li><a href="#!"><i class="mdi mdi-bell"></i>Notifications</a></li>
    @endif
        </ul>
        <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>

      <!-- Navbar menu -->
      <ul id="nav-mobile" class="right">
        <li><a class="dropdown-button" href="#!" data-activates="dropdown" data-beloworigin="true"><i class="material-icons">account_circle</i></a></li>
      </ul>

      <ul class="right hide-on-med-and-down">  
      @if (!is_user_logged_in())
        <li class="waves-effect waves-light link"><a href="/about">About</a></li>
        <li class="waves-effect waves-light link"><a href="/features">Features</a></li>
      @else
        <li class="waves-effect waves-light link"><a href="/notifications"><i class="mdi mdi-bell"></i></a></li>
      @endif
        </ul>

      <!-- Dropdown menu -->
      <ul id="dropdown" class="dropdown-content collection">
        @include('partials/navbar-dropdown')
      </ul>


    </div>
  </div>
</nav>
