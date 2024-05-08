<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li>
                <a class="active-menu waves-effect waves-dark font-weight-bolder" href="{{route('admin.index')}}" style="font-size: larger; background-color: primary;"><i class="fas fa-chart-line"></i> Dashboard</a>
            </li>
            <li>
                <a href="{{route('category.index')}}" class="waves-effect waves-dark" style="font-size: larger;"><i class="fas fa-folder-open"></i> Category Posting</a>
            </li>
            <li>
                <a href="{{route('article.index')}}" class="waves-effect waves-dark" style="font-size: larger;"><i class="fas fa-file-alt"></i> Article Posting</a>
            </li>
            <li>
                <a href="{{route('file.index')}}" class="waves-effect waves-dark" style="font-size: larger;"><i class="fas fa-file-archive"></i> File Management</a>
            </li>
            <li>
                <a href="{{route('knowledgeBase.index')}}" class="waves-effect waves-dark" style="font-size: larger;"><i class="fas fa-question-circle"></i> Question and Answer</a>
            </li>
            <li>
                <a href="{{route('chat.chat')}}" class="waves-effect waves-dark" style="font-size: larger;"><i class="fas fa-comments"></i> Chat Room</a>
            </li>
            <li>
                <a href="{{route('user.index')}}" class="waves-effect waves-dark" style="font-size: larger;"><i class="fas fa-user"></i> User Permission</a>
            </li>
            <li>
                <a href="{{route('roles.index')}}" class="waves-effect waves-dark" style="font-size: larger;"><i class="fas fa-user-lock"></i> Role Permission</a>
            </li>
            <li>
                <a href="{{route('permissions.index')}}" class="waves-effect waves-dark" style="font-size: larger;"><i class="fas fa-lock"></i> Permission</a>
            </li>
            <li>
                <a href="{{ route('meeting.index')}}" style="font-size: larger;"><i class="fas fa-calendar-alt"></i> View Meeting</a>
            </li>
            <li>
                <a href="{{ route('questions.index')}}" style="font-size: larger;"><i class="fas fa-calendar-alt"></i> Ask Question</a>
            </li>
            <li>
                <a href="table.html" class="waves-effect waves-dark" style="font-size: larger;"><i class="fas fa-cog"></i> Profile Setting</a>
            </li>
            <li>
                <a class="waves-effect waves-dark" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="font-size: larger;">
                    <i class="fas fa-sign-out-alt"></i>
                    {{ __('Log Out') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</nav>
