<div class="w-[16%] h-full bg-green-op fixed overflow-x-hidden">

    <div class="flex flex-col justify-between h-[90%]">

        <div class="p-space-0.2">
            <a href="/" class="text-brown rounded-xl text-xl bg-green-op-1 p-space-0.1">
                Administrator: {{session('userName')}}
            </a>
        </div>

        <hr class="text-[black]">

        <a class="p-space-0.1 tablinks" id="defaultOpen" onclick="switchcommon(event, 'main-1')" style="cursor: pointer">
            <i class="uil uil-dashboard text-[30px]"></i>
            <span class="text-brown rounded-xl text-xl bg-green-op-1 p-space-0.1">My Dashboard</span>
        </a>

        <a class="p-space-0.1 tablinks" onclick="switchcommon(event, 'main-2')" style="cursor: pointer">
            <i class="uil uil-users-alt text-[30px]"></i>
            <span class="text-brown rounded-xl text-xl bg-green-op-1 p-space-0.1">Made Applications</span>
        </a>


        <a href="/logout" class="p-space-0.1">
            <i class="uil uil-signout text-[30px]"></i>
            <span class="text-brown rounded-xl text-xl bg-green-op-1 p-space-0.1">Logout</span>
        </a>
    </div>

</div>
