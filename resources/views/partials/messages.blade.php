
@if (Session::has('flash_notification.message'))
    @if (Session::has('flash_notification.overlay'))
        @include('partials.modal', ['modalClass' => 'flash-modal', 'title' => Session::get('flash_notification.title'), 'body' => Session::get('flash_notification.message')])
    @else
        <div class="row dismissable">
            <div class="col offset-s1 s10 card-panel {{Session::get('flash_notification.level') }}">
                <div class="row">
                    <i class="col s1 small mdi-alert-{{Session::get('flash_notification.level')}}"></i>
                    <span class="col s10">{{Session::get('flash_notification.message')}}</span>
                    <i class="dismisser col s1 small mdi-content-clear"></i>
                </div>
            </div>
        </div>
    @endif
@elseif($errors->any())
    <div class="row dismissable">
        <div class="col offset-s1 s10 card-panel error">
            <div class="row">
                <i class="col s1 small mdi-alert-error"></i>
                <span class="col s10">{{$errors[0]}}</span>
                <i class="dismisser col s1 small mdi-content-clear"></i>
            </div>
        </div>
    </div>
@endif