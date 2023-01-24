<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>


    @livewireStyles
</head>

<body>
    <div class="h-screen w-screen bg-gray-300">
        <div class="container h-screen mx-auto max-w-5xl flex justify-center items-center p-2 md:p-0">
            <div class="border border-gray-300 p-6 grid grid-cols-1 gap-6 bg-white shadow-lg rounded-lg">
              
                <!--customer form component-->
                <livewire:customer-form /> 

                <!-- customer table component -->
                <livewire:customers-table /> 
               
            </div>

        </div>

    </div>

    @livewireScripts
</body>

</html>
