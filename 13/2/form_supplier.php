<!DOCTYPE html>
<html lang="ru">
<head>
    
    <meta charset="UTF-8">
    <title>form_suppliers</title>
    
</head>
<body>

<pre>
<form action="" method="post" id="user_form">
    <div id="out">Введите Имя : <input name="first_name" value="" id="first_name" autofocus></div>
     <div class="error hide" id="first_name_error">Имя должно состоять из 2 букв или более..</div>
    <div id="out">Введите Фамилию : <input name="last_name" value="" id="last_name"></div>
     <div class="error hide" id="last_name_error">Фамилия должна состоять из 2 букв или более..</div>
    <div id="out">Название компании : <input name="company" value="" id="company"></div>
     <div class="error hide" id="company_error">Название Вашей компании слижком короткое!2 симовба или более</div>
    <div id="out">Ваш город : <input name="city" value="" id="city"></div>
     <div class="error hide" id="city_error">Название Вашего города слижком которкое!2 симовба или более</div>
    <div id="out">Ваша страна : <input name="country" value="" id="country"></div>
     <div class="error hide" id="country_error">Название Вашей страны слижком короткое!2 симовба или более</div>
          <div>
               <button type="submit" name="submit" id="sub">Отправить</button>
              
               <input type="reset"  id="resset" value="Стереть!">
          </div>
    
    <marquee behavior="alternate" direction="right">Заполните форму!</marquee>

</pre>
</form>

</body>
</html>
