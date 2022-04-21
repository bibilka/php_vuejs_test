<h1>Добро пожаловать!</h1>
<p>
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed a porta ipsum. Donec augue nunc, faucibus in arcu et, tristique tincidunt sapien. Aliquam erat volutpat. Mauris ut ante ac urna hendrerit varius quis ut leo. Sed ultrices blandit tristique. Vivamus id condimentum magna. Morbi ullamcorper, orci vitae auctor porta, neque leo porttitor erat, eu iaculis urna felis ac lacus. Aenean ac urna id urna posuere gravida ut eget dolor. Quisque enim lacus, condimentum ut sem eget, pellentesque rutrum est. Vestibulum dapibus lorem quam. Nam ut lectus sollicitudin, dictum justo sit amet, tempus urna. Aenean vel justo et nisl molestie finibus. Nam et commodo lacus.
</p>
<table>
Все проекты в следующей таблице являются вымышленными, поэтому даже не пытайтесь перейти по приведенным ссылкам.
<tr><td>Год</td><td>Проект</td><td>Описание</td></tr>
<?php

	foreach($test as $row)
	{
		echo '<tr><td>'.$row['Year'].'</td><td>'.$row['Site'].'</td><td>'.$row['Description'].'</td></tr>';
	}
	
?>
</table>