<!DOCTYPE html>
<!-- resources/views/layouts/app.blade.php -->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="2222">

@include('includes.head') <!-- Incluir el head -->

<body class="bg-gray-200 dark:bg-gray-800">
    @include('includes.header')

    @include('includes.messages')

    <!--Container for content-->
    <div class="container shadow-lg mx-auto bg-white mt-24 md:mt-18">
        {{ $slot ?? null }}
    </div>
</body>

</html>
