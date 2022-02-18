<html lang="en">
<head>
    <title>Dërgo fotografitë - Fotoprinteri</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css"
     integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
     <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
     <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ URL::asset('css/style-fp.css') }}">
</head>

<body style="background-image: url('images/background-01.jpg');">
    <div class="logo-place">
      <a href="/">
          <img src="{{ asset('images/fotoprinteri_logo.png') }}" class="logo">
      </a>
    </div>


    <div class="container">
        <div class="media-links">
            <button  type="button" class="btn btn- whatsapp-links font-semibold py-2 px-4 border border-black-400 rounded shadow">
                <a style="color:aliceblue;" href="https://api.whatsapp.com/send?phone=+38345777722%E2%80%AC&text=Fotografi&source=&data=">
                Whatsapp
                </a>
            </button>
            <button type="button" class="btn btn- viber-links px-px">
                Viber
            </button>
            <button  type="button" class="btn btn- messenger-links font-semibold py-2 px-4 border border-black-400 rounded shadow">
                <a style="color:aliceblue;" href="https://www.messenger.com/t/100196672507349/?messaging_source=source%3Apages%3Amessage_shortlink">
                Messenger
                </a>
            </button>
        </div>
        <h4 class="text-center">Numri ynë i telefonit: <a href="tel:045-777-722">045-777-722</a></h4>
    </div>

    <div>
        <div class="order-form">
            <form class="text-xl w-full max-w-lg" action="{{ route('ngarko-foto.infot') }}"  method="POST">
                @csrf
                <input type="hidden" name="orderId" value="{{ $orderId }}">

                <div class="flex flex-wrap -mx-3 mb-6">
                  <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                  </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="text-xl text-left block uppercase tracking-wide text-black-700 font-bold mb-2" for="grid-first-name">
                        Emri dhe mbiemri
                      </label>
                      <input disabled class="text-lg appearance-none block w-full bg-gray-200 text-black-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 " id="grid-first-name" type="text" placeholder="{{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}">
                    </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                  <div class="w-full px-3">
                    <label class="text-xl text-left block uppercase tracking-wide text-gray-700 font-bold mb-2" for="grid-password">
                      Email Adresa
                    </label>
                    <input  disabled class="text-lg appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-name" type="text" placeholder="{{Auth::user()->email}}">
                  </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="text-xl text-left block uppercase tracking-wide text-gray-700 font-bold mb-2" for="phone_number">
                        Numri i telefonit
                      </label>
                      <input class="text-lg appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="phone_number" type="phone" name="phone_number" value="{{Auth::user()->phone_number}}">
                    </div>
                  </div>

                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="text-xl text-left block uppercase tracking-wide text-gray-700 font-bold mb-2" for="grid-password">
                        Qyteti
                      </label>
                      <input class="text-lg appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-city" name="city" type="text" value="{{Auth::user()->city}}">
                    </div>
                  </div>

                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="text-xl text-left block uppercase tracking-wide text-gray-700 font-bold mb-2" for="address">
                        Adresa
                      </label>
                      <input class="text-lg appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="address" name="address" type="text" value="{{Auth::user()->address}}">
                    </div>
                  </div>
                  <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">
                    VAZHDO
                  </button>
            </form>
        </div>
    </div>
</body>
</html>
