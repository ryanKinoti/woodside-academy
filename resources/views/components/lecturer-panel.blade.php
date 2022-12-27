<div class="sidebar-menu">
    <ul>
        <li>
            <a>
                <span>Lecturer: {{session('firstName')}} {{session('lastName')}}</span>
            </a>
        </li>

        <li>
            <a class="p-space-0.1 tablinks" id="defaultOpen" onclick="switchcommon(event, 'main-1')"
               style="cursor: pointer">
                My Dashboard
            </a>
        </li>

        <li>
            <a class="p-space-0.1 tablinks" onclick="switchcommon(event, 'main-2')" style="cursor: pointer">
                My Courses
            </a>
        </li>
        <li>
            <a class="p-space-0.1 tablinks" onclick="switchcommon(event, 'main-3')" style="cursor: pointer">
                Coursework Material
            </a>
        </li>
        <li>
            <a class="p-space-0.1 tablinks" onclick="switchcommon(event, 'main-4')" style="cursor: pointer">
                Coursework Marks
            </a>
        </li>
        <li>
            <a class="p-space-0.1 tablinks" onclick="switchcommon(event, 'main-5')" style="cursor: pointer">
                Student Attendance
            </a>
        </li>
        <li>
            <a class="p-space-0.1 tablinks" onclick="switchcommon(event, 'main-last')" style="cursor: pointer">
                Settings
            </a>
        </li>
        <li>
            <a href="/logout">
                Logout
            </a>
        </li>
    </ul>
</div>
