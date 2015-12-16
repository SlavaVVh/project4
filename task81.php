<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Изучаю PHP</title>
</head>
<body>

	<form method="get">
	  <p>Расчет скорости</p>
		<p>Пройденный путь: <input type= "text" name="way" value="<?=$_REQUEST["way"]?>"></p>
		<p>Время в пути: <input type= "text" name="time" value="<?=$_REQUEST["time"]?>"></p>

		<p style="text-indent: 160px;"><input type="submit" value="Расчитать"></p>	
	</form>	

	<?php
		
	class CSpeed
	{
		public static $mark = 'Toyota';
		public static $type = 'Седан';
		public static $wheel = 4;
		public static $maxSpeed = 250;

		public $way;
		public $time;

		public $speed_m;
		public $speed_km;

		public function __construct($way, $time)
		{
			$this->way = $way;
			$this->time = $time;
			$this->cal_speed($way, $time);
			$this->display();
		}

		public function cal_speed($way, $time)
		{
			$speed_m = $way * 1000 / ($time * 3600);
			$this->speed_m = number_format($speed_m);
			$speed_km = $way / $time;
			$this->speed_km = number_format($speed_km);
		}
    public function display()
    {
    	?>
      <p>Ваша машина марки: <?=self::$mark?>, тип кузова <?=self::$type?> двигалась со скоростью
         <?=$this->speed_km?> км/ч или <?=$this->speed_m?> м/с.</p>
      <?php
    }
    
	}
$way = $_REQUEST['way'];
$time = $_REQUEST['time'];
$speed = new CSpeed($way, $time);

	?>
		


	</body>
	</html>	