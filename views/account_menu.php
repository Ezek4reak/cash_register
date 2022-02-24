<nav class="navbar navbar-inverse bg-info navbar-dark">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo ROOT_URL;?>">Rheez 1.0</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?php echo ROOT_URL;?>home/accountantHome"><span class="glyphicon glyphicon-home"> Accountant</a></li>
          <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Account Receivable<span class="caret"></span></a>
          <ul class="dropdown-menu">
              <li><a href="<?php echo ROOT_URL;?>account/receiveCash">Enter Received Funds</a></li>
          </ul>
        </li>
          <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Sub Contractors<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo ROOT_URL;?>sub_contractor/addNew">Register New Sub-Contractor</a></li>
            <li><a href="<?php echo ROOT_URL;?>sub_contractor/addNewContract">Add New Contract To Existing Sub-Contractor</a></li>
            <li><a href="<?php echo ROOT_URL;?>sub_contractor/pay">Pay Sub-Contractor</a></li>
            <li><a href="<?php echo ROOT_URL;?>sub_contractor/list">Sub-Contractor list</a></li>
          </ul>
        </li>
          <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Accounts<span class="caret"></span></a>
          <ul class="dropdown-menu">
              <li><a href="<?php echo ROOT_URL;?>account/addNew">Add New Account</a></li>
              <li><a href="<?php echo ROOT_URL;?>account/list">Account List</a></li>
          </ul>
        </li>
          <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Expense Register<span class="caret"></span></a>
          <ul class="dropdown-menu">
              <li><a href="<?php echo ROOT_URL;?>transaction/pettyCashExpense">Petty Cash Expense</a></li>
              <li><a href="<?php echo ROOT_URL;?>transaction/majorExpense">Major Account Expense</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Bank<span class="caret"></span></a>
          <ul class="dropdown-menu">
              <li><a href="<?php echo ROOT_URL;?>account/newBank">Register New Bank Account</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Reports<span class="caret"></span></a>
          <ul class="dropdown-menu">
              <li><a href="<?php echo ROOT_URL;?>transaction/all">All Your Transactions</a></li>
              <li><a href="<?php echo ROOT_URL;?>account/receivedHistory">Received Funds History</a></li>
              <li><a href="<?php echo ROOT_URL;?>sub_contractor/transactions">All Sub-Contractor Statement</a></li>
            <li><a href="<?php echo ROOT_URL;?>sub_contractor/single">Individual Sub-Contractor Statement</a></li>
            <li><a href="<?php echo ROOT_URL;?>transaction/bankStatement">Bank Statement</a></li>
          </ul>
        </li>
        <li><a href="#" data-toggle="modal" data-target="#modal_dialog">Calculator</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo ROOT_URL;?>user/logout">Log Out <span class="glyphicon glyphicon-new-window"></span> </a></li>
      </ul>
    </div>
        <div class="modal fade" id="modal_dialog" role="dialog"><!--Add product model starts here-->
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Calculator</h4>
                    </div>
                    <div class="modal-body">

    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo CSS_PATH;?>static/Oswald-Bold.ttf"/>

    <style type="text/css">
      *{
        box-sizing: border-box;
      }

        .control-cover{
          width: 100%;
          border-radius: 3px;
          display: flex;
          flex-direction: row;
          justify-content: space-between;
        }

        .control{
          width: 70%;
        }
        .btmrow{
          width: 30%;
        }
        .numButton, .opButton, .btmButton{
          height: auto;
          margin: 4px;
          font-size: 1.5em;
        }
        .lone{
          margin:0.4em auto 0.4em auto;

        }
        .display{
          font-size: 1.3em;
          padding: 3px;
          font-family: 'Oswald', sans-serif;
        }
        .lbldiv{
          height: 1em;
          font-size: 1em;
        }

        .numPad, .opPad, .btmrow{
          margin-top: 0em;
        }
      .calculator-container{
          margin:0.5em, auto;
          border: 8px solid darkslategray;
          border-radius: 20px;
          background: silver;
          padding: 1em;
          width: 100%;
          height: 100%;
        }
      .numButton{
        font-weight: bolder;
        background: white;
        border-radius: 6px;
        width: 27%;
        text-align: center;
        display: block;
        background: #615D5E;
        color: white;
        border: 1px solid white;
        box-shadow: 0 6px 8px gray;
      }
      .opButton{
        font-weight: bolder;
        background: white;
        border-radius: 6px;
        text-align: center;
        display: block;
        width: 94%;
        border: 1px solid gray;
        box-shadow: 0 6px 8px gray;
        padding: 3px;

      }
      .display{
        border: 2px solid brown;
        border-radius: 8px;
        font-size: 2em;
        font-family: 'Oswald', sans-serif;
        margin: auto;
        width: 100%;
        text-align: right;
        padding: 4px;
        display: block;
      }
      .numPad{
        width: 78%;
        display: flex;
        flex-wrap: wrap;
        justify-content:space-around;
        margin-top: 0.4em;
        margin-bottom: 0.4em;
      }

      .opPad{
        width: 20%;
        display: flex;
        flex-direction: column;
        justify-content:space-between;
        margin-top: 0.4em;
        margin-bottom: 0.4em;
      }
      .control{
        display: flex;
      }
      .btmrow{
        width: 30%;
        display: flex;
        flex-wrap: wrap;
        justify-content:space-around;
        margin-top: 0.4em;
        margin-bottom: 0.4em;
      }
      .btmButton{
        font-weight: bolder;
        background: white;
        border-radius: 6px;
        width: 42%;
        text-align: center;
        display: block;
        border: 1px solid gray;
        box-shadow: 0 6px 8px gray;
      }
      .lbldiv{
        height: 1.3em;
        padding-right: 14px;
        display: block;
        text-align: right;
        font-size: 1em;
      }
      button:focus{
        outline: none;
      }
      .lone{
        font-size: 1em;
        border-radius: 3px;
        padding: 4px;
        width: 60%;
        margin:0.8em auto 0.8em auto;
        text-align: center;
        display: block;
        font-weight: bold;
        background: #694003;
        color: white;
        border: 1px solid #694003;
      }

      @media only screen and (max-width: 385px) and (max-height: 640px) and (orientation: portrait){
        .numButton, .opButton, .btmButton{
          height: 2.2em;
        }
      }

      /*Smaller device*/

      @media only screen and (max-width: 320px) and (max-height: 568px) and (orientation: portrait){
      *{
        box-sizing: border-box;
      }
      body{
        background: #070F3F;
        overflow: hidden;
      }
      .calculator-container{
          margin-top:0.3em;
          border: 5px solid white;
          border-radius: 20px;
          background: silver;
          padding: 1em 0.4em 0.4em;
          width: 100%;
          height: 100%;
        }
      .numButton{
        font-weight: bolder;
        font-size: 1.5em;
        background: white;
        border-radius: 6px;
        width: 27%;
        height: auto;
        margin: 5px;
        text-align: center;
        display: block;
        background: #615D5E;
        color: white;
        border: 1px solid white;
        box-shadow: 0 6px 8px gray;
      }
      .opButton{
        font-weight: bolder;
        font-size: 1.5em;
        background: white;
        border-radius: 6px;
        margin: 5px;
        text-align: center;
        display: block;
        width: 94%;
        height: auto;
        border: 1px solid gray;
        box-shadow: 0 6px 8px gray;
        padding: 3px;

      }
      .display{
        border: 2px solid brown;
        border-radius: 8px;
        font-size: 1.7em;
        font-family: 'Oswald', sans-serif;
        margin: auto;
        width: 100%;
        text-align: right;
        padding: 2px;
        display: block;
      }
      .numPad{
        width: 78%;
        display: flex;
        flex-wrap: wrap;
        justify-content:space-around;
        margin-top: 0.1em;
        margin-bottom: 0.1em;
      }

      .opPad{
        width: 20%;
        display: flex;
        flex-direction: column;
        justify-content:space-between;
        margin-top: 0.1em;
        margin-bottom: 0.1em;
      }
      .control{
        display: flex;
      }
      .btmrow{
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        justify-content:space-around;
        margin-bottom: 0.2em;
      }
      .btmButton{
        font-weight: bolder;
        font-size: 1.5em;
        background: white;
        border-radius: 6px;
        width: 20%;
        margin: 5px;
        text-align: center;
        display: block;
        height: auto;
        border: 1px solid gray;
        box-shadow: 0 6px 8px gray;
      }
      .lbldiv{
        height: 1em;
        padding-right: 14px;
        display: block;
        text-align: right;
        font-size: 1em;
      }
      button:focus{
        outline: none;
      }
      .lone{
        font-size: 1em;
        border-radius: 3px;
        padding: 4px;
        width: 60%;
        margin:0.3em auto 0.3em auto;
        text-align: center;
        display: block;
        font-weight: bold;
        background: #694003;
        color: white;
        border: 1px solid #694003;
      }
}
      @media only screen and (max-width: 568px) and (max-height: 320px) and (orientation: landscape){
        .calculator-container{
          margin: auto;
          width: 100%;
        }

        .control-cover{
          width: 100%;
          border-radius: 3px;
          display: flex;
          flex-direction: row;
          justify-content: space-between;
        }

        .control{
          width: 70%;
        }
        .btmrow{
          width: 30%;
        }
        .btmButton{
          width: 40%;
        }
        .numButton, .opButton, .btmButton{
          height: auto;
          margin: 3px;
          font-size: 1.2em;
        }
        .calculator-container{
          padding: 0.5em 0.3em 0.3em;

        }
        .lone{
          margin:0.3em auto 0.3em auto;

        }
        .display{
          font-size: 1.3em;
          padding: 2px;
        }
        .lbldiv{
          height: 1em;
          font-size: 1em;
        }

        .numPad, .opPad, .btmrow{
          margin-top: 0em;
        }
      }

    </style>

