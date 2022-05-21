<!DOCTYPE html>
<html>
<head>
    <title>Font-face</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">


    <style>
        * {
            box-sizing: border-box;
            margin: 0;
        }

        html, body {
            height: 100%;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        figure {
            width: 500px;
            position: relative;
            overflow: hidden;
        }

        figure img {
            display: block;
            width: 100%;
            transition: 0.5s;
        }

        figcaption {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            background: rgba(255, 255, 255, .7);
            padding: 20px;
            text-align: center;
            opacity: 0;
            transform: translateY(100%);
            transition: 0.5s;
        }

        figure:hover figcaption {
            opacity: 1;
            transform: translateY(0);
        }

        figure:hover img {
            transform: scale(1.3);
        }
    </style>
</head>
<body>
<figure>
    <img src="Auto.jpg" alt="car"/>
    <figcaption>
        <h4>
            Ferrari S.p.A. (кратко: Ferrari — рус. «Ферра́ри») — итальянская компания, выпускающая спортивные и гоночные
            автомобили,
            oснованая в 1928 году Энцо Феррари.
        </h4>
    </figcaption>
</figure>

<div><h2>Привет мир</h2></div>
<script>

    // window.onload = function (){
    //     let div = document.querySelector('div')
    //     div.innerHTML = 'Hello world'
    // }

    let div = document.querySelector('div');
    div.addEventListener('click', function () {
        let l = 1;
        console.log(typeof l);
        div.innerHTML = `hello ${l} gorgi`;
        div.innerHTML = prompt(`hello ${l} gorgi`, 'entering you name');
    })

</script>

</body>
</html>

