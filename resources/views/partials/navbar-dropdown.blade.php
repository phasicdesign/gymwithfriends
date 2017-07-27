@if (!is_user_logged_in())
  <li class="waves-effect waves-light collection-item"><a href="/login">login</a></li>
@else
	@php global $current_user;
	@endphp
  <li class="collection-item avatar">
    <img src="{{ get_avatar_url($current_user->ID) }}" alt="" class="circle">
    <span class="title">{{ bp_core_get_user_displayname($current_user->ID) }}</span>
    <p>{{$current_user->user_email}}</p>
    <a href="#!" class="secondary-content"><i class="material-icons">contact_mail</i></a>
  </li>
  <li><a href="{{wp_logout_url()}}">Logout</a></li>
@endif