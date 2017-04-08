<script type="text/javascript">// <![CDATA[
    function round(val)
    {
        return(Math.round(val*10000000)/10000000);
    }
    PI = 3.141592654;
    function pie()
    {
        document.keypad.display.value = PI;
    }
    function MakeArray(n){
        this.length=n;
        for(var i=1; i<=n; i++) this[i]=0;
        return this
    }
    link = new MakeArray(5);
    function enter(num)
    {
        document.keypad.display.value += num;
    }
    function calculate(sign)
    {
        var temp = document.keypad.display.value * 1;
        document.keypad.display.value = "";
        document.keypad.list.value = temp;
        link[1] = temp;
        if (sign == "/") {link[2] = "/"; document.keypad.list.value += " / ";}
        if (sign == "*") {link[2] = "*"; document.keypad.list.value += " * ";}
        if (sign == "-") {link[2] = "-"; document.keypad.list.value += " - ";}
        if (sign == "+") {link[2] = "+"; document.keypad.list.value += " + ";}
        if (sign == "p") {link[2] = "p"; document.keypad.list.value += " ^ ";}
    }
    function power()
    {
        temp = 1;
        n = link[3];
        for(var i=1; i<=n; i++) temp *= link[1];
        return(temp);
    }
    function equal()
    {
        if (link[2]) {
            if (document.keypad.display.value != "") {
                var temp = document.keypad.display.value * 1;
                document.keypad.list.value += temp;
                link[3] = temp;
                if (link[2] == "/") {res = link[1] / link[3]; document.keypad.display.value = round(res)}
                if (link[2] == "*") {res = link[1] * link[3]; document.keypad.display.value = round(res)}
                if (link[2] == "-") {res = link[1] - link[3]; document.keypad.display.value = round(res)}
                if (link[2] == "+") {res = link[1] + link[3]; document.keypad.display.value = round(res)}
                if (link[2] == "p") {document.keypad.display.value = round( power() )}
                link[1]=0; link[2]=0; link[3]=0;
            }
        }
    }
    function calc(code)
    {
        var temp = document.keypad.display.value * 1;
        if (code == 1) {temp1 = Math.sin(temp*PI/180); document.keypad.list.value = "sin "}
        if (code == 2) {temp1 = Math.cos(temp*PI/180); document.keypad.list.value = "cos "}
        if (code == 3) {temp1 = Math.tan(temp*PI/180); document.keypad.list.value = "tan "}
        if (code == 4) {temp1 = Math.sqrt(temp); document.keypad.list.value = "sqrt "}
        if (code == 5) {temp1 = Math.log(temp); document.keypad.list.value = "ln "}
        if (code == 6) {temp1 = 1/temp; document.keypad.list.value = "1/x, x="}
        if (code == 7) {temp1 = temp * temp; document.keypad.list.value = "x^2, x="}
        document.keypad.list.value += temp;
        document.keypad.display.value = round(temp1);
    }
    function fsolve()
    {
        var a = document.keypad.c1.value*1;
        var b = document.keypad.c2.value*1;
        var c = document.keypad.c3.value*1;
        if (a==0) {document.keypad.list.value = " Не является ";
            document.keypad.display.value = " квадратным уравнением"}
        else { x1 = (b*b-4*a*c);
            if ( x1 < 0) {document.keypad.list.value = " Мнимые корни";
                temp = (Math.sqrt(Math.abs(x1)))/(2*a);
                x2 = round(-b/(2*a)) + "+/- " + round(temp) + "i";
                document.keypad.display.value = x2}
            else {
                var x1 = (-b + Math.sqrt(b*b-4*a*c)) / (2*a);
                var x2 = (-b - Math.sqrt(b*b-4*a*c)) / (2*a);
                document.keypad.list.value = "x1 = " + round(x1);
                document.keypad.display.value = "x2 = " + round(x2);
            }
        }
    }
    function change()
    {
        var temp = document.keypad.display.value;
        if (temp.substring(0,1) == "-") {document.keypad.list.value = "";
            document.keypad.display.value = 0 - document.keypad.display.value * 1}
        if (temp.substring(0,1) != "-") {document.keypad.list.value = "";
            document.keypad.display.value = "-" + temp.substring(0,temp.length)}
    }
    function eraser()
    {
        document.keypad.list.value = "Онлайн калькулятор";
        document.keypad.display.value = "";
        document.keypad.c1.value = "";
        document.keypad.c2.value = "";
        document.keypad.c3.value = "";
        link[1]=0; link[2]=0; link[3]=0;
    }
    function backer()
    {
        var temp = document.keypad.display.value;
        document.keypad.display.value = temp.substring(0,temp.length*1 -1);
    }
    var memory = 0;
    function mem(val)
    {
        if (val == 1 ) {document.keypad.list.value = " --> Число успешно запомнено";
            memory = document.keypad.display.value * 1}
        if (val == -1) {document.keypad.display.value = memory}
        if (val == 0 ) {document.keypad.list.value = " Память калькулятора успешно очищена";
            document.keypad.display.value = ""; memory = 0}
    }
    function message()
    {
        alert('\n\nSend your comments and suggestions to:\n\n ----> aag4@lehigh.edu <----');
    }
    function travel(link)
    {
        window.open(link,"calculator","toolbar=1,location=1,status=1,scrollbars=1,directories=1,copyhistory=1,menubar=1,resizable=1")
    }
    var screen=" ";
    function eraser2()
    {
        var ans = confirm('\nDo you want to clear the entire CALCpad?\n');
        if (ans) {screen = document.notes.junk.value; document.notes.junk.value = "";}
    }
    function copy()
    {
        document.notes.junk.value = document.keypad.list.value+"\n"+document.keypad.display.value+"\n"+document.notes.junk.value;
    }
    function help()
    {
        screen = document.notes.junk.value;
        msg1 = "Following are some of the\ncalculator functions:\n";
        msg2 = "\n(<-> M) - Память калькулятора успешно очищена\n(--> M) - Число успешно запомнено\n(<-- M) - Число успешно выведено на экран";
        msg3 = "\n(<--) - Erase last character\n(x^y) - X to the power of Y";
        msg4 = "\n\nTo Go Back, click 'Restore CALCpad'";
        document.notes.junk.value = "";
        document.notes.junk.value = msg1 + msg2 + msg3 + msg4;
    }
    function restore()
    {
        document.notes.junk.value = "";
        document.notes.junk.value = screen;
    }
    // ]]>
