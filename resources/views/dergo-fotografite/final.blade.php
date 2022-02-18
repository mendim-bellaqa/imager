<html>

  <head>
    <title>RUAJ TE DHENAT</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  </head>

  <div style="padding-top:20px; margin-top:-15px; left:20px;">
    <a href="/">
        <img style="width:200px; margin-top:10px;" src="{{ asset('images/fotoprinteri_logo.png') }}" class="logo">
    </a>
  </div>
<body>
    <div class="min-w-screen min-h-screen bg-gray-50 py-5">
        <div class="px-5">
            <div class="w-full bg-white border-t border-b border-gray-200 px-5 py-10 text-gray-800">
                <div class="w-full">
                    <div class="-mx-3 md:flex items-start">
                        <div class="px-3 md:w-7/12 lg:pr-10">
                        <form action="{{ route('ngarko-foto.infot') }}"  method="POST">
                            <div class="justify-items-center mb-6 pb-6 border-b border-gray-200">
                                <div class="-mx-2 flex items-end justify-items-center">
                                    <div class="flex-grow px-2 lg:max-w-xs">
                                        <label class="text-gray-600 font-semibold text-sm mb-2 ml-1">Kodi i zbritjes</label>
                                        <div>
                                            <input class="w-full px-3 py-2 border border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors" placeholder="xxxxxx" type="text"/>
                                        </div>
                                    </div>
                                    <div class="px-2">
                                        <button class="block w-full max-w-xs mx-auto border border-transparent bg-gray-400 hover:bg-gray-500 focus:bg-gray-500 text-white rounded-md px-5 py-2 font-semibold">APLIKO</button>
                                    </div>
                                </div>
                            </div>

                            <div  class="mb-6 pb-6 border-b border-gray-200 text-gray-800">
                                <div class="w-full flex mb-3 items-center">
                                    <div class="flex-grow">
                                        <span class="text-gray-600">Total foto</span>
                                    </div>
                                    <div class="pl-3">
                                        <span class="font-semibold">{{$totalPictures}}</span>
                                    </div>
                                </div>
                                <div class="w-full flex items-center">
                                    <div class="flex-grow">
                                        <span class="text-gray-600">Cmimi per foto</span>
                                    </div>
                                    <div class="pl-3">
                                        <span class="font-semibold">{{$pricePerPicture}}</span>
                                    </div>
                                </div>
                                <br>
                                <div class="w-full flex items-center">
                                <div class="flex-grow">
                                    <span class="text-gray-600">Posta</span>
                                </div>
                                <div class="pl-3">
                                    <span class="font-semibold">{{$posta}}</span>
                                </div>
                            </div>
                            </div>

                            <div class="mb-6 pb-6 border-b border-gray-200 md:border-none text-gray-800 text-xl">
                                <div class="w-full flex items-center">
                                    <div class="flex-grow">
                                        <span class="text-gray-600">Total</span>
                                    </div>
                                    <div class="pl-3">
                                        <span class="font-semibold text-gray-400 text-sm"></span> <span class="font-semibold">{{ $total }} EURO</span>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="px-3 md:w-5/12">
                                <div class="w-full mx-auto rounded-lg bg-white border border-gray-200 p-3 text-gray-800 font-light mb-6">
                                    <div class="w-full flex mb-3 items-center">
                                        <div class="w-32">
                                            <span class="text-gray-600 font-semibold">Te dhenat:</span>
                                        </div>
                                        <div class="flex-grow pl-3">
                                            <span>{{ Auth::user()->name }}</span>
                                        </div>
                                    </div>
                                    <div class="w-full flex items-center">
                                        <div class="w-32">
                                            <span class="text-gray-600 font-semibold">Email</span>
                                            <br>
                                        </div>
                                        <div class="flex-grow pl-3">
                                            <span>{{ Auth::user()->email }}</span>
                                            <br>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="w-full flex items-center">
                                        <div class="w-32">
                                            <span class="text-gray-600 font-semibold">Numri i telefonit</span>
                                        </div>
                                        <div class="flex-grow pl-3">
                                            <span>{{ Auth::user()->phone_number }}</span>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="w-full flex items-center">
                                    <div class="w-32">
                                        <span class="text-gray-600 font-semibold">Qyteti</span>
                                    </div>
                                    <div class="flex-grow pl-3">

                                        <span>{{ Auth::user()->city }}</span>
                                    </div>
                                </div>
                                <br>
                                <div class="w-full flex items-center">
                                    <div class="w-32">
                                        <span class="text-gray-600 font-semibold">Adressa</span>
                                    </div>
                                    <div class="flex-grow pl-3">

                                        <span>{{ Auth::user()->address }}</span>
                                    </div>
                                    </div>
                                    <br>
                                    <div class="w-full flex items-center">
                                        <div class="w-32">
                                            <span class="text-gray-600 font-semibold">Numri i porosise</span>
                                        </div>
                                        <div class="flex-grow pl-3">

                                            <span>{{$order->folder_name}}</span>
                                        </div>
                                        </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <br>
            <form method="post">
                <li class="block text-center max-w-xs mx-auto bg-indigo-500 hover:bg-indigo-200 focus:bg-indigo-700 text-white rounded-lg px-3 py-2 font-semibold">
                    <a class="nav-link" href="{{route('porosia.ruajtur')}}">KONFIRMO</a>
                    {{-- <a class="nav-link" method="post"  action="{{route('porosia.ruajtur', [$status])}}">KONFIRMO</a> --}}
                </li>
            </form>
        </div>
    </div>
</body>
    <script>
      $(document).ready(function(){
        $('.radio-group .radio').click(function(){
        $('.radio').addClass('gray');
        $(this).removeClass('gray');
        });

        $('.plus-minus .plus').click(function(){
        var count = $(this).parent().prev().text();
        $(this).parent().prev().html(Number(count) + 1);
        });

        $('.plus-minus .minus').click(function(){
        var count = $(this).parent().prev().text();
        $(this).parent().prev().html(Number(count) - 1);
        });
      });
    </script>

    <script>
        /*
        We want to preview images, so we need to register the Image Preview plugin
        */
        FilePond.registerPlugin(

        // encodes the file as base64 data
        FilePondPluginFileEncode,

        // validates the size of the file
        FilePondPluginFileValidateSize,

        // corrects mobile image orientation
        FilePondPluginImageExifOrientation,

        // previews dropped images
        FilePondPluginImagePreview
        );

        // Select the file input and use create() to turn it into a pond
        FilePond.create(
            document.querySelector('input')
        );
    </script>
</html>
