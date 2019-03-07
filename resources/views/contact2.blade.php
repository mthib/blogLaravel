@extends('layouts/main')
@section('content')
<h1>Contact</h1>

<form action="/handigital/blogLaravel/public/contact" method="POST">
    {{ csrf_field()}}
    <div>
        <input type="text" name="contact_name" placeholder="Nom">
    </div>
    <div>
    <input type="text" name="contact_email" placeholder="Email">
        </div>
    <div>
        <textarea name="contact_message" placeholder="Description"></textarea>
    </div>
    <div>
        <button type="submit">Créer le projet</button>
    </div>
</form>

<h1>Nous ont déjà contacté</h1>
<ul>
@foreach ( $contacts as $contact )
    <li>{{ $contact->contact_name }}</li>
@endforeach
</ul>
@endsection