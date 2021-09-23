{{--TODO Is this the best way?--}}

@push('fonts')
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
@endpush

@push('styles')
    @include('templates.javascript_injection')
    <link rel="stylesheet" href="{{mix('css/ui-kit.css')}}" type="text/css">
@endpush

@push('scripts')
<!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-154125048-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-154125048-1');
    </script>
@endpush

@prepend('scripts')
    <script src="{{mix('js/app.js')}}"></script>
@endprepend

@push('meta-tags')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

@endpush
