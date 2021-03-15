<?php
/**
 * User: Ing. Oswaldo Montes Severiche
 * Date: 2019-04-16
 * Time: 16:05
 */

namespace App\Presenters;


use App\Helpers\Util;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UtilsPresenter
{
    /**
     * @param int $min
     * @param null $max
     * @return int
     */
    public function getRandomInteger($min = 0, $max = null)
    {
        return rand($min, $max);
    }

    /**
     * @param Carbon $date
     * @param string $format
     * @return string
     */
    public function formatDate(Carbon $date, $format = 'd \\of M \\of Y, h:m a')
    {
        setlocale(LC_ALL,"es_ES");
        return Util::formatDate($date, $format);
    }

    /**
     * @param Carbon $date
     * @param string $format
     * @return string
     */
    public function isoFormat(Carbon $date, $format = 'LL, h:m a'){
        return $date->locale('es_CO')->isoFormat($format);
    }

    public function mostrarNotificaciones()
    {
        $datos['notifications'] = Auth::user()->unreadNotifications?? [];
        $datos['presenter'] = new UtilsPresenter();
        $datos['user'] = Auth::user();
        return view('layouts._notification', $datos)->render();
    }

    /**
     * Se formatea una fecha al formato establecido
     *
     * @param Carbon $fecha
     * @param string $formato
     * @return string
     */
    public function formatearFecha(Carbon $fecha, $formato = 'd M Y, h:m a')
    {
        return $fecha->format($formato);
    }

    public static function strTolower($value){
        return Str::lower($value);
    }

}
