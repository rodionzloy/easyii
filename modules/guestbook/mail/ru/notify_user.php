<?php
use yii\helpers\Html;

$this->title = $subject;
?>
<table>
  <tr>
    <td width="200px"><img src="http://lextime-tomsk.ru/img/lexitme.png" width="150px"></td>
    <td><b style="color:#28a049">Юридическое агенство Lextime<br></b><b style="color:#28a049">г.Томск ул. Обруб 10а</b><br><b style="color:#28a049">тел 50 45 25</b></td>
  </tr>
</table>
<hr>
<p style="margin-bottom: 16px"><b>Ответ юристов Lextime на ваш вопрос: </b></p>
<p><?= $answer ?></p>