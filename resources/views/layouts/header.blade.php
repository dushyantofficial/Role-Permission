
<header class="app-header {{user_theme_get()}}">
    <a class="app-header__logo {{user_theme_get()}}" href="{{route('home')}}" style="color: white">Role Permission </a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar"
                                      aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <style>
          @media (max-width: 575.98px) {
              .goog-te-combo, .VIpgJd-ZVi9od-ORHb *, .VIpgJd-ZVi9od-SmfZ *, .VIpgJd-ZVi9od-xl07Ob *, .VIpgJd-ZVi9od-vH1Gmf *, .VIpgJd-ZVi9od-l9xktf * {
                  font-size: 7pt !important;
              }
              .app-header__logo {
                  font-size: 8px !important;
              }
          }
      </style>
      <form id="backup_form" action="{{route('backup-run')}}" method="GET">
          @csrf
          <button type="button" style="margin: 9px !important;" class="btn btn-sm btn-shadow btn-outline-warning btn-hover-shine"
                  id="backupBtn">
              <li class="fa fa-hdd-o"></li>
          </button>
          <div id="lazyLoader" style="display: none;color: red">Loading...</div>
          <div id="downloadTimer" style="display: none">0 seconds</div>
      </form>
    <button id="toggleThemeBtn" style="margin: 9px !important;" class="btn btn-sm btn-shadow btn-outline-light btn-hover-shine toggleThemeBtn">
        @if(user_background_get()->theme_color == 'light')
        <i class="fa fa-moon-o"></i>
        @else
        <i class="fa fa-sun-o"></i>
        @endif
    </button>
    &nbsp;
      <ul class="app-nav">
          <li class="app-search">
              <a href="{{url('clear_cache')}}" class="btn btn-sm btn-shadow btn-outline-warning btn-hover-shine">Cache
                  Clear</a>
              </a>&nbsp;
          </li>
          @include('Admin.languages')&nbsp;
          <!--Notification Menu-->
          <!-- User Menu-->
          <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown"
                                  aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
              <ul class="dropdown-menu settings-menu dropdown-menu-right">
                  <li><a class="dropdown-item" href="{{route('profile')}}"><i class="fa fa-user fa-lg"></i> Profile</a>
                  </li>
                  <li><a class="dropdown-item" href="{{route('profile')}}?document=theme_color"><i
                              class="fa fa-copyright fa-lg"></i>Theme Color</a></li>
                  <li><a class="dropdown-item" href="{{route('profile')}}?document=password"><i
                              class="fa fa-lg  fa-lock"></i>Change Password</a></li>
                  <li>
                      <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                              class="fa fa-sign-out fa-lg"></i> Logout</a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form>
                  </li>
              </ul>
          </li>
      </ul>
  </header>

  {{--  <!-- Button trigger modal -->--}}
  {{--  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">--}}
  {{--      Launch demo modal--}}
  {{--  </button>--}}

  <!-- Modal -->
  <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
       aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <div class="calendar">
                      <div class="calendar-top">
                          <button class="icons" id="prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                          <div class="top">
                              <h3 id="monthYear"></h3>
                          </div>
                          <button class="icons" id="next"><i class="fa fa-chevron-right" aria-hidden="true"></i>
                          </button>
                      </div>
                      <div class="calendar-bottom">
                          <div class="days-of-week">
                              <p>SUN</p>
                              <p>MON</p>
                              <p>TUE</p>
                              <p>WED</p>
                              <p>THUR</p>
                              <p>FRI</p>
                              <p>SAT</p>
                          </div>
                          <div class="days"></div>
                      </div>
                  </div>


              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  {{--                  <a href="{{route('calendar')}}" type="button" class="btn btn-primary">ToDay Date</a>&nbsp;&nbsp;--}}
              </div>
          </div>
      </div>
  </div>
  @push('page_scripts')
      {{--Backup Download With Ajax--}}
      <script>
          $(document).ready(function () {
              $('#backupBtn').click(function (e) {
                  e.preventDefault();
                  var formData = new FormData($('#add_form')[0]);

                  Swal.fire({
                      title: 'Are you sure?',
                      text: 'Do not refresh the page for 35 seconds!',
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#d33',
                      cancelButtonColor: '#3085d6',
                      confirmButtonText: 'Yes, backup download it!'
                  }).then((result) => {
                      if (result.isConfirmed) {
                          // Disable the button to prevent multiple clicks
                          $('#submitBtn').prop('disabled', true);

                          // Show the lazy loader
                          $('#lazyLoader').show();
                          $('#downloadTimer').show();

                          // Start the download timer
                          var startTime = Date.now();
                          var downloadTimerElement = $('#downloadTimer');

                          var downloadInterval = setInterval(function () {
                              var currentTime = Date.now();
                              var elapsedTime = (currentTime - startTime) / 1000; // Convert to seconds
                              downloadTimerElement.text(elapsedTime.toFixed(1) + ' seconds');
                          }, 100); // Update every 100 milliseconds
                          $.ajax({
                              type: 'GET',
                              url: $('#backup_form').attr('action'),
                              data: formData,
                              processData: false,
                              contentType: false,
                              success: function (data) {
                                  // Close the lazy loader after a successful AJAX response
                                  $('#lazyLoader').hide();
                                  $('#downloadTimer').hide();
                                  Swal.fire({
                                      icon: 'success',
                                      title: 'Success!',
                                      text: 'Backup Download completed in ' + downloadTimerElement.text(),
                                  });
                              },
                              error: function (xhr) {
                                  // Close the lazy loader on error
                                  $('#lazyLoader').hide();
                                  $('#downloadTimer').hide();
                                  var errors = xhr.responseJSON.errors;
                                  var errorMessages = [];

                                  for (var field in errors) {
                                      errorMessages.push(errors[field][0]);
                                  }

                                  Swal.fire({
                                      icon: 'error',
                                      title: 'Error!',
                                      html: errorMessages.join('<br>') + '<br>',
                                  });
                              },
                              complete: function () {
                                  // Enable the button after the request is complete (success or error)
                                  $('#submitBtn').prop('disabled', false);

                                  // Stop the download timer
                                  clearInterval(downloadInterval);
                              }
                          });
                      }
                  });
              });
          });
      </script>
  @endpush
