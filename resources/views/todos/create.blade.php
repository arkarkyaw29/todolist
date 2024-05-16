<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Create</title>
</head>
<body>
    <div class="text-center flex justify-center pt-10">
        <div class="w-1/3 border rounded p-5">
        <div class="flex justify-center border-b pb-4">
        <h1 class="text-3xl font-bold">Create To do List </h1>
      
    </div>

          

            @if(session('message'))
                <div class="py-4 px-2 bg-green-400">   
                    {{ session('message') }}
                </div>
            @elseif(session('error'))
                <div class="py-4 px-2 bg-red-400">   
                    {{ session('error') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="py-4 px-2 bg-red-400">
                    <ul>
                        @foreach ($errors->all() as $error )
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="post" action="/todos/create" class="py-5">
                @csrf           
                <input type="text" name="title" class="py-2 px-2 border rounded"/>            
                <input type="submit" value="Create" class="p-2 border rounded"/> <br>          
            </form>
            <br>
            <a href="/todos" class="my-5 py-4 px-2 bg-white-300 border rounded cursor-pointer" >Back</a><br>
        </div>
    </div>
</body>
</html>