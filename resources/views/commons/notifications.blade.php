@php
    use Illuminate\Support\Facades\DB;
@endphp
{{--STUDENT NOTIFICATIONS--}}
<section
    class="tabcontent mr-[1%] ml-[19%] my-space-0.3 w-v-w p-space-0.3 bg-green-op-2 rounded-xl"
    id="student-notifications">
    @foreach($select as $item)
        <div class="message__history my-space-0.3 p-space-0.2">
            <div class="history__title">
                <h1>
                    Recent Messages to Students of: {{$item->course_name}} Course
                </h1>
            </div>
            <div class="history__content" style="max-height: 350px;">
                @foreach($messages->where('to_course_id', $item->id)->where('bulk_send','yes')
                                    ->where('intended_user_role','student') as $item_2)
                    @php
                        $firstName = DB::table('users')
                        ->where('id',$item_2->from_user_id)->get('firstName')->first()->firstName;
                        $lastName = DB::table('users')
                        ->where('id',$item_2->from_user_id)->get('lastName')->first()->lastName;
                    @endphp
                    <div class="content__container">
                        <div class="history__from">
                            <h2>{{$firstName}} {{$lastName}} :</h2>
                        </div>
                        <div class="history__message">
                            <div class="message__title">{{$item_2->title}}:</div>
                            <div class="message__content">{{$item_2->message_content}}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
</section>

{{--LECTURER NOTIFICATIONS--}}
<section
    class="tabcontent mr-[1%] ml-[19%] my-space-0.3 w-v-w p-space-0.3 bg-green-op-2 rounded-xl"
    id="lec-notifications">
    @foreach($select as $item)
        <div class="message__history my-space-0.3 p-space-0.2">
            <div class="history__title">
                <h1>
                    Recent Messages to Lecturers of: {{$item->course_name}} Course
                </h1>
            </div>
            <div class="history__content" style="max-height: 350px;">
                @foreach($messages->where('to_course_id', $item->id)->where('bulk_send','yes')
                     ->where('intended_user_role','lecturer') as $item_2)
                    @php
                        $firstName = DB::table('users')
                        ->where('id',$item_2->from_user_id)->get('firstName')->first()->firstName;
                        $lastName = DB::table('users')
                        ->where('id',$item_2->from_user_id)->get('lastName')->first()->lastName;
                    @endphp
                    <div class="content__container">
                        <div class="history__from">
                            <h2>{{$firstName}} {{$lastName}} :</h2>
                        </div>
                        <div class="history__message">
                            <div class="message__title">{{$item_2->title}}:</div>
                            <div class="message__content">{{$item_2->message_content}}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
</section>

{{--STAFF NOTIFICATIONS--}}
<section
    class="tabcontent mr-[1%] ml-[19%] my-space-0.3 w-v-w p-space-0.3 bg-green-op-2 rounded-xl"
    id="staff-notification">
    @foreach($select as $item)
        <div class="message__history my-space-0.3 p-space-0.2">
            <div class="history__title">
                <h1>
                    Recent Messages to Staff of: {{$item->department_name}} department
                </h1>
            </div>
            <div class="history__content" style="max-height: 350px;">
                @foreach($messages->where('to_department_id', $item->id)->where('bulk_send','yes')
                     ->where('intended_user_role','staff') as $item_2)
                    @php
                        $firstName = DB::table('users')
                        ->where('id',$item_2->from_user_id)->get('firstName')->first()->firstName;
                        $lastName = DB::table('users')
                        ->where('id',$item_2->from_user_id)->get('lastName')->first()->lastName;
                    @endphp
                    <div class="content__container">
                        <div class="history__from">
                            <h2>{{$firstName}} {{$lastName}} :</h2>
                        </div>
                        <div class="history__message">
                            <div class="message__title">{{$item_2->title}}:</div>
                            <div class="message__content">{{$item_2->message_content}}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
</section>
