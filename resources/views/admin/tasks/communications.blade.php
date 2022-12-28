<section class="tabcontent mr-[1%] ml-[19%] my-space-0.3 w-v-w p-space-0.3 bg-green-op-2 rounded-xl" id="main-3-1">

    <div class="title__card flex">
        <h1 class="mx-space-0.2 p-space-0.2 text-[20px] text-brown bg-green-op-1 rounded-xl">
            FACULTY MESSAGING
        </h1>

        <a class="mx-space-0.2 p-space-0.1 bg-green-op-1 rounded-full tablinks" title="Staff Messaging"
           onclick="switchcommon(event, 'main-3-2')"
           style="cursor: pointer">
            <i class="uil uil-arrow-right text-brown text-[30px]"></i>
        </a>
    </div>

    <div class="message__container flex">
        <div class="message__navigation">

            <div class="message__search">
                <div class="search__container">
                    <input type="search" id="search" class="form-control" autocomplete="off"
                           placeholder="Search...">
                    <button type="submit"><i class="uil uil-times"></i></button>
                </div>
                <div class="search__suggestion"></div>
            </div>

            <div class="message__listing">
                <div class="listing__title">
                    <h3>Available Faculties</h3>
                </div>

                <div class="listing__container">
                    <div class="listing__content">
                        @foreach($faculties as $faculty)
                            <a>{{$faculty->faculty_name}}</a>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>

        <div class="message__zone"></div>
    </div>

</section>