</script>
<!--<table style="margin-left: auto; margin-right: auto; width: 100%; height: 100%" border="0" cellspacing="0" cellpadding="2">
    <tbody>
    <tr>
        <td style=" border-width: 1px; border-style: solid;" rowspan="2" valign="top">
            <table border="0">
                <tbody>
                <tr>
                    <td style="border-width: 1px; border-style: solid;" rowspan="2" valign="top">-->
<form name="keypad">
    <table border="1" cellspacing="0" cellpadding="2">
        <tbody>
        <tr>
            <td style="border-width: 1px; border-style: solid;" colspan="9" valign="top">
                <p style="text-align: center;" align="center">&nbsp;</p>
                <p style="text-align: center;" align="center"><span style=" font-family: 'comic sans ms', sans-serif; font-size: x-large;"><span style="color: #47727a; align: center" >SchoolHelper </span><span style="color: #47727a; align: center"> <br>Онлайн калькулятор</span></span></p>
                <p style="text-align: center;" align="center">&nbsp;</p>
            </td>
        </tr>
        <tr>
            <td style="border-width: 1px; border-style: solid;" colspan="6" valign="top"><span style="font-family: Verdana; font-size: small;">&nbsp;&nbsp;<input type="text" name="list" value="Онлайн калькулятор" size="22" /> </span></td>
            <td style="border-width: 1px; border-style: solid" colspan="3" valign="top">&nbsp; &nbsp; &nbsp;&nbsp;<input onclick="eraser()" type="button" name="mike1" value="Стереть" /></td>
        </tr>
        <tr>
            <td style="border-width: 1px; border-style: solid;" colspan="6" valign="top"><span style="font-family: Verdana; font-size: x-small;">&nbsp;&nbsp;<input type="text" name="display" size="22" /></span></td>
            <td style="border-width: 1px; border-style: solid;" colspan="2" valign="top">&nbsp; &nbsp; &nbsp;<input onclick="equal()" type="button" name="mike2" value="Посчитать" /></td>
            <td style="border-width: 1px; border-style: solid;" valign="top"><input onclick="backer()" type="button" name="mike3" value=" <&ndash;&ndash; " /></td>
        </tr>
        <tr>
            <td style="border-width: 1px; border-style: solid;" valign="top"><input onclick="enter(1)" type="button" name="mike4" value="  1  " /></td>
            <td style="border-width: 1px; border-style: solid;" valign="top"><input onclick="enter(2)" type="button" name="mike5" value="  2  " /></td>
            <td style="border-width: 1px; border-style: solid;" valign="top"><input onclick="enter(3)" type="button" name="mike6" value="  3  " /></td>
            <td style="border-width: 1px; border-style: solid;" valign="top">&nbsp;</td>
            <td style="border-width: 1px; border-style: solid;" valign="top"><input onclick="calculate('/')" type="button" name="mike7" value="  /  " /></td>
            <td style="border-width: 1px; border-style: solid;" valign="top">&nbsp;</td>
            <td style="border-width: 1px; border-style: solid;" valign="top"><input onclick="calc(1)" type="button" name="mike8" value="Синус" /></td>
            <td style="border-width: 1px; border-style: solid;" valign="top"><input onclick="calc(4)" type="button" name="mike9" value="Квадратный корень" /></td>
            <td style="border-width: 1px; border-style: solid;" valign="top"><input onclick="mem(0)" type="button" name="mike10" value="Очистить память" /></td>
        </tr>
        <tr>
            <td style="border-width: 1px; border-style: solid;" valign="top"><input onclick="enter(4)" type="button" name="mike11" value="  4  " /></td>
            <td style="border-width: 1px; border-style: solid;" valign="top"><input onclick="enter(5)" type="button" name="mike12" value="  5  " /></td>
            <td style="border-width: 1px; border-style: solid;" valign="top"><input onclick="enter(6)" type="button" name="mike13" value="  6  " /></td>
            <td style="border-width: 1px; border-style: solid;" valign="top">&nbsp;</td>
            <td style="border-width: 1px; border-style: solid;" valign="top"><input onclick="calculate('*')" type="button" name="mike14" value="  *  " /></td>
            <td style="border-width: 1px; border-style: solid;" valign="top">&nbsp;</td>
            <td style="border-width: 1px; border-style: solid;" valign="top"><input onclick="calc(2)" type="button" name="mike15" value="Косинус" /></td>
            <td style="border-width: 1px; border-style: solid;" valign="top"><input onclick="calc(7)" type="button" name="mike16" value="В квадрат" /></td>
            <td style="border-width: 1px; border-style: solid;" valign="top"><input onclick="mem(1)" type="button" name="mike17" value="Запомнить число" /></td>
        </tr>
        <tr>
            <td style="border-width: 1px; border-style: solid;" valign="top"><input onclick="enter(7)" type="button" name="mike18" value="  7  " /></td>
            <td style="border-width: 1px; border-style: solid;" valign="top"><input onclick="enter(8)" type="button" name="mike19" value="  8  " /></td>
            <td style="border-width: 1px; border-style: solid;" valign="top"><input onclick="enter(9)" type="button" name="mike20" value="  9  " /></td>
            <td style="border-width: 1px; border-style: solid;" valign="top">&nbsp;</td>
            <td style="border-width: 1px; border-style: solid;" valign="top"><input onclick="calculate('-')" type="button" name="mike21" value="  &ndash;  " /></td>
            <td style="border-width: 1px; border-style: solid;" valign="top">&nbsp;</td>
            <td style="border-width: 1px; border-style: solid;" valign="top"><input onclick="calc(3)" type="button" name="mike22" value="Тангенс" /></td>
            <td style="border-width: 1px; border-style: solid;" valign="top"><input onclick="calc(6)" type="button" name="mike23" value="Поделить 1 на введенное число" /></td>
            <td style="border-width: 1px; border-style: solid;" valign="top"><input onclick="mem(-1)" type="button" name="mike24" value="Показать запомненное число" /></td>
        </tr>
        <tr>
            <td style="border-width: 1px; border-style: solid;" valign="top"><input onclick="enter(0)" type="button" name="mike25" value="  0  " /></td>
            <td style="border-width: 1px; border-style: solid;" valign="top"><input onclick="enter('.')" type="button" name="mike26" value="  .  " /></td>
            <td style="border-width: 1px; border-style: solid;" valign="top"><input onclick="change()" type="button" name="mike27" value=" +/- " /></td>
            <td style="border-width: 1px; border-style: solid;" valign="top">&nbsp;</td>
            <td style="border-width: 1px; border-style: solid;" valign="top"><input onclick="calculate('+')" type="button" name="mike28" value="  +  " /></td>
            <td style="border-width: 1px; border-style: solid;" valign="top">&nbsp;</td>
            <td style="border-width: 1px; border-style: solid;" valign="top"><input onclick="pie()" type="button" name="mike29" value="Число пи" /></td>
            <td style="border-width: 1px; border-style: solid;" valign="top"><input onclick="calc(5)" type="button" name="mike30" value="Логарифм ln(x)" /></td>
            <td style="border-width: 1px; border-style: solid;" valign="top"><input onclick="calculate('p')" type="button" name="mike31" value="Поднести к степени" /></td>
        </tr>
        </tbody>
    </table>
</form>