<div class="calculator-container">
  <audio id="audio" src="button-16.wav" autoplay="false" ></audio>
    <div>
        <div class="lone">&copy; Ez-Calculator</div>
    </div>
    <hr>
    <div><input type="text" class="display" placeholder="0"disabled></div>
    <hr>
    <div class="lbldiv lbl"></div>
    <hr>
    <div class="control-cover">
      <div class="control">
          <div class="numPad">

              <button class="numButton one"> 1 </button>
              <button class="numButton two"> 2 </button>
              <button class="numButton three"> 3 </button>
              <button class="numButton four"> 4 </button>
              <button class="numButton five"> 5 </button>
              <button class="numButton six"> 6 </button>
              <button class="numButton seven"> 7 </button>
              <button class="numButton eight"> 8 </button>
              <button class="numButton nine"> 9 </button>
              <button class="numButton zero"> 0 </button>
              <button class="numButton dot"> . </button>
              <button class="numButton equal"> = </button>
          </div>
          <div class="opPad">
              <button class="opButton plus">+</button>
              <button class="opButton minus">-</button>
              <button class="opButton divid">&#247</button>
              <button class="opButton multiply">&#215;</button>
          </div>
      </div>
      <hr>
      <div class="btmrow">
          <button class="btmButton back">&larr;</button>
          <button class="btmButton clear">c</button>
          <button class="btmButton mod">%</button>
          <button class="btmButton sqrt">&radic;</button>
          <button class="btmButton sqr">x<sup>2</sup></button>
          <button class="btmButton cube">x<sup>3</sup></button>
          <button class="btmButton pow">x<sup>x</sup></button>
          <button class="btmButton fact">n!</button>
      </div>
  </div>
