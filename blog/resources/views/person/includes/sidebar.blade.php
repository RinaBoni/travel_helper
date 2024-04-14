<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">


    <!-- Sidebar -->
    <div class="sidebar">
        <ul class="pt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->


            <li class="nav-item">
                <a href="{{ route('person.main.index') }}" class="nav-link">
                <i class="nav-icon fa-regular fa-user"></i>
                    <p>
                    Личный кабинет
                    </p>
                </a>
            </li>

            <li class="nav-item">
            <a href="{{ route('person.personal.index') }}" class="nav-link">
                <i class="nav-icon fa-solid fa-user-gear"></i>
                <p>
                    Личные данные
                </p>
            </a>
        </li>

            <li class="nav-item">
                <a href="{{ route('person.liked.index') }}" class="nav-link">
                <i class="nav-icon fa-regular fa-heart"></i>
                    <p>Избранное</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('person.comment.index') }}" class="nav-link">
                <i class="nav-icon fa-regular fa-comment"></i>
                    <p>Комментарии</p>
                </a>
            </li>

            <li class="nav-item">
            <a href="{{ route('post.index') }}" class="nav-link">
                <i class="nav-icon fa-solid fa-house"></i>
                <p>Вернуться на главную</p>
            </a>
        </li>


        </ul>
    </div>
    <!-- /.sidebar -->
</aside>
