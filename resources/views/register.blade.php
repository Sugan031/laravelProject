@extends('layout.app')

@if($errors->any())
    <div class="bg-red-200 p-3">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ "asdf" }}</li>
            @endforeach
        </ul>
    </div>
    @else
    <div class="bg-red-200 p-3">
        <ul>
            {{"No error"}}
        </ul>
    </div>
@endif
<form action="/register" method="post">
        <table>
            @csrf
            <tr>
                <th>Username</th>
                <td><input type="text" name="name" class="form-control 
                 @if($errors->has('name'))  {{'is-invalid'}} @endif"></td>
            </tr>
            <tr>
            <th>Email</th>
            <td><input type="email" name="email" id="email">
                    <small id="email"></small>
            </td>
            </tr>
            <tr>
            <th>Mobile No.</th>
            <td><input type="tel" name="mobile" id="mobile">
            <small id="NumError">mobile number must be 10 numbers long</small></td>
            </tr>
            <tr>
            <th>Year</th>
            <td>
            <select name="year" >
                        <option value="" disabled selected>Select a year</option>
                        <option value="1">1st</option>
                        <option value="2">2nd</option>
                        <option value="3">3rd</option>
                        <option value="4">4th</option>
                    </select>
            </td>
            </tr>
            <tr>
            <th>Department</th>
            <td>
            <select name="department">
                        <option value="" disabled selected>Select a department</option>
                        <option value="CSE">CSE</option>
                        <option value="EEE">EEE</option>
                        <option value="ECE">ECE</option>
                        <option value="MECH">MECH</option>
                    </select>
            </td>
            </tr>
            <tr>
                <td colspan="2"><button id="mybutton"><input type="submit"></button></td>
            </tr>
        </table>
    </form>

