<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.9.2/tailwind.min.css"/>
    <title>KRIJO KUPONA</title>
</head>
<body>


    <!-- component -->
<!-- This is an example component -->
<div class="max-w-2xl mx-auto">
<br>
<br>
<br>
<br>
<br>
<br>
<br>

      <!-- component -->
<div class="flex items-center justify-center">
    <div class="w-full max-w-md">
      <form action="{{route('voucher.generate')}}" class="bg-white shadow-lg rounded px-12 pt-6 pb-8 mb-4">
        <!-- @csrf -->

        <li class="nav-item text-center list-group-item">
            <a class="nav-link" href="{{route('voucher')}}">TE GJITH KUPONAT</a>
          </li>
        <br>

        <div
          class="text-gray-800 text-2xl flex justify-center border-b-2 py-2 mb-4">
          GJENERO KUPONA 100
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">

{{--
              <label for="exampleInputEmail1">VLERA</label>
              <input type="text" id="value" name="value" class="form-control block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" required=""> --}}


              <div class="form-group mb-3">
                <label for="">VLERA</label>
                <input type="decimal" name="value" class="form-control form-control block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
            </div>

            </div>
          </div>


        <div class="text-center flex items-center justify-between">
            <li class="nav-item text-center list-group-item">
                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary">RUAJ</button>

                    {{-- <button type="submit" class="btn btn-primary"><a class="nav-link text-center align-center"
                        href="{{route('voucher.generate')}}">GJENERO</a></button> --}}

                </div>
              </li>

              {{-- <button type="submit" class="btn btn-primary"><a class="nav-link text-center align-center"href="{{route('voucher.generate')}}">GJENERO</a></button> --}}
        </div>
      </form>

    </div>
  </div>
</div>
</div>
</body>
</html>