</div>
<script type="text/javascript">
      function playSound() {
        var sound = document.getElementById("audio");
        sound.playbackRate = 3;
        sound.volume = 0.2;
        sound.play();
      }
      function numberWithCommas(x) {
        var parts = x.toString().split(".");
        parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        return parts.join(".");
      }
      function removeComma(x){
        let parts = x.toString().split(",");
        return parts.join("");
      }
      function factorial(x){
        if(x===1){
          return x;
        }else{
          return x*factorial(x-1);
        }
      }
      var num1, num2, operator, answer;
      var calculated = false;
      var opSet = false;
      //display TextBox
      var display = document.querySelector('.display');
      //Numbers Pad
      var one = document.querySelector('.one');
      var two = document.querySelector('.two');
      var three = document.querySelector('.three');
      var four = document.querySelector('.four');
      var five = document.querySelector('.five');
      var six = document.querySelector('.six');
      var seven = document.querySelector('.seven');
      var eight = document.querySelector('.eight');
      var nine = document.querySelector('.nine');
      var zero = document.querySelector('.zero');
      var dot = document.querySelector('.dot');
      //Operators Buttons
      var equal = document.querySelector('.equal');
      var plus = document.querySelector('.plus');
      var minus = document.querySelector('.minus');
      var divid = document.querySelector('.divid');
      var multiply = document.querySelector('.multiply');
      var sqrt = document.querySelector('.sqrt');
      var mod = document.querySelector('.mod');
      var sqr = document.querySelector('.sqr');
      var cube = document.querySelector('.cube');
      var pow = document.querySelector('.pow');
      var fact = document.querySelector('.fact');
      //control buttons
      var clear = document.querySelector('.clear');
      var back = document.querySelector('.back');
      var lab = document.querySelector('.lbl');

      back.style.background = "#CE688A";
      back.style.color = "white";
      //Numbers response functions
      one.addEventListener('click', function(){
        playSound();
        if (calculated || opSet || display.value === "0") {
          display.value = '1';
          calculated = false;
          opSet = false;
        }else{
          display.value += '1';
        }
      });
      two.addEventListener('click', function(){
        playSound();
        if (calculated || opSet || display.value === "0") {
          display.value = '2';
          calculated = false;
          opSet = false;
        }else{
          display.value += '2';
        }
      });
      three.addEventListener('click', function(){
        playSound();
        if (calculated || opSet || display.value === "0") {
          display.value = '3';
          calculated = false;
          opSet = false;
        }else{
          display.value += '3';
        }
      });
      four.addEventListener('click', function(){
        playSound();
        if (calculated || opSet || display.value === "0") {
          display.value = '4';
          calculated = false;
          opSet = false;
        }else{
          display.value += '4';
        }
      });
      five.addEventListener('click', function(){
        playSound();
        if (calculated || opSet || display.value === "0") {
          display.value = '5';
          calculated = false;
          opSet = false;
        }else{
          display.value += '5';
        }
      });
      six.addEventListener('click', function(){
        playSound();
        if (calculated || opSet || display.value === "0") {
          display.value = '6';
          calculated = false;
          opSet = false;
        }else{
          display.value += '6';
        }
      });
      seven.addEventListener('click', function(){
        playSound();
        if (calculated || opSet || display.value === "0") {
          display.value = '7';
          calculated = false;
          opSet = false;
        }else{
          display.value += '7';
        }
      });
      eight.addEventListener('click', function(){
        playSound();
        if (calculated || opSet || display.value === "0") {
          display.value = '8';
          calculated = false;
          opSet = false;
        }else{
          display.value += '8';
        }
      });
      nine.addEventListener('click', function(){
        playSound();
        if (calculated || opSet || display.value === "0") {
          display.value = '9';
          calculated = false;
          opSet = false;
        }else{
          display.value += '9';
        }
      });
      zero.addEventListener('click', function(){
        playSound();
        if (display.value==="" || calculated || opSet) {
          display.value = "";
          calculated = false;
          opSet = false;
        }else{
          display.value += '0';
        }
      });
      dot.addEventListener('click', function(){
        playSound();
        if (display.value==="" || calculated || opSet) {
          display.value = "0.";
                calculated = false;
                opSet = false;
        }else{
          display.value += '.';
        }
      });
      //control functions
      back.addEventListener('click', function(){
        playSound();
        let value = display.value;
        display.value = value.substr(0, value.length - 1);
      });
      clear.addEventListener('click', function(){
        playSound();
        display.value = "";
        num1 = "";
        num2 = "";
        opSet = false;
        calculated = false;
      });
      //Operators functions
      plus.addEventListener('click', function(){
        playSound();
        if(operator){
          calculate();
          opSet = true;
        }
        num1 = display.value;
        num1 = Number(removeComma(num1));
        operator = "+";
        lab.textContent = numberWithCommas(num1) + " +";
        opSet = true;

      });
      minus.addEventListener('click', function(){
        playSound();
        if(operator){
          calculate();
          opSet = true;
        }
        num1 = display.value;
        num1 = Number(removeComma(num1));
        operator = "-";
        lab.textContent = numberWithCommas(num1) + " -";
        opSet = true;
      });
      divid.addEventListener('click', function(){
        playSound();
        if(operator){
          calculate();
          opSet = true;
        }
        num1 = display.value;
        num1 = Number(removeComma(num1));
        operator = "/";
        lab.innerHTML = numberWithCommas(num1) + " &#247";
        opSet = true;
      });
      multiply.addEventListener('click', function(){
        playSound();
        if(operator){
          calculate();
          opSet = true;
        }
        num1 = display.value;
        num1 = Number(removeComma(num1));
        operator = "*";
        lab.innerHTML = numberWithCommas(num1) + " &#215;";
        opSet = true;
      });
      sqrt.addEventListener('click', function(){
        playSound();
        num1 = display.value;
        num1 = Number(removeComma(num1));
        answer = Math.sqrt(num1);
        answer= numberWithCommas(answer)
        display.value = answer;
        calculated = true;
        lab.innerHTML = "&radic;"+numberWithCommas(num1);
      });
      sqr.addEventListener('click', function(){
        playSound();
        num1 = display.value;
        num1 = Number(removeComma(num1));
        answer = num1 * num1;
        answer= numberWithCommas(answer)
        display.value = answer;
        calculated = true;
        lab.innerHTML = numberWithCommas(num1)+"<sup>2</sup>";
      });
      cube.addEventListener('click', function(){
        playSound();
        num1 = display.value;
        num1 = Number(removeComma(num1));
        answer = num1 * num1 * num1;
        answer= numberWithCommas(answer)
        display.value = answer;
        calculated = true;
        lab.innerHTML = numberWithCommas(num1)+"<sup>3</sup>";
      });
      mod.addEventListener('click', function(){
        playSound();
        if(operator){
          calculate();
          opSet = true;
        }
        num1 = display.value;
        num1 = Number(removeComma(num1));
        operator = "%";
        lab.innerHTML = numberWithCommas(num1)+" %";
        opSet = true;
      });
      pow.addEventListener('click', function(){
        playSound();
        if(operator){
          calculate();
          opSet = true;
        }
        num1 = display.value;
        num1 = Number(removeComma(num1));
        operator = "pow";
        lab.innerHTML = numberWithCommas(num1)+"<sup>^</sup>";
        opSet = true;
      });
      fact.addEventListener('click', function(){
        playSound();
        num1 = display.value;
        num1 = Number(removeComma(num1));
        answer = factorial(num1);
        answer= numberWithCommas(answer)
        display.value = answer;
        calculated = true;
        lab.innerHTML = numberWithCommas(num1)+"!";
      });
      equal.addEventListener('click', function(){
        playSound();
        calculate();
      });

      function calculate(){
        num2 = Number(display.value);
        switch(operator){
          case "+":
            answer = num1 + num2;
            answer= numberWithCommas(answer);
            display.value = answer;
            lab.innerHTML = numberWithCommas(num1) + " + "+ numberWithCommas(num2) +" = "+ answer;
            calculated = true;
            break;
          case "-":
            answer = num1 - num2;
            answer= numberWithCommas(answer);
            display.value = answer;
            lab.innerHTML = numberWithCommas(num1) + " - "+numberWithCommas(num2) +" = "+ answer;
            calculated = true;
            break;
          case "/":
            answer = num1 / num2;
            answer= numberWithCommas(answer);
            display.value = answer;
            lab.innerHTML = numberWithCommas(num1) + " &#247; "+numberWithCommas(num2) +" = "+ answer;
            calculated = true;
            break;
          case "*":
            answer = num1 * num2;
            answer= numberWithCommas(answer);
            display.value = answer;
            lab.innerHTML = numberWithCommas(num1) + " &#215; "+numberWithCommas(num2) +" = "+ answer;
            calculated = true;
            break;
          case "%":
            answer = num1 % num2;
            answer= numberWithCommas(answer);
            display.value = answer;
            lab.innerHTML = numberWithCommas(num1) + " % "+numberWithCommas(num2) +" = "+ answer;
            calculated = true;
            break;
          case "pow":
            answer = Math.pow(num1, num2);
            answer= numberWithCommas(answer);
            display.value = answer;
            lab.innerHTML = numberWithCommas(num1) + "<sup>"+numberWithCommas(num2)+"</sup>" +" = "+ answer;
            calculated = true;
            break;
          default:
            display.value = num2;
            calculated = false;
            break;
        }
        operator = "";
      }
    </script>

                    </div><!--modal body-->
                </div><!--end of modal content-->
            </div><!--end of modal dialog-->
        </div><!--Add product model ends here-->
</nav>
