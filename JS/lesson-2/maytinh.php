<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <style>
        *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        background-color: black;
        font-family: sans-serif;
        outline: none;
        }
        .main{
            height: 100vh;
            display: flex;
             justify-content: center;
            align-items: center; 
        }
        .calculator{
            background-color: black;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 1px 1px 5px 3px #888888;
            display: grid;
            grid-template-columns: repeat(4,70px); 
        }
        input{
             grid-column: span 4;
             height: 70px; 
             width: 260px;
             background-color: black;
            box-shadow: 1px 1px 5px 3px #888888;
            border: none;
            border-radius: 10px;
            color: white;
            font-size: 27px;
            font-weight: 700;
            text-align: end;
            margin: auto;
            margin-top: 40px;
            margin-bottom: 30px;
            padding: 20px;

        }

        button{
            height: 48px;
            width: 48px;
            background-color: orange;
            border-radius: 50%;
            border: none;
            margin: 10px;
            color: white;
            font-size: 18px;
        }

        button:hover{
            background-color: white;
            color: orange;
            cursor: pointer;
            transition: 0.5s;
        }
        .so0{
            width: 115px;
            border-radius: 40px;
            background-color: #222222;

        }


        .nhomxam{
            height: 48px;
            width: 48px;
            background-color: gray;
            border-radius: 50%;
            border: none;
            margin: 10px;
            color: black;
            font-size: 18px;

        }

        .nhomden{
            height: 48px;
            width: 48px;
            background-color: #222222;
            color: white;
            opacity: 0,7;
            border-radius: 50%;
            border: none;
            margin: 10px;
            font-size: 18px;

        }

    </style>
</head>
<body>

    <div class="main">
        <div class="calculator">
          
            <input type="text" placeholder="0" id="ketqua">


            <button onclick="clearScreen()" class="nhomxam">AC</button>
            <button onclick="display('+/-')" class="nhomxam">+/-</button>
            <button onclick="display('%')" class="nhomxam">%</button>
            <button onclick="display('/')" >/</button>
            <button onclick="display('7')" class="nhomden">7</button>
            <button onclick="display('8')" class="nhomden">8</button>
            <button onclick="display('9')" class="nhomden">9</button>
            <button onclick="display('*')" >x</button>
<button onclick="display('4')" class="nhomden">4</button>
            <button onclick="display('5')" class="nhomden">5</button>
            <button onclick="display('6')" class="nhomden">6</button>
            <button onclick="display('-')" >-</button>
            <button onclick="display('1')" class="nhomden">1</button>
            <button onclick="display('2')" class="nhomden">2</button>
            <button onclick="display('3')" class="nhomden">3</button>
            <button onclick="display('+')" >+</button>
            <button onclick="display('0')" class="so0">0</button>
            <button style="opacity:0"></button>
            <button onclick="display('.')" class="nhomden">.</button>
            <button onclick="calculate()">=</button>
 
        </div>
    </div>
    
    <script type="text/javascript">
        function clearScreen() {
            document.getElementById('ketqua').value="";
        }

        function display(value){
            document.getElementById('ketqua').value+= value;
        }

        function calculate(){
            var a = document.getElementById('ketqua').value;
            var b = eval(a);
            document.getElementById('ketqua').value = b;
        }
    </script>

</html>

    
</body>
</html>