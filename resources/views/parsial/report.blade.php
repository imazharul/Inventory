<div class="row-fluid">
        <?php 

            $today= date('d-m-y');
            $today_sell=DB::table('orderdetails')->where('order_date',$today)->sum('total');
        ?>		
    <div class="span3 statbox purple" onTablet="span6" onDesktop="span3">
        <div class=""> Today Sell</div>
    <div class="number">{{ $today_sell }}<i class="icon-arrow-up"></i></div>
    <div class="">Date: {{ $today }}</div>
        <div class="footer">
            <a href="#"> read full report</a>
        </div>	
    </div>
    <div class="span3 statbox green" onTablet="span6" onDesktop="span3">
        <div class=""> Weekly </div>
        <div class="number">0<i class="icon-arrow-up"></i></div>
        <div class="title">sales</div>
        <div class="footer">
            <a href="#"> read full report</a>
        </div>
    </div>
    <div class="span3 statbox blue noMargin" onTablet="span6" onDesktop="span3">
        <div class="">Monthly</div>
        <div class="number">00<i class="icon-arrow-up"></i></div>
        <div class="title">orders</div>
        <div class="footer">
            <a href="#"> read full report</a>
        </div>
    </div>
    <div class="span3 statbox yellow" onTablet="span6" onDesktop="span3">
        <div class="">Yearly</div>
        <div class="number">00<i class="icon-arrow-down"></i></div>
        <div class="title">visits</div>
        <div class="footer">
            <a href="#"> read full report</a>
        </div>
    </div>	
    
</div>