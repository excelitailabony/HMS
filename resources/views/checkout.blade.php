@extends('layouts.admin_master')

@section('super-admin-content')


<div class="" style="margin:20rem;">
  <select id='selUser' style='width: 200px;'>
    <option value='0'>Select User</option>
    <option value='1'>Yogesh singh</option>
    <option value='2'>Sonarika Bhadoria</option>
    <option value='3'>Anil Singh</option>
    <option value='4'>Vishal Sahu</option>
    <option value='5'>Mayank Patidar</option>
    <option value='6'>Vijay Mourya</option>
    <option value='7'>Rakesh sahu</option>
  </select>

<br/>
<div id='result'></div>
</div>
    
 @endsection
