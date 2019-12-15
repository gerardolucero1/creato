<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Proyecto - {{ $project->title }}</title>
</head>

<body style="font-family: Helvetica; ">
    <table style="width: 100%; border-bottom:solid; border-bottom-width: 1px; padding-bottom: 15px">
        <tr>
            <td style="width: 30%">
                <img src="https://img1.wsimg.com/isteam/ip/c61c6bbe-8c4b-487a-8931-330fb513cba4/logo/cf928107-e87c-4e5b-b2a9-50d94529bfbe.png/:/rs=h:166/qt=q:95" style="width:200px">
                
            </td>
            <td colspan="3" style="text-align: right; width: 70%">
                <p>
                    <span style="font-weight: ;">Nombre cliente:</span>  <span style="font-weight:bold;  font-size:20px">{{$project->user->name}}</span><br>
                    <span style="font-weight: normal; font-size: 13px;">Lugar del evento:</span> <span style="font-style: italic; font-weight: bold;  font-size: 20px;">{{$project->place}}</span><br>
                    <span style="font-weight: normal; font-size: 13px;">Email cliente:</span> <span style="font-style: italic; font-weight: bold;  font-size: 20px;">{{$project->user->email}}</span><br>
                </p>
            </td>
        </tr>
    </table>
    <h4>Lista de asistencia</h4>
    <!--Lista de asistencia-->
    <table style="width: 100%; margin-top: 10px">
        <tr style="padding: 4px; color:white; background:#9E9E9E; text-align: center;">
            <td style="font-size: 13px; padding: 4px;">Asistencia</td>
            <td style="font-size: 13px; padding: 4px;">Nombre</td>
            <td style="font-size: 13px; padding: 4px;">Telefono</td>
            <td style="font-size: 13px; padding: 4px;">Email</td>
            <td style="font-size: 13px; padding: 4px;">Mesa</td>
        </tr>
        @foreach ($project->list->guests as $guest)
            @if($guest->status == 'CONFIRMADO')
                <tr style="margin-top: 2px; background: #F3F3F3; font-size:13px">
                    <td style="padding: 5px;"></td>
                    <td style="padding: 5px;">{{ $guest->name }} {{ $guest->lastName }} {{ $guest->secondLastName }}</td>
                    <td style="text-align: center">{{ $guest->phone }}</td>
                    <td style="padding: 5px;">{{ $guest->email }}</td>
                    <td style="padding: 5px; text-align: center">{{ $guest->tableName }}</td>
                </tr>
            @endif
        @endforeach
        @foreach ($project->list->companions as $companion)
            @if($companion->status == 'CONFIRMADO')
                <tr style="margin-top: 2px; background: #F3F3F3; font-size:13px"> 
                    <td style="padding: 5px;"></td>  
                    <td style="padding: 5px;">{{ $companion->name }} {{ $companion->lastName }} {{ $companion->secondLastName }}</td>
                    <td style="text-align: center">{{ $companion->phone }}</td>
                    <td style="padding: 5px;">{{ $companion->email }}</td>
                    <td style="padding: 5px; text-align: center">{{ $companion->tableName }}</td>
                </tr>
            @endif
        @endforeach
    </table>
</body>
</html>