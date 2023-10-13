<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <h1>Document</h1>
    <?=$nama?>
    {{ $nama }} - {!! $alamat !!} - {{ $kelas }}

    @if($nama == null)
        'Nama tidak tersedia'
    @else
        {{ $nama }}
    @endif

    {{ $fruits[1] }}

    @foreach ($fruits as $fruit)
        <br/>
        {{ $fruit }}
    @endforeach

    <form method="post" action="#">
        @csrf
        @method('patch')
    </form>

    @php
        $no = 1;
        echo $no;
    @endphp

    <x-alert message="Pesan pertama" type="danger"/>
    <x-alert message="Pesan kedua" type="success"/>
    <x-alert message="Pesan ketiga" type="secondary"/>
    <x-alert message="Pesan keempat" type="warning"/>
</body>
</html>