<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>MIUPAA</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <style>
        @page {
            margin: 0cm;
        }
        @media print {
            .pagebreak { page-break-before: always; }
        }
    </style>
</head>
<body class="bg-gray-200 print:bg-orange-200 leading-tight">
    <main>
        <!--Flash Message Start-->
        @if (Session::has('message'))
            <div id="alert" class="container mt-3">
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ Session::get('message') }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg id="closeAlert" class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                    </span>
                </div>
            </div>
        @endif
        <!--Flash Message End-->
        @yield('content')
    </main>
    <footer class="pt-4 pb-8">
        <p class="text-sm text-center text-gray-600">MIU Pharmacy Alumni Association © {{date('Y')}}</p>
        <p class="print:hidden text-sm text-center text-gray-600">Developed with ❤ by <a href="https://faysal.me">Faysal Ahamed</a></p>
    </footer>
    
    <script src="{{ mix('js/app.js') }}" defer></script>

    <script>

        element = document.querySelector('#closeAlert');

        if(element){

            element.addEventListener("click", function(){

                document.querySelector('#alert').remove();

            });

        }
        
    </script>
    @yield('javascript')
</body>
</html>
