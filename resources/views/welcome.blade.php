<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notes App</title>
    <style>
        html {
            font-size: 18px;
            font-family: sans-serif;
        }
        *{
            margin: 0px;
            padding: 0px;
            font-size: 1rem;
        }

        h1{
            font-size: 1.8rem;
            margin: 20px 0;
        }

        h2{
            font-size: 1.6rem;
            margin: 20px 0;
        }
        button.--none{
            border:none;
            background: inherit;
       }
        .container{
            max-width: 900px;
            margin: 30px auto;
        }
        .notes{
            margin-top: 50px;
            max-width: 700px;
            min-width: 300px;
            width: 60%;
        }
        .note{
            margin-bottom: 20px;
        }
        .note strong{
            margin: 5px 0;
            font-size: 1.2rem;
        }
        form.createNote{
            min-width: 300px;
            max-width: 600px;
            width: 40%;
        }
        input,textarea, button{
            padding:10px;
            outline:none;
            border:1px solid black;
            margin:5px 0px;
        }
        button{
            cursor: pointer;
        }
        .flex{
            display: flex;
            flex-wrap: wrap;
        }
        .justify-between{
            justify-content: space-between;
        }
        .justify-around{
            justify-content: space-around;
        }
        .items-center{
            align-items: center;
        }
        .column{
            flex-direction: column;
        }

        @media screen and (max-width:768px){
            html{
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
       <div class="flex justify-around">
            <div>
                <h1>Create Note</h1>
                <form class="createNote flex column" action="" method="post">
                    @csrf
                    <input type="text" name="name" placeholder="Note name" required />
                    <textarea name="content" placeholder="Note content" rows="8" required></textarea>
                    <button type="submit" > CREATE </button>
                </form>
            </div>
        <div>
            <h2>List of Notes</h2>
            <ul class="notes">
                @foreach($notes as $note)
                    <li class="note">
                        <div class="flex items-center justify-between">
                            <strong>{{$note['name']}}</strong>
                            <form action="/{{$note['id']}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="--none">❌</button>
                            </form>
                        </div>
                        <p>{{$note['content']}}</p>
                    </li>
                @endforeach
            </ul>
        </div>
       </div>
    </div>
</body> 
</html>