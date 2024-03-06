@extends('layout.app')

<form action="/home/{{$data->id}}/edit"  method="post">
        <table>
            @csrf
            @method('put')
            <tr>
                <th>Username</th>
                <td><input type="text" name="name" value="{{old('name',$data->name)}}"></td>
            </tr>
            <tr>
            <th>Email</th>
            <td><input type="email" name="email" id="email" required value="{{old('email',$data->email)}}">
                    <small id="email"></small>
            </td>
            </tr>
            <tr>
            <th>Mobile No.</th>
            <td><input type="tel" name="mobile" required id="mobile" value="{{old('mobile',$data->mobile)}}">
            <small id="NumError">mobile number must be 10 numbers long</small></td>
            </tr>
            <tr>
            <th>Year</th>
            <td>
            <select name="year"  value="{{old('year',$data->year)}}">
                        <option value="{{old('year',$data->year)}}"  selected>{{old('year',$data->year)}}</option>
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
            <select name="department" value="{{old('department',$data->department)}}">
                        <option value="{{old('department',$data->department)}}"  selected>{{old('department',$data->department)}}</option>
                    </select>
            </td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="submit"></td>
            </tr>
        </table>
    </form>