<style>
    .container {

        background-image: url({{asset('images/meet-bg.png')}});
        background-size: cover;
        background-repeat: no-repeat;

        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;

        
    }
    .deets{
        margin: auto; 
        padding: auto;
    }

</style>
<div class="container">

    <div class="deets">
        <h4>Meeting Details</h4>
        <div>
            <p>Date:    {{$sched->meet_date}}</p>
            <p>Time:    {{$sched->meet_time}}</p>
        </div>
    </div>

</div>

