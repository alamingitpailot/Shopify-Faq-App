<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title', 'Store FAQ')</title>
    <!-- plugins:css -->
    @include('partials.styles')
    <!-- endinject -->
    <link rel="shortcut icon" href="./images/favicon.png" />
</head>

<body>
    <div class="">
        <div class="bg-black-600">
            <div class="max-w-screen-xl mx-auto px-4 py-3 items-center justify-between text-white sm:flex md:px-8">
                <div class="flex gap-x-4">
                    <p class="py-2 font-medium text-black">
                        Faq app shopify
                    </p>
                </div>

            </div>
        </div>
        @yield('contents')
    </div>
    @include('partials.scripts')
</body>

</html>
