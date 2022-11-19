<!-- Bootstrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Posts') }}
        </h2>
    </x-slot>

    <div class="container">
    <br>    
    <strong><h1>Admin Reports</h1></strong> 
    <br>
    <strong><h2>User with the highest number of sales:</h2></strong>    
    <?php if ($mostSaleUser){?>
        <h3>{{$mostSaleUser->username}} ({{$mostSales}})</h3> 
    <?php }else{ ?>  
        <h3>N/A</h3> 
    <?php }?>
    <br>
    <strong><h2>User with the most profit:</h2></strong>    
    <?php if ($mostProfitUser){?>
        <h3>{{$mostProfitUser->username}} (${{$mostProfit}})</h3> 
    <?php }else{ ?>  
        <h3>N/A</h3> 
    <?php }?>
    </div>
</x-app-layout>