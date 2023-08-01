@extends('client.index')


@section('content')

    <section id="sec2">
        <div class="container second-container">
            <div class="profile  support-row">
                <h1>
                    پشتیبانی
                </h1>
                <p>

                    {{ setting('page.sup_title') }}

                </p>
                <form method="POST" action="{{route('submit_form')}}" style="width: 100%">
                    @csrf
                <div class="edit" style="margin: auto">
                    <div class="form-item">

                        <textarea type="text" placeholder="متن در خواست شما" name="messagetext"></textarea>

                    </div>

                    <button style="border: none" class="max-width withdraw change-submit" type="submit">
                        <img src="client/assets//icons/tick.svg">
                        ثبت درخواست


                    </button>
                </div>
                </form>

                <div class="line"></div>

                <div class="edit">

                    <div class=" chatroom_history">
                        <ul class="chatroom_history_list">
                            @foreach($messages as $message)

                                @if($message->is_admin == 0)
                            <li class="chatroom_history_list_item chatroom_history_list_left chatroom_history_list_item--green">
                                {{$message->message_text}}
                                <span>
                                    {{fa_number($message->shamsi_date)}}
                                </span>
                            </li>

                                @else
                            <li class="chatroom_history_list_item chatroom_history_list_right chatroom_history_list_item--grey">
                                {{$message->message_text}}
                                <span>
                                    {{fa_number($message->shamsi_date)}}
                                </span>
                            </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </section>



@endsection