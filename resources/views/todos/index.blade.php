<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <title>To Do List</title>
</head>

<body>
    <div class="text-center flex justify-center pt-10">
        <div class="w-1/2 border rounded p-5">

            <div class="flex justify-between border-b pb-4 px-4">
                <h1 class="text-3xl font-bold"> All of To do lists </h1>
                <a class="mx-5 py-2 text-blue-500 rounded cursor-pointer" href="/todos/create">
                    <span class="fas fa-plus-circle"></span>
                </a>
            </div>

            @if(session('message'))
            <div class="py-4 px-2 bg-gray-300">
                {{ session('message') }}
            </div>
            @endif

            <ul class="my-5">

                @foreach ($todos as $todo)
                <li class="flex justify-between p-2">

                    <div>
                        @if($todo->complete)
                        <span onclick="event.preventDefault();
                                document.getElementById('task-incomplete-{{$todo->id}}').submit()" class="fas fa-check text-green-500 px-2" />
                        <form style="display: none;" id="{{'task-incomplete-'.$todo->id}}" method="post" action="{{route('todo.incomplete',$todo->id)}}">
                            @csrf
                            @method('put')
                        </form>
                        @else
                        <span onclick="event.preventDefault();
                                document.getElementById('task-complete-{{$todo->id}}').submit()" class="fas fa-check text-gray-300 cursor-pointer px-2" />
                        <form style="display: none;" id="{{'task-complete-'.$todo->id}}" method="post" action="{{route('todo.complete',$todo->id)}}">
                            @csrf
                            @method('put')
                        </form>
                        @endif
                    </div>


                    @if($todo->complete)
                    <p class="line-through">{{$todo->title}}</p>
                    @else
                    <p>{{$todo->title}}</p>
                    @endif

                    <div>
                        <a href="{{'/todos/'.$todo->id.'/edit'}}" class="mx-5 py-1 px-1 rounded cursor-pointer">
                            <i class="fa-solid fa-pen-to-square text-orange-500"></i>
                        </a>

                        <span class="fa-solid fa-trash text-red-500 px-2 cursor-pointer" onclick="event.preventDefault();
                                if(confirm('Are you sure want to delete?'))
                                {
                                    document.getElementById('task-delete-{{$todo->id}}').submit()
                                }"></span>
                        <form style="display: none;" id="{{'task-delete-'.$todo->id}}" method="post" action="{{route('todo.delete',$todo->id)}}">
                            @csrf
                            @method('delete')
                        </form>
                    </div>

                </li>
                @endforeach
            </ul>
        </div>
    </div>
</body>

</html>