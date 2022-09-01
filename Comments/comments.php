<!DOCTYPE html>
<html lang="ru">
<head>
  <title>Комментарии</title>
  <link rel="stylesheet" href="style.css">
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 <script>
  function showMore() {
var hidden = document.querySelectorAll('.news .hidden');
for (let i = 0; i < 3 && i < hidden.length; i++) {
hidden[i].classList.remove('hidden');
}
}
function clickSend(){
var author = $("#author").val(); // Получаем имя автора комментария
var message = $("#message").val(); // Получаем само сообщение
$.ajax({ // Аякс
type: "POST", // Тип отправки "POST"
url: "sendPost.php", // Куда отправляем(в какой файл)
data: {"author": author, "message": message}, // Что передаем и под каким значением 
success: function(response){ // Если все прошло успешно
console.log(responce);
if(response == 0){ 
$("#author").val("");
$("#message").val("");}
$("#commentBlock").append("<div class='hidden' style='border: 1px solid gray; margin-top: 1%; border-radius: 5px; padding: 0.5%;'>Автор: <strong>"+author+"</strong><br>"+message+"</div>");}});return false;
}

function locations(){
    window.location.href = '../Vhod/vhod.php';
  }
  </script>
 <style>
    .hidden{
      display:none;
    }

    /* Собственно сам слайдер */
.slider{
    max-width: 90%;
    position: relative;
    margin: auto;
    height: 300px;
    margin-bottom: 15px;
}
/* Картинка мастабируется по отношению к родительскому элементу */
.slider .item img {
    object-fit: cover;
    width: 100%;
    height: 300px;
    border: none !important;
    box-shadow: none !important;
}
/* Кнопки вперед и назад */
.slider .prev, .slider .next {
    cursor: pointer;
    position: absolute;
    top: 0;
    top: 50%;
    width: auto;
    margin-top: -22px;
    padding: 16px;
    color: white;
    font-weight: bold;
    font-size: 18px;
    transition: 0.6s ease;
    border-radius: 0 3px 3px 0;
}
.slider .next {
    right: 0;
    border-radius: 3px 0 0 3px;
}
/* При наведении на кнопки добавляем фон кнопок */
.slider .prev:hover,
.slider .next:hover {
    background-color: rgba(0, 0, 0, 0.8);
}
/* Заголовок слайда */
.slideText {
    position: absolute;
    color: #fff;
    font-size: 35px;
    /* Выравнивание текста по горизонтали и по вертикали*/
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    /* Тень*/
    text-shadow: 1px 1px 1px #000, 0 0 1em #000;
}
/* Кружочки */
.slider-dots {
    text-align: center;
}
.slider-dots_item{
    cursor: pointer;
    height: 12px;
    width: 12px;
    margin: 0 2px;
    background-color: #ddd;
    border-radius: 50%;
    display: inline-block;
    transition: background-color 0.6s ease;
}
.active,
.slider-dots_item:hover {
    background-color: #aaa;
}
/* Анимация слайдов */
.slider .item {
    -webkit-animation-name: fade;
    -webkit-animation-duration: 1.5s;
    animation-name: fade;
    animation-duration: 1.5s;
}
@-webkit-keyframes fade {
    from {
        opacity: .4
    }
    to {
        opacity: 1
    }
}
@keyframes fade {
    from {
        opacity: .4
    }
    to {
        opacity: 1
    }
}
  </style>

</head>

<body>
  
<?

  if($_SESSION['login'] == 'TRUE'){
   
  echo ' <form action="../Vhod/Exit.php" method="POST" ><button type="submit" class="btn btn-primary btn-block mb-4">Exit</button></form>';
  }
  else{
    echo ' <button type="button" onclick="locations()" class="btn btn-primary btn-block mb-4">Sign In</button>';
  }
  ?>
   <p>Слайдер комментариев</p>


<div class="slider">
  <div class="item">
<?
      include '../Connect/ConnectDB.php';
            $result = mysqli_query($link,"SELECT * FROM comments ORDER BY RAND()LIMIT 2"); /*Получаем все данные из таблицы*/
            $comment = $result->fetch_assoc(); /* В результирующий массив */
            $i=0;
            do{
              if($i==1 || $i==0){
                echo "<div class='comment' style='border: 1px solid gray; margin-top: 1%; border-radius: 5px; padding: 0.5%;'>Автор: <strong>".$comment['Author']."</strong><br>".$comment['Comments']."</div>"; // Выводим
                 }
                 $i+=1;
                }while($comment = $result->fetch_assoc());
          ?>
          </div>

  <div class="item">
  <?
      include '../Connect/ConnectDB.php';
            $result = mysqli_query($link,"SELECT * FROM comments ORDER BY RAND()LIMIT 2"); /*Получаем все данные из таблицы*/
            $comment = $result->fetch_assoc(); /* В результирующий массив */
            $i=0;
            do{
              if($i==2 || $i==3){
                echo "<div class='comment' style='border: 1px solid gray; margin-top: 1%; border-radius: 5px; padding: 0.5%;'>Автор: <strong>".$comment['Author']."</strong><br>".$comment['Comments']."</div>"; // Выводим
                 }
                 $i+=1;
                }while($comment = $result->fetch_assoc());
          ?>
  </div>

  <div class="item">
  <?
      include '../Connect/ConnectDB.php';
            $result = mysqli_query($link,"SELECT * FROM comments ORDER BY RAND()LIMIT 1"); /*Получаем все данные из таблицы*/
            $comment = $result->fetch_assoc(); /* В результирующий массив */
            $i=0;
            do{
              if($i==4){
                echo "<div class='comment' style='border: 1px solid gray; margin-top: 1%; border-radius: 5px; padding: 0.5%;'>Автор: <strong>".$comment['Author']."</strong><br>".$comment['Comments']."</div>"; // Выводим
                 }
                 $i+=1;
                }while($comment = $result->fetch_assoc());
 
          ?>
  </div>
  <a class="prev" onclick="minusSlide()">&#10094;</a>
  <a class="next" onclick="plusSlide()">&#10095;</a>
