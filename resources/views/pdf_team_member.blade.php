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
            margin: 0 auto;
        }
    </style>
</head>
<body>
    

    <table style="display:table; border:5px dotted #333333; text-align:center; margin:10px auto; padding:10px; background:#f1f1f1f; width:250px">
        {{-- <img src="{{asset($team_member->team->event->banner_image)}}" width="100" height="100" alt="" srcset="">  --}}

        <tr>
            <td>
                    <img src="{{public_path('/uploads/events/banners/'.$team_member->team->event->banner)  }}" width="100" height="100" alt="" srcset="">
                <h2 style="color:blue">{{$team_member->team->event->name}}</h2>
            </td>
        </tr>
        <tr>
            <td>
                
                <h3 ><img src="{{public_path('/uploads/events/teams/'.$team_member->team->logo)  }}" width="20" height="20" alt="" srcset=""> {{$team_member->team->name}}</h3>
                <h4>{{$team_member->team->state->name}}</h4>
                <br>
            </td>
        </tr>
        <tr>
            <td>
                    <img src="{{public_path() .'/uploads/events/teams/'.$team_member->photo }}" width="150" height="200" alt="" srcset=""> 
        <h4>{{$team_member->full_name}}</h4>
        <h4>{{$team_member->position}}</h4>
        </div>
        <hr>
        <p style="font-size:11px">Copyright&copy; {{now()->year}} worlchad.org</p>
            </td>
        <div>
        </tr>
        
    </table>
</body>
</html>