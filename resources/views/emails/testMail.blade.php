{{-- <!DOCTYPE html>
<html>
<head>
    <title>TestMail</title>
</head>
<body>
    <h1>{{ $mailData['title'] }}</h1>
    <p>{{ $mailData['body'] }}</p>

    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

    <p>Thank you</p>
</body>
</html> --}}


<!DOCTYPE html>
<html>
    <head>
        <title>TestMail</title>
        <style>
            .container {
                background-color: #d3e2e3;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: auto;
            }
            .deets{
                background-color: #ffffff;
                width: 800px;
                height: 500px;
                padding: auto;
                margin: auto;
                margin-top: 50px;
                margin-bottom: 50px;
            }
            .template{

            }
            .gmeet{
                 
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="deets">
                <div class="template">
                    <img src="{{asset('images/gmeet-1.png')}}" class="gmeet">
                </div>
                
                <h4>Meeting Details</h4>
                <div>
                    <p>Date:    test</p>
                    <p>Time:    test</p>
                </div>
            </div>
        
        </div>
    </body>
</html>


