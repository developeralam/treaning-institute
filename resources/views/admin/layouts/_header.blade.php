
<div id="navbar" class="navbar navbar-default navbar-fixed-top ace-save-state">
    <div class="navbar-container ace-save-state" id="navbar-container">
        <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
            <span class="sr-only">Toggle sidebar</span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>
        </button>

{{--        <div class="navbar-header pull-left">--}}
{{--            <a href="index.html" class="navbar-brand">--}}
{{--                <small>--}}
{{--                    <i class="fa fa-flag"></i>--}}
{{--                    MM IT Agent Software--}}
{{--                </small>--}}
{{--            </a>--}}
{{--        </div>--}}

        <div class="navbar-header pull-left">
            {{--  href="https://www.mmitsoft.com/"  --}}
            <a class="navbar-brand" style="padding-left: 0px;">
                <small style="font-size: 60%;font-weight: bold;">
                    MM IT AGENT SOFTWARE
                </small>&nbsp; &nbsp;
                <?= $siteconf->name ?? 'null' ?>
            </a>
        </div>

        <div class="navbar-buttons navbar-header pull-right" role="navigation">
            <ul class="nav ace-nav">
                <li class="light-blue dropdown-modal">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                       {{--  <img class="nav-user-photo" src="{{ asset('admin/assets/images/avatars/user.jpg') }}" alt="Jason's Photo" /> --}}
                        <span class="user-info">
									<small>Welcome,</small>
									
                                    {{ Auth::user()->name??null }}
                                    
								</span>

                        <i class="ace-icon fa fa-caret-down"></i>
                    </a>

                    <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                        {{-- <li>
                            <a href="#">
                                <i class="ace-icon fa fa-cog"></i>
                                Settings
                            </a>
                        </li> --}}

                        <li>
                            <a href="profile-show">
                                <i class="ace-icon fa fa-user"></i>
                                Profile
                            </a>
                        </li>

                        <li class="divider"></li>

                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="ace-icon fa fa-power-off"></i>
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div><!-- /.navbar-container -->
</div>
