<div id="header-vue-root">

    @auth
        <p-topbar
            home-route="{{route('playground')}}"
            logout-route="{{route('logout')}}"
            control-route="{{route('control')}}"
            :can-access-control="true"
            site-name="{{config('app.name', 'Playground')}}"
        >
        </p-topbar>
    @else
    @endauth

</div>


<div id="header-playground" class="float-right">
    @if(in_array('p', request()->segments()) || in_array('a', request()->segments()))
        <playground></playground>
    @endif
</div>
