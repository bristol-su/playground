<div id="header-vue-root">

    @auth
        <p-topbar
            logo="{{ asset('images/logo.png') }}"
            home-route="{{route('playground')}}"
            logout-route="{{route('logout')}}"
            control-route="{{route('control')}}"
            :can-access-control="true"
            :can-access-settings="true"
            site-name="{{config('app.name', 'Committee Portal')}}"
            default-avatar-src="{{asset('images/smallLogo.jpeg')}}"
            user-name="{{app(\BristolSU\Support\Authentication\Contracts\Authentication::class)->getUser()->data()->preferredName() ?? (app(\BristolSU\Support\Authentication\Contracts\Authentication::class)->getUser()->data()->firstName() . ' ' . app(\BristolSU\Support\Authentication\Contracts\Authentication::class)->getUser()->data()->lastName())}}"
        >
        </p-topbar>
    @endauth
</div>


<div id="header-playground" class="float-right">
    @if(in_array('p', request()->segments()) || in_array('a', request()->segments()))
        <playground></playground>
    @endif
</div>
