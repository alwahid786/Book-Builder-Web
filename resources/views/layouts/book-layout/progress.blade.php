<?php
$percentage = bookProgress()['percentage'];
?>
<div class="navBar p-3">
    <div class="progressDiv w-100 pr-5">
        <h4 class="text-white">Your Book Progress</h4>
        <div class=" progress " style="height: 18px;">
            <div class="progress-bar" role="progressbar" aria-valuenow="14" aria-valuemin="0" aria-valuemax="100" style="width:14%;height: 18px; background-color:green">
                {{$percentage}}%
            </div>
        </div>
    </div>
    <div class="dropdown dropdownDiv">
        <span class="dropdown-toggle text-white" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor:pointer">{{auth()->user()->name}}</span>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="{{url('welcome')}}">Welcome Page</a>
            <a class="dropdown-item" href="{{url('logout')}}">Logout</a>
        </div>
    </div>
</div>