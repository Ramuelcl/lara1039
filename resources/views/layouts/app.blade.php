<!DOCTYPE html>
<!-- resources/views/layouts/app.blade.php -->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

@include('includes.head') <!-- Incluir el head -->

<body class="bg-gray-200 dark:bg-gray-800">
    @include('includes.header')

    <!--Container for content-->
    <div class="shadow-lg mx-auto bg-gray-200 dark:bg-gray-800 md:mt-18">
        @include('includes.messages')
        {{ $slot ?? null }}
    </div>
</body>

</html>