</div>
<br>

<div class="slider-dots">
<span class="slider-dots_item" onclick="currentSlide(1)"></span> 
  <span class="slider-dots_item" onclick="currentSlide(2)"></span> 
  <span class="slider-dots_item" onclick="currentSlide(3)"></span> 
</div>

   <div>Мужчины здесь, как и везде, были двух родов: одни тоненькие, которые всё увивались около дам; некоторые из них были такого рода, что с трудом можно было отличить их от петербургских, имели так же весьма обдуманно и со вкусом зачесанные бакенбарды или просто благовидные, весьма гладко выбритые овалы лиц, так же небрежно подседали к дамам, так же говорили по-французски и смешили дам так же, как и в Петербурге. Другой род мужчин составляли толстые или такие же, как Чичиков, то есть не так чтобы слишком толстые, однако ж и не тонкие. Эти, напротив того, косились и пятились от дам и посматривали только по сторонам, не расставлял ли где губернаторский слуга зеленого стола для виста. Лица у них были полные и круглые, на иных даже были бородавки, кое-кто был и рябоват, волос они на голове не носили ни хохлами, ни буклями, ни на манер «черт меня побери», как говорят французы, — волосы у них были или низко подстрижены, или прилизаны, а черты лица больше закругленные и крепкие. Это были почетные чиновники в городе. Увы! толстые умеют лучше на этом свете обделывать дела свои, нежели тоненькие. Тоненькие служат больше по особенным поручениям или только числятся и виляют туда и сюда; их существование как-то слишком легко, воздушно и совсем ненадежно. Толстые же никогда не занимают косвенных мест, а все прямые, и уж если сядут где, то сядут надежно и крепко, так что скорей место затрещит и угнется под ними, а уж они не слетят. Наружного блеска они не любят; на них фрак не так ловко скроен, как у тоненьких, зато в шкатулках благодать божия. У тоненького в три года не остается ни одной души, не заложенной в ломбард; у толстого спокойно, глядь — и явился где-нибудь в конце города дом, купленный на имя жены, потом в другом конце другой дом, потом близ города деревенька, потом и село со всеми угодьями. Наконец толстый, послуживши богу и государю, заслуживши всеобщее уважение, оставляет службу, перебирается и делается помещиком, славным русским барином, хлебосолом, и живет, и хорошо живет. А после него опять тоненькие наследники спускают, по русскому обычаю, на курьерских все отцовское добро.</div>
  <?
  if($_SESSION['login'] == 'TRUE'){
echo '<form>
<p class="is-h">Автор:<br> <input name="author" type="text" class="is-input" id="author"></p>
<p class="is-h">Текст сообщения:<br><textarea name="message" rows="5" cols="50" id="message"></textarea></p>
<button id="send" name="button" onclick="clickSend()" class="is-button">Отправить</button>
</form>
';
  }
  ?>
 

  <p>Комментарии к статье</p>

  <div id="commentBlock" class="news">
  <?php
            include '../Connect/ConnectDB.php';
            $result = mysqli_query($link,"SELECT * FROM comments"); /*Получаем все данные из таблицы*/
            $comment = $result->fetch_assoc(); /* В результирующий массив */
            $i=0;
            do{
              if($i<=2){
                echo "<div class='comment' style='border: 1px solid gray; margin-top: 1%; border-radius: 5px; padding: 0.5%;'>Автор: <strong>".$comment['Author']."</strong><br>".$comment['Comments']."</div>"; // Выводим
              }
              else{
                echo "<div class='hidden' style='border: 1px solid gray; margin-top: 1%; border-radius: 5px; padding: 0.5%;'>Автор: <strong>".$comment['Author']."</strong><br>".$comment['Comments']."</div>"; // Выводим
              }
          $i+=1;
            }while($comment = $result->fetch_assoc());
          ?>
          
  </div>
  <br><button onclick="showMore()">Показать еще</button>
  <script src="script.js"></script>	
</body>
</html>
