@extends('administration.mainAdmin')

@section('administration')
<h3>Gestion des Utilisateurs</h3>

<table>
                    <thead>
                        <td>nom</td>
                        <td>e-mail</td>
                        <td>role</td>
                        <td>definir comme admin</td>
                        <td>definir comme user</td>
                        <td>Supprimer utilisateur</td>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                             <td> {{$user->name }}</td> 
                             <td> {{$user->email }}</td> 
                             <td> {{$user->role }}</td> 
                             <td><a href="/administration/newAdmin/{{$user->id}}"> admin ?</a></td> 
                             <td><a href="/administration/removeAdmin/{{$user->id}}"> user ?</a></td> 
                             <td><a href="/administration/removeUser/{{$user->id}}"> supprimer ?</a></td> 
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>

@endsection