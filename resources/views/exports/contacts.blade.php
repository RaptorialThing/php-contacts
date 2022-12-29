<table>
    <thead>        
    <tr>
        <th>Фамилия</th>
        <th>Имя</th>
        <th>Отчество</th>
        <th>email</th>
        <th>телефон</th>
    </tr>
    </thead>
    <tbody>
    @foreach($contacts as $contact)
    <tr>
        <td>
            @empty($contact->lastname)
   
            @else
                {{$contact->lastname}}
            @endempty
            </td>
        <td>
            @empty($contact->firstname)
           
            @else
                {{$contact->firstname}}
            @endempty
        </td>
    <td>
        @empty($contact->patrony)
            
        @else
            {{$contact->patrony}}
        @endempty
    </td>
    <td>
        @empty($contact->email)
            
        @else
            {{$contact->email}}
        @endempty
    </td>
    <td>
        @empty($contact->phone)
            
        @else
            {{$contact->phone}}
        @endempty
    </td>
    </tr>
    @endforeach
    </tbody>
</table>
