<style type="text/css">
    @import url(https://fonts.googleapis.com/css?family=Montserrat);
    @import url(https://fonts.googleapis.com/css?family=Lato:300);
    * {
        font-family: "Lato";
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    body,
    html {
        text-align: center;
        margin: 0;
        padding: 0;
        height: 100%;
        background-color: #F5F5F5;
        overflow: hidden;
    }

    .inline-block {
        display: inline-block;
    }

    .relative {
        position: relative;
    }

    p {
        position: relative;
        font-size: 24px;
        margin-top: -40px;
        z-index: 1000;
    }

    .error {
        width: 500px;
        text-align: center;
        display: inline-block;
        transform: scale(0.8);
        margin-top: 150px;
    }

    #grey,
    #yellow {
        font-family: "Montserrat";
        font-size: 260px;
        display: inline-block;
        margin: 0;
        vertical-align: top;
        margin-top: -40px;
    }

    #grey {
        color: #CCC;
    }

    #yellow {
        color: #FFCC00;
    }

    #pfantome {
        width: 190px;
        height: 230px;
    }

    .fantome {
        height: 230px;
        width: 190px;
        background-color: #CC3300;
        margin: auto;
        border-radius: 95px 95px 0px 0px;
        -moz-border-radius: 95px 95px 0px 0px;
        -webkit-border-radius: 95px 95px 0px 0px;
        padding-top: 80px;
        text-align: center;
        font-size: 0;
        display: inline-block;
        position: absolute;
        top: 0;
        left: 0;
    }

    .eye {
        height: 30px;
        width: 30px;
        border-radius: 15px;
        background-color: white;
        display: inline-block;
        margin: 0 5px;
    }

    #eyes {
        margin-bottom: 109px;
    }

    .pico {
        height: 38px;
        width: 38px;
        background-color: #F5F5F5;
        display: inline-block;
        transform-origin: center;
        transform: rotate(45deg);
    }

    #directional {
        display: inline-block;
        position: fixed;
        bottom: 0;
        left: 0;
    }

    #directional .touche {
        border-radius: 4px;
        background-color: #eee;
        padding: 4px;
        margin: 2px;
        color: #bdbdbd;
        cursor: pointer;
        transition: all ease 0.2s;
    }

    @media screen and (max-width: 975px) {
        #directional {
            transform: scale(1.4) translateY(-15px) translateX(15px);
        }
    }
</style>

<div class="error">
    <p id="grey">4</p>
    <div id="pfantome" class="inline-block relative">
        <div class="fantome">
            <div id="eyes">
                <div class="eye">
                </div>
                <div class="eye">
                </div>
            </div>
            <div id="picos">
                <div class="pico">
                </div>
                <div class="pico">
                </div>
                <div class="pico">
                </div>
                <div class="pico">
                </div>
                <div class="pico">
                </div>
            </div>
        </div>
    </div>
    <p id="yellow">4</p>
</div>
<p id="click">Ooops, Página não encontrada!</p>
<div id="directional">
    <div id="top">
        <div class="touche inline-block" id="up">
            <i class="material-icons">&#xE316;</i>
        </div>
    </div>
    <div id="bottom">
        <div class="touche inline-block" id="left">
            <i class="material-icons">&#xE314;</i>
        </div>
        <div class="touche inline-block" id="down">
            <i class="material-icons">&#xE313;</i>
        </div>
        <div class="touche inline-block" id="right">
            <i class="material-icons">&#xE315;</i>
        </div>
    </div>
</div>