<section
    class="tabcontent mr-[1%] ml-[19%] my-space-0.3 w-v-w p-space-0.3 bg-green-op-2 rounded-xl"
    id="my-courses">
    <div class="courses__menu">

        @foreach($select as $item)
            <div class="course__item">
                <div class="item__image"></div>
                <div class="item__name">
                    <h1>{{$item->course_name}}</h1>
                </div>
            </div>
        @endforeach

    </div>
</section>
