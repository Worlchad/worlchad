<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        * {
            padding: 0;
            margin: 0;
        }
        table {
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    

    <table border="1" style="text-align:center; padding:10px; background:#f1f1f1f; width:100%">
       
        <tr>
            <td colspan="5">
                <img src="{{public_path('/uploads/events/banners/'.$team->event->banner)  }}" width="100" height="100" alt="" srcset="">
                <h2 style="color:blue">{{$team->event->name}}</h2>
            </td>
        </tr>
        <tr>
            <td colspan="5">
                
                <h3 ><img src="{{public_path('/uploads/events/teams/'.$team->logo)  }}" width="20" height="20" alt="" srcset=""> {{$team->name}}</h3>
                <h4>{{$team->state->name}}</h4>
                <br>
            </td>
        </tr>
        @foreach ($team->members as $member)
        <tr>
            <td style="padding:10px;"><img src="{{public_path('/uploads/events/teams/'.$member->photo)  }}" width="50" height="50" alt="" srcset=""></td>
            <td>{{$member->full_name}}</td>
            <td>{{$member->dob->format('d - m - Y')}}</td>
            <td>{{$member->gender}}</td>
            <td>{{$member->position}}</td>
        </tr>
        @endforeach   
        <tr>
        <td colspan="5"> Copyright&copy; {{now()->year}} <a href="https://worlchad.org">worlchad.org</a></td>
        </tr>     
    </table>
</body>
</html>