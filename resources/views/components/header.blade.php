<section class="w-v-w h-space-0.9 bg-green-op">
    <nav class="flex mx-space-1.0 justify-between">

        <div class="mx-space-0.5 my-space-0.1 text-brown rounded-xl text-2xl flex">
            <a href="/" class="text-brown text-2xl w-space-1.5">
                Woodside Academy
            </a>
        </div>

        <ul class="flex space-x-space-0.5 m-auto text-center">
            <li>
                <a href="" class="no-underline p-space-0.1 text-brown rounded-xl text-xl">Home</a>
            </li>
            <li>
                <a href="" class="no-underline p-space-0.1 text-brown rounded-xl text-xl">About</a>
            </li>
            <li>
                <a href="" class="no-underline p-space-0.1 text-brown rounded-xl text-xl">University Library</a>
            </li>
            <li>
                <a href="" class="no-underline p-space-0.1 text-brown rounded-xl text-xl">University Data-bank</a>
            </li>
            <li>
                <a href="/login" class="bg-green-op-1 text-brown p-space-0.1 rounded-xl text-xl">Login</a>
            </li>
            <li>
                <div class="dropdown mt-[-10px]">
                    <button class="bg-green-op-1 text-brown p-space-0.1 rounded-xl text-xl">Register With Us</button>
                    <div class="dropdown-content">
                        <a href="/applications/choice/students">Apply as a Student</a>
                        <a href="/applications/choice/lecturers">Apply as a Lecturer</a>
                        <a href="/applications/choice/staff">Apply as Staff</a>
                    </div>
                </div>
            </li>
        </ul>

    </nav>
</section>
@if($errors->any())
    <h3 class="m-auto p-2 text-center rounded-xl bg-red text-white w-fit" style="font-family: 'Outfit',sans-serif; font-size: 35px;">
        {{$errors->first()}}
    </h3>
@endif
