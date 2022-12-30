{{--
    administrator sections:
    1. main-2 - choose which applications to access
    2. settings - access to the settings section
    3. main-3 - choose to which category of people are you sending communication/messages to
    4. main-4 - choose which course action to carry out
    --}}
{{--main-2--}}
<section
    class="tabcontent mr-[1%] ml-[19%] my-space-0.3 w-v-w p-space-0.3 bg-green-op-2 rounded-xl"
    id="main-2">
    <div class="secondary__navigation__container">

        <ul class="secondary__navigation">
            <li class="list__item">
                <a class="p-space-0.1 tablinks" onclick="switchcommon(event, 'main-2-1')"
                   style="cursor: pointer">
                    Staff Applications
                </a>
            </li>
            <li class="list__item">
                <a class="p-space-0.1 tablinks" onclick="switchcommon(event, 'main-2-2')"
                   style="cursor: pointer">
                    Lecturer Applications
                </a>
            </li>
            <li class="list__item">
                <a class="p-space-0.1 tablinks" onclick="switchcommon(event, 'main-2-3')"
                   style="cursor: pointer">
                    Student Applications
                </a>
            </li>
        </ul>

    </div>
</section>

{{--main-3--}}
<section class="tabcontent mr-[1%] ml-[19%] my-space-0.3 w-v-w p-space-0.3 bg-green-op-2 rounded-xl" id="main-3">
    <div class="secondary__navigation__container">

        <ul class="secondary__navigation">
            <li class="list__item">
                <a class="p-space-0.1 tablinks" onclick="switchcommon(event, 'main-3-1')"
                   style="cursor: pointer">
                    Message a Faculty
                </a>
            </li>
            <li class="list__item">
                <a class="p-space-0.1 tablinks" onclick="switchcommon(event, 'main-3-2')"
                   style="cursor: pointer">
                    Message a Course
                </a>
            </li>
            <li class="list__item">
                <a class="p-space-0.1 tablinks" onclick="switchcommon(event, 'main-3-3')"
                   style="cursor: pointer">
                    Message all Staff
                </a>
            </li>
            <li class="list__item">
                <a class="p-space-0.1 tablinks" onclick="switchcommon(event, 'main-3-4')"
                   style="cursor: pointer">
                    Message all Lecturers
                </a>
            </li>
            <li class="list__item">
                <a class="p-space-0.1 tablinks" onclick="switchcommon(event, 'main-3-5')"
                   style="cursor: pointer">
                    Message all Students
                </a>
            </li>
        </ul>

    </div>
</section>

{{--main-4--}}
<section
    class="tabcontent mr-[1%] ml-[19%] my-space-0.3 w-v-w p-space-0.3 bg-green-op-2 rounded-xl"
    id="main-4">
    <div class="secondary__navigation__container">

        <ul class="secondary__navigation">
            <li class="list__item">
                <a class="p-space-0.1 tablinks" onclick="switchcommon(event, 'main-4-1')"
                   style="cursor: pointer">
                    Faculty Settings
                </a>
            </li>
            <li class="list__item">
                <a class="p-space-0.1 tablinks" onclick="switchcommon(event, 'main-4-2')"
                   style="cursor: pointer">
                    Course Settings
                </a>
            </li>
            <li class="list__item">
                <a class="p-space-0.1 tablinks" onclick="switchcommon(event, 'main-4-2')"
                   style="cursor: pointer">
                    Unit Settings
                </a>
            </li>
        </ul>

    </div>
</section>

{{--common settings--}}
<section
    class="tabcontent mr-[1%] ml-[19%] my-space-0.3 w-v-w p-space-0.3 bg-green-op-2 rounded-xl"
    id="settings">
    <div class="secondary__navigation__container">

        <ul class="secondary__navigation">
            <li class="list__item">
                <a class="p-space-0.1 tablinks" onclick="switchcommon(event, 'profile-picture')"
                   style="cursor: pointer">
                    Add/Edit Profile Picture
                </a>
            </li>
        </ul>

    </div>
</section>
