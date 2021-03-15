<?php
/**
 * Created by PhpStorm.
 * User: Klimy Florez
 * Date: 25/03/2020
 * Time: 4:40 PM
 */

namespace App\Helpers;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;

class Util
{
    /**
     * @param $class
     * @param $request
     * @param null $id
     * @return mixed
     */
    public static function updateOrCreate($class, $request, $id = null){

        return $class::updateOrCreate((is_array($id))?$id:['id' => $id], ($request instanceof Request)?$request->all():$request);

    }

    /**
     * Add toast message to array data
     *
     * @param array $data
     * @param bool  $destroy
     */
    public static function addToastToData(array &$data, $destroy = false)
    {
        if ($data['success']) {
            $data['toast']['tipo'] = 'success';
            $data['toast']['titulo'] = __('toast.titulo.si');
            $data['toast']['mensaje'] = __('toast.mensaje.si');

            if ($destroy){
                $data['toast']['mensaje'] = __('toast.mensaje.eliminado.si');
            }
        } else {
            $data['toast']['tipo'] = 'error';
            $data['toast']['titulo'] = __('toast.titulo.no');
            $data['toast']['mensaje'] = __('toast.mensaje.no');

            if ($destroy){
                $data['toast']['mensaje'] = __('toast.mensaje.eliminado.no');
            }
        }
    }

    public static function formatDate(Carbon $date, $format = 'h:i A j F', $addYearToEnd = true)
    {
        if ($date->year != now()->year && $addYearToEnd){
            $format .= ' Y';
        }

        return $date->format($format);
    }

    public static function monthsOfYear() {
        $monthNum = Carbon::now()->format('m');
        $months = array();

        for($j=0; $j < $monthNum; $j++) {
            $dateObj   = DateTime::createFromFormat('!m', $j+1);
            $monthName = __('months.'.$dateObj->format('F'));
            array_push($months, $monthName);
        }

        return $months;
    }

    /**
     * Genera un color Hexadecimal aleatorio
     *
     * @return string
     */
    public static function randomColor()
    {
        return  sprintf('#%06X', mt_rand(0, 0xFFFFFF));
    }

    /**
     * @param Request $request
     * @param array $values
     * @return array
     */
    public static function removeCurrencyMask(Request $request, array $values = []){
        $data = $request->except($values);
        foreach ($values as $value){
            if($request->has("{$value}")){
                $data[$value] = str_replace(['$', ','], ['', ''], $request->get("{$value}"));
            }
        }
        return $data;
    }
}
