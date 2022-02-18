<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
      <title>Rreth nesh - Fotoprinteri</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://unpkg.com/tailwindcss@1.2.0/dist/tailwind.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href={{ URL::asset('css/style-fp.css'); }} >
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css"
         integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
         <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
         <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    </head>

    <div class="w3-row">
      <div class="logo-place">
          <a  href="/">
            <img src="images/fotoprinteri_logo.png" class="logo">
          </a>
      </div>

      
    </div>

    <body>  
      <div class="w3-row">
        <div class="w3-quarter">
          <br>
            <div class="menu">
             <nav class="navbar">
               <ul class="navbar-nav list-group">
                  <li class="nav-item text-center list-group-item">
                      <a class="nav-link" href="/">Ballina</a>
                  </li>
                  <li class="nav-item text-center list-group-item">
                    <a class="nav-link" href="/foto">Dërgo fotografitë</a>
                  </li>
                  <li class="nav-item text-center list-group-item">
                      <a class="nav-link" href="llogaria">Llogaria</a>
                  </li>
                  <li class="nav-item text-center list-group-item">
                      <a class="nav-link" href="porosit">Porosit e mia</a>
                  </li>
                  <li class="nav-item text-center list-group-item">
                    <a class="nav-link" href="/rreth-nesh">Rreth nesh</a>
                </li>
               </ul>
            </nav>
           <br>
           <br>
           <br>
           <ul class="social text-center">
            <a  class="nav-link" href="#" style="color:white;">Privatësia dhe Kushtet e përdorimit</a>
           </ul>
           <br>
         </div>
        </div>

        <div class="w3-rest">
            <div class="container">
              <h5 style="margin-top: 50px;" class="text-center">Foto Printeri është platformë që ju mundëson printimin e fotografive lehtësisht nëpërmjet web faqes tonë.</h5>
                <br>
                <h6 style="margin-top: -10px;" class="text-center">Dimensionet standarde 10x15cm</h6>
            </div>
        </div>

        <div class="flex flex-col">
          <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
              <div class="overflow-hidden">
                <table class="min-w-full">
                  <thead class="bg-white border-b ">
                    <tr>
                      <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center border-2">
                        Sasia
                      </th>
                      <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center border-2">
                        CMIMI
                      </th>
                    </tr>
                  </thead>
                  <tbody>

                  <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900  text-center border-2">
                        1-4 fotografi
                      </td>
                      <td class="text-sm text-black-900 font-light px-6 py-4 whitespace-nowrap text-center border-2">
                        1 Euro për një foto
                      </td>
                    </tr>
                   <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-center border-2">
                        5-9 fotografi
                      </td>
                      <td class="text-sm text-black-900 font-light px-6 py-4 whitespace-nowrap text-center border-2">
                        0.60 cent për një foto
                      </td>
                    </tr>

                    <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-center border-2">
                        10-49 fotografi
                      </td>
                      <td class="text-sm text-black-900 font-light px-6 py-4 whitespace-nowrap text-center border-2">
                        0.50 cent për një foto
                      </td>
                    </tr>
                   <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-center border-2">
                        50-99 fotografi
                      </td>
                      <td class="text-sm text-black-900 font-light px-6 py-4 whitespace-nowrap text-center border-2">
                        0.20 cent për një foto
                      </td>
                    </tr>

                    <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-center border-4">
                        100+ fotografi
                      </td>
                      <td class="text-sm text-black-900 font-light px-6 py-4 whitespace-nowrap text-center border-4">
                        0.12 cent për një foto
                      </td>
                    </tr>

                  </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

      </div>
        <div class="contact-form-box" style="margin-top:50px">
          <form class="w-full max-w-lg">
            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                  EMRI
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-black-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Emri">
                {{-- <p class="text-red-500 text-xs italic">Ju lutemi plotësoni këtë fushë.</p> --}}
              </div>
              <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                  Mbiemri
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Mbiemri">
              </div>
            </div>  
            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                  Email adresa
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="email" type="email">
                {{-- <p class="text-gray-600 text-xs italic">Some tips - as long as needed</p> --}}
              </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                  Mesazhi
                </label>
                <textarea class=" no-resize appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 h-48 resize-none" id="message"></textarea>
                {{-- <p class="text-gray-600 text-xs italic">Re-size can be disabled by set by resize-none / resize-y / resize-x / resize</p> --}}
              </div>
            </div>
            <div class="md:flex md:items-center">
              <div class="md:w-1/3">
                <button class="shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
                  Dërgo
                </button>
              </div>
              <div class="md:w-2/3"></div>
            </div>
          </form>
      </div>

    </body>
</html>
