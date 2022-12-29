@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
               <div class="row">
                    <div class="col-8">
                        <h1 class="display-one">Our Contacts!</h1>
                        <p>Enjoy reading our posts. Click on a contact to read!</p>
                    </div>
                    <div class="col-4">
                        <p>Create new contact</p>
                        <a href="/contacts/create" class="btn btn-primary btn-sm">Add Contact</a>
                    </div>
               </div>
                <ul>
                    <li><a href="/contacts/export">Скачать</a></li>
                </ul>
            @forelse($contacts as $contact)
                <ul>
                    <li><a href="./contacts/{{$contact->id}}">{{ (!empty($contact->firstname)) ? ucfirst($contact->firstname) : 'не указано'}}</a></li>
                </ul>
            @empty
                <p class="text-warning">No contacts available</p>
            @endforelse
            </div>
        </div>
        {{ $contacts->links() }}
    </div>
@endsection
