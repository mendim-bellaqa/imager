<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.9.2/tailwind.min.css"/>
    <title>Document</title>
</head>
<body>

    <div class="max-w-2xl mx-auto">
        <a class="top-3 text-center align-center"  href="/">

            <img class="top-3 text-center align-center" style="width:200px; padding-top:50px; align-imtem:center; text-align:center" src="{{asset('images/fotoprinteri_logo.png')}}">
        </a>
    <br><br>
    <div class="flex flex-col">
        <li class="nav-item text-center list-group-item">
            <a class="nav-link" href="{{route('dashboard')}}">BALLINA</a>
        </li>
    <br>

    <br>

    <div class="overflow-x-auto shadow-md sm:rounded-lg">
        <div class="inline-block min-w-full align-middle">
            <div class="overflow-hidden ">
                <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-700">
                    <thead class="bg-gray-300  dark:bg-gray-700">
                        <tr>
                            <div class="container ">
                                <li class="nav-item text-center list-group-item">
                                    <a class="nav-link" href="{{route('voucher.create')}}">GJENERO</a>
                                  </li>
                            </div>

                            <br><br>

                            <th scope="col" class="text-center py-3 px-6 text-xs font-medium tracking-wider text-gray-700 uppercase dark:text-gray-400">
                               KUPON CODE
                            </th>

                            <th scope="col" class="text-center py-3 px-6 text-xs font-medium tracking-wider  text-gray-700 uppercase dark:text-gray-400">
                                CMIMI
                            </th>

                            <th scope="col" class="text-center py-3 px-6 text-xs font-medium tracking-wider  text-gray-700 uppercase dark:text-gray-400">
                                ACTION
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                    @foreach ($vouchers as $voucher)
                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                            <td class="text-center py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$voucher->code}}</td>
                            <td class="text-center py-4 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">{{$voucher->value}}</td>
                            <td class="text-center py-4 px-6 text-sm font-medium  whitespace-nowrap">
                                <a href="#" class="text-blue-600 dark:text-blue-500 hover:underline">EDITO</a>
                                <a href="#" class="text-blue-600 dark:text-blue-500 hover:underline">FSHIJ</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <br>
        <br>
    </div>
</div>
</div>
</body>
</html>

