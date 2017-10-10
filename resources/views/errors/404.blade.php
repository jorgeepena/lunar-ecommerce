<!DOCTYPE html>
<html>
    <head>
        <title>404</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #fff;
                display: table;
                font-weight: 100;
                font-family: 'Lato', sans-serif;
                background: url('../img/hero-img.jpg');
                background-size: cover;
                background-attachment: fixed;
                background-position: center center;
                background-repeat: no-repeat; 
            }

            .overlay{
                width: 100%;
                height: 100%;
                position: absolute;
                top: 0px;
                left: 0px;

                background-color: rgba(0,0,0,0.8);
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
                position: relative;
                z-index: 10;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .content .community{
                font-weight: 600;
                text-align: center;
                font-size: 1em;
                position: absolute;
                bottom: 20px;
                left: 50%;
                color: #fff;
                transform: scale(0.8) translateX(-50%);
                margin-left: -30px;
            }

            .title {
                font-size: 48px;
                margin-bottom: 40px;
            }

            .content img{
                width: 150px;
                margin-bottom: 30px;
            }

            ul{
                list-style: none;
                margin: 0px;
                padding: 0px;
                text-align: center;
            }

            ul li{
                list-style: none;
                display: inline-block;
                font-size: 1.4em;
                text-transform: uppercase;
                margin: 10px 20px;
                letter-spacing: 3px;
            }

            ul li a{
            	color: #fff;
            }

        </style>
    </head>
    <body>
        <div class="overlay"></div>
        <div class="container">
            <div class="content">
                <div class="title">404 <br>Whoops!</div>

                <h3>¿Questions?</h3>
                <p>Submit a ticket at:</p>
                <ul>
                   <li><a href="https://github.com/Eggotron/lunar-ecommerce/issues/new">Github Repository</a></li>
                </ul>

                <a class="community" href="https://github.com/Eggotron/lunar-ecommerce">Made by the community</a>
            </div>
        </div>
    </body>
</html>
