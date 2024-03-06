@extends('layout.app')
<ol>
@foreach($data as $record)
<li>
    <p>Name: {{ $record->name }}</p>
    <p>Email: {{ $record->email }}</p>
    <p>Mobile: {{ $record->mobile }}</p>
    <p>Year: {{ $record->year }}</p>
    <p>Department: {{ $record->department }}</p>
    <a href="/home/{{$record->id}}"><h4><i class="bi bi-pencil-square"></i>Edit</h4></a>
    <a href="/home/del/{{$record->id}}"><h4><i>DELETE</i></h4></a>
</li>
<hr>
@endforeach
</ol>
