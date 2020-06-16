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
            <td>
                <img src="https://img1.wsimg.com/isteam/ip/c61c6bbe-8c4b-487a-8931-330fb513cba4/logo/cf928107-e87c-4e5b-b2a9-50d94529bfbe.png/:/rs=h:166/qt=q:95" style="width:200px">
                
            </td>
            <td>
                <p>
                    <span style="font-weight:bold;  font-size:20px">{{$project->user->name}}</span>
                    <br>
                    <span style="font-style: italic; font-weight: bold;  font-size: 20px;">{{$project->place}}</span><br>
                    <span style="font-style: italic; font-weight: bold;  font-size: 20px;">{{$project->user->email}}</span><br>
                </p>
            </td>
        </tr>
    </table>
    <h4>Lista de asistencia</h4>
    <!--Lista de asistencia-->
    @if (!is_null($options))
        <table style="width: 100%; margin-top: 10px">
            <tr style="padding: 4px; color:white; background:#9E9E9E; text-align: center;">
                @if (in_array('check', $options))
                    <td style="font-size: 13px; padding: 4px;">Asistencia</td>
                @endif
                @if (in_array('name', $options))
                    <td style="font-size: 13px; padding: 4px;">Nombre</td>
                @endif
                @if (in_array('telephone', $options))
                    <td style="font-size: 13px; padding: 4px;">Telefono</td>
                @endif
                @if (in_array('email', $options))
                    <td style="font-size: 13px; padding: 4px;">Email</td>
                @endif
                @if (in_array('table', $options))
                    <td style="font-size: 13px; padding: 4px;">Mesa</td>
                @endif
                @if (in_array('origin', $options))
                    <td style="font-size: 13px; padding: 4px;">Parte de</td>
                @endif
                @if (in_array('genere', $options))
                    <td style="font-size: 13px; padding: 4px;">Sexo</td>
                @endif
            </tr>
            @foreach ($project->list->guests as $guest)
                @if($guest->status == 'CONFIRMADO')
                    <tr style="margin-top: 2px; background: #F3F3F3; font-size:13px">
                        @if (in_array('check', $options))
                            <td style="padding: 5px;"></td>
                        @endif
                        @if (in_array('name', $options))
                            <td style="padding: 5px;">{{ $guest->name }} {{ $guest->lastName }} {{ $guest->secondLastName }}</td>
                        @endif
                        @if (in_array('telephone', $options))
                            <td style="text-align: center; height: 20px;">{{ $guest->phone }}</td>
                        @endif
                        @if (in_array('email', $options))
                            <td style="padding: 5px; height: 20px;">{{ $guest->email }}</td>
                        @endif
                        @if (in_array('table', $options))
                            <td style="padding: 5px; text-align: center">
                                @if (is_null($guest->table))
                                    Sin mesa
                                @else
                                    {{ $guest->table->name }}
                                @endif
                            </td>
                        @endif
                        @if (in_array('origin', $options))
                            <td style="padding: 5px; text-align: center">{{ $guest->origin }}</td>
                        @endif
                        @if (in_array('genere', $options))
                            <td style="padding: 5px; text-align: center">
                                @if ($guest->genere == 'MALE')
                                    Hombre
                                @else
                                    Mujer
                                @endif
                            </td>
                        @endif
                    </tr>
                @endif
            @endforeach
            @foreach ($project->list->companions as $companion)
                @if($companion->status == 'CONFIRMADO')
                    <tr style="margin-top: 2px; background: #F3F3F3; font-size:13px">
                        @if (in_array('check', $options))
                            <td style="padding: 5px;"></td>
                        @endif
                        @if (in_array('name', $options))
                            <td style="padding: 5px;">{{ $companion->name }} {{ $companion->lastName }} {{ $companion->secondLastName }}</td>
                        @endif
                        @if (in_array('telephone', $options))
                            <td style="text-align: center; height: 20px;">{{ $companion->phone }}</td>
                        @endif
                        @if (in_array('email', $options))
                            <td style="padding: 5px; height: 20px;">{{ $companion->email }}</td>
                        @endif
                        @if (in_array('table', $options))
                            <td style="padding: 5px; text-align: center">
                                @if (is_null($companion->table))
                                    Sin mesa
                                @else
                                    {{ $companion->table->name }}
                                @endif
                            </td>
                        @endif
                        @if (in_array('origin', $options))
                            <td style="padding: 5px; text-align: center">--</td>
                        @endif
                        @if (in_array('genere', $options))
                            <td style="padding: 5px; text-align: center">
                                @if ($companion->genere == 'MALE')
                                    Hombre
                                @else
                                    Mujer
                                @endif
                            </td>
                        @endif
                    </tr>
                @endif
            @endforeach
        </table>
    @else
        <p>Selecciona al menos una opcion para imprimir la lista de invitados.</p>
    @endif
</body>
</html>