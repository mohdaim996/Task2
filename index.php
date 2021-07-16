<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motors</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        .button:active {
            background-color: snow;
            box-shadow: 0 5px #666;
            transform: translateY(4px);
        }

        .button {
            background-color: royalblue;
            ;
            /* Green */
            border: 1px solid turquoise;
            border-radius: 12px;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            transition-duration: 0.4s;
        }

        .button:hover {
            background-color: #008CBA;
            /* Green */
            color: white;
            box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
        }
    </style>
</head>

<body style="background-color: grey;" onload="initValue()">
    <div style="display: flex; justify-content:space-around; width: 30%; margin:auto; margin-top:5%">
        <button class="button" name="forward" id="f">Forward</button>
    </div>
    <div style="display: flex; justify-content:space-around; width: 50%; margin:auto; margin-top:5%">
        <button class="button" name="rightD" id="r">Right</button>
        <button class="button" name="stop" id="s">Stop</button>
        <button class="button" name="leftD" id="l">Left</button>
    </div>
    <div style="display: flex; justify-content:space-around; width: 30%; margin:auto; margin-top:5%">
        <button class="button" name="back" id="b">BackWard</button>
    </div>

    <div style="display: flex; justify-content:space-around; width: 30%; margin:auto; margin-top:5%">
        <p>المحرك الاول</p>
        <Input type="range" min="0" max="180" id="s1" name="s1" class="slider" oninput="inputOnChange(this)"></Input>
        <p id="s1"></p>
    </div>
    <div style="display: flex; justify-content:space-around; width: 30%; margin:auto; margin-top:5%">
        <p>المحرك الثاني</p>
        <Input type="range" min="0" max="180" id="s2" name="s2" class="slider" oninput="inputOnChange(this)"></Input>
        <p id="s2"></p>
    </div>
    <div style="display: flex; justify-content:space-around; width: 30%; margin:auto; margin-top:5%">
        <p>المحرك الثالث</p>
        <Input type="range" min="0" max="180" id="s3" name="s3" class="slider" oninput="inputOnChange(this)"></Input>
        <p id="s3"></p>
    </div>
    <div style="display: flex; justify-content:space-around; width: 30%; margin:auto; margin-top:5%">
        <p>المحرك الرابع</p>
        <Input type="range" min="0" max="180" id="s4" name="s4" class="slider" oninput="inputOnChange(this)"></Input>
        <p id="s4"></p>
    </div>
    <div style="display: flex; justify-content:space-around; width: 30%; margin:auto; margin-top:5%">
        <p>المحرك الخامس</p>
        <Input type="range" min="0" max="180" id="s5" name="s5" class="slider" oninput="inputOnChange(this)"></Input>
        <p id="s5"></p>
    </div>
    <div style="display: flex; justify-content:space-around; width: 30%; margin:auto; margin-top:5%">
        <p>المحرك السادس</p>
        <Input type="range" min="0" max="180" id="s6" name="s6" class="slider" oninput="inputOnChange(this)"></Input>
        <p id="s6"></p>
    </div>
    <div style="display: flex; justify-content:space-around; width: 30%; margin:auto; margin-top:5%">
        <input type="checkbox" id="check" name="motorState">
        <input type="submit" id="save" value="حفظ"></input>

    </div>



    <script>
        function inputOnChange(slider) {
            let thisSlider = slider.value;
            let label = document.querySelector(`p#${slider.id}`);
            label.innerHTML = thisSlider;
        }

        function initValue() {
            let sliders = document.querySelectorAll('.slider');
            sliders.forEach((slider) => document.querySelector(`p#${slider.id}`).innerHTML = slider.value);
        }
        $("#save").click(function() {

            let sliders = document.querySelectorAll('.slider');
            let motorState = document.getElementById("check").checked;

            $.post("sliders.php", {
                    "s1": `${sliders[0].value}`,
                    "s2": `${sliders[1].value}`,
                    "s3": `${sliders[2].value}`,
                    "s4": `${sliders[3].value}`,
                    "s5": `${sliders[4].value}`,
                    "s6": `${sliders[5].value}`,
                    "motorState": (motorState ? "on" : "off")
                },
                function(data, status) {
                    alert(data)
                });
        });
        $(".button").click(
            function() {
                let btn = document.getElementById(this.id);
                $.post("directions.php", {
                        "btn": `${btn.id}`,
                    },
                    function(data, status) {
                        alert(data)
                    });
            }
        )

        window.watsonAssistantChatOptions = {
            integrationID: "cd954497-96c6-4877-8920-c58288a91e7c", // The ID of this integration.
            region: "eu-de", // The region your integration is hosted in.
            serviceInstanceID: "e324724f-9205-4b7a-9997-81d83d753080", // The ID of your service instance.
            onLoad: function(instance) {
                instance.render();
            }
        };
        setTimeout(function() {
            const t = document.createElement('script');
            t.src = "https://web-chat.global.assistant.watson.appdomain.cloud/loadWatsonAssistantChat.js";
            document.head.appendChild(t);
        });
    </script>
</body>

</html>