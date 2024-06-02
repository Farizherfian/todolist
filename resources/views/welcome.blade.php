<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>TO-DO LIST</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
       
       <!-- Tailwind -->
        <script src="https://cdn.tailwindcss.com"></script>

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.couldflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="bg-gray-200 p-4">

        <div class="lg:w-2/4 mx-auto py-8 px-6 bg-white rounded-xl">

            <h1 class="font-bold text-5xl text-center mb-8">TO-DO LIST</h1>

            <div class="mb-6">
                <form class="flex flex-col space-y-4" method="post" action="/">
                    @csrf
                    <input type="text" name="judul" placeholder="The todo title" class="py-3 px-4 bg-gray-100 rounded-xl">

                    <textarea name="deskripsi" placeholder="The todo description" class="py-3 px-4 bg-gray-100 rounded-xl"></textarea>

                    <button class="w-28 py-4 px-8 bg-green-500 text-white rounded-xl">Add</button>
                </form>
            </div>

            
            <hr>
            <div class="nt-2">
                @foreach($todo as $t)
                <div 
                    @class([
                        'py-4 flex item-center border-b border-gray-300 px-3',
                        $t->selesai ? 'bg-green-200' : ''
                        ])
                        
                >
                    <div class="flex-1 pr-8">
                        <h3 class="text-lg font-semibold">{{$t -> judul}}</h3>
                        <p class="text-gery-500">{{$t -> deskripsi}}</p>
                    </div>

                    <form method="post" action="/{{ $t->id }}">
                        @csrf
                        @method('PATCH')
                        <div class="flex space-x-3">
                            <button class="py-2 px-2 bg-green-500 text-white rounded-xl">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                </svg>
                            </button>&nbsp;
                        </div>
                      </form>
                    <form method="post" action="/{{ $t->id }}">
                        @csrf
                        @method('DELETE')
                        <div class="flex space-x-3">
                            <button class="py-2 px-2 bg-red-500 text-white rounded-xl">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>      
                            </button>
                        </div>
                    </form>
                </div>
                 @endforeach
            </div>
            
        </div>

    </body>
</html>
