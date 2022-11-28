<section class="w-v-w h-space-0.9 bg-green-op">
    <nav class="flex mx-space-1.0 justify-between">

        <div class="mx-space-0.5 my-space-0.1 text-brown rounded-xl text-2xl flex">
            <a href="/" class="text-brown text-2xl w-space-1.5">
                Woodside Academy
            </a>
        </div>

        <ul class="flex space-x-space-0.2 m-auto text-center w-fit">
            <li class="w-fit h-fit">
                <a href="" class="no-underline p-space-0.1 text-brown rounded-xl text-xl">Home</a>
            </li>
            <li class="w-fit h-fit">
                <a href="" class="no-underline p-space-0.1 text-brown rounded-xl text-xl">About</a>
            </li>
            <li class="w-fit h-fit">
                <a href="" class="no-underline p-space-0.1 text-brown rounded-xl text-xl">University Library</a>
            </li>
            <li class="w-fit h-fit">
                <a href="" class="no-underline p-space-0.1 text-brown rounded-xl text-xl">University Data-bank</a>
            </li>
            @if(session()->has('email'))
                <li class="w-fit h-fit">
                    @if(session('userRole')=='admin')
                    <a href="/admin" title="Administrator: {{session('userName')}}">
                        <i class="uil uil-user-square text-[40px]"></i>
                    </a>
                    @else
                        <a href="/" title="User: {{session('userName')}}">
                            <i class="uil uil-user-square text-[40px]"></i>
                        </a>
                    @endif
                </li>
                <li class="w-fit h-fit">
                    <a href="/logout" class="bg-green-op-1 text-brown p-space-0.1 rounded-xl text-xl"
                       id="signup">Logout </a>
                </li>
            @else
                <li class="w-fit h-fit">
                    <a href="/login" class="bg-green-op-1 text-brown p-space-0.1 rounded-xl text-xl">Login</a>
                </li>
                <li class="w-fit h-fit">
                    <div class="dropdown mt-[-10px]">
                        <button class="bg-green-op-1 text-brown p-space-0.1 rounded-xl text-xl">Register With Us
                        </button>
                        <div class="dropdown-content">
                            <a href="/applications/choice/students">Apply as a Student</a>
                            <a href="/applications/choice/lecturers">Apply as a Lecturer</a>
                            <a href="/applications/choice/staff">Apply as Staff</a>
                        </div>
                    </div>
                </li>
            @endif
        </ul>

    </nav>
</section>
@if($errors->any())
    <h3 class="m-auto p-2 text-center rounded-xl bg-red text-white w-fit my-[10px]"
        style="font-family: 'Outfit',sans-serif; font-size: 35px;" id="hideMe">
        {{$errors->first()}}
        <script>
            setTimeout(() => {
                const elem = document.getElementById("hideMe");
                elem.parentNode.removeChild(elem);
            }, 5000);
        </script>
    </h3>
@endif
