<?php

namespace app\components;

use Yii;
use yii\base\Component;

class Util extends Component
{
	const DATE_FORMAT = 'd/m/Y';
	const DATETIME_FORMAT = 'd/m/Y H:i';
	const TIME_FORMAT = 'H:i';
	const DATE_FORMAT_SQL = 'Y-m-d';
	const DATETIME_FORMAT_SQL = 'Y-m-d H:i:s';

	public static function configDate(){
		//configuração para o DatePicker::classname()

		$configData = [
            'template' => '{addon}{input}',
            'language' => 'pt',
            'clientOptions' => [
                'autoclose' => true,
                'clearBtn' => true,
                'format' => 'dd/mm/yyyy',
                'todayBtn' => 'linked',
                'todayHighlight' => 'true',
                'weekStart' => '1',
                'calendarWeeks' => 'true',
                'orientation' => 'top left',
                'hourFormat' => "24"
            ],
            'maskOptions' => [
                'alias' => 'dd/mm/yyyy'
            ],
        ];
		return  $configData;
	}

	public static function converteDataSQL($dateStr, $type='date', $format = null) {
		$date = new \DateTime(str_replace('/', '-',$dateStr));
		if ($type === 'datetime') {
			$fmt = ($format == null) ? self::DATETIME_FORMAT_SQL : $format;
		}
		else {
			$fmt = ($format == null) ? self::DATE_FORMAT_SQL : $format;
		}
		return $date->format($fmt);
	}

	public static function converteData($dateStr, $type='date', $format = null) {
		$date = new \DateTime($dateStr);
		if ($type === 'datetime') {
			$fmt = ($format == null) ? self::DATETIME_FORMAT : $format;
		}
		elseif ($type === 'time') {
			$fmt = ($format == null) ? self::TIME_FORMAT : $format;
		}
		else {
			$fmt = ($format == null) ? self::DATE_FORMAT : $format;
		}
		return $date->format($fmt);
	}

}