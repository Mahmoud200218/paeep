  <!-- Notifications Menu -->
  <span style="color: red;">{{$newCount}}</span>
  <li class="nav-item dropdown">
      <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
          <i class="fas fa-bell" style="font-size: 18px; color:#3F4254; margin-bottom:18px;"></i>
          <span class="count-symbol bg-danger"></span>
      </a>
      <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown" style="margin-left: -150px;width:auto;">
          <h6 class="p-3 mb-0"><span style="color: red; display:inline;">{{$newCount}} </span> Notifications</h6>
          @foreach($notifications as $notification)
          <a class="dropdown-item preview-item" href="{{ $notification->data['url'] }}?notification_id={{ $notification->id }}" style="display: flex;">
              <div class="{{ $notification->data['icon'] }}" style="margin:0 20px; font-size:18px; color:#0091DE;"></div>
              <div class="flex">
                  <div class="preview-thumbnail">
                      <div class="preview-icon bg-info">
                          <i class="mdi mdi-link-variant"></i>
                      </div>
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                      <h6 class="preview-subject font-weight-normal mb-1">{{ $notification->data['name'] }}
                          @if($notification->unread())
                          <span style="color:red;">*</span>
                          @endif
                      </h6>
                      <p class="text-gray ellipsis mb-0">{{ $notification->data['email'] }}</p>
                      <p class="text-gray ellipsis mb-0">{{ $notification->created_at->diffForHumans()}}</p>
                  </div>
              </div>
          </a>
          @endforeach
          <div class="dropdown-divider"></div>
          <h6 class="p-3 mb-0 text-center">See all notifications</h6>
      </div>
  </li>