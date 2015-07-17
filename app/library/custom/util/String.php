<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Custom\Util;

/**
 * Description of String
 *
 * @author LUANLV
 */
class String {

    public static function stripAccents($strInput, $replaceSpace = '', $code = 'utf-8', $stripSpace = false, $arrIgnore = array()) {        
        $strOutput = html_entity_decode($strInput);
        $vietU = array();
        $vietL = array();
        if (strtolower($code) == 'utf-8') {
            $i = 0;
            $vietU[$i++] = array('A', array("/Á/", "/À/", "/Ả/", "/Ã/", "/Ạ/", "/Ă/", "/Ắ/", "/Ằ/", "/Ẳ/", "/Ẵ/", "/Ặ/", "/Â/", "/Ấ/", "/Ầ/", "/Ẩ/", "/Ẫ/", "/Ậ/"));
            $vietU[$i++] = array('O', array("/Ó/", "/Ò/", "/Ỏ/", "/Õ/", "/Ọ/", "/Ô/", "/Ố/", "/Ồ/", "/Ổ/", "/Ộ/", "/Ơ/", "/Ớ/", "/Ờ/", "/Ớ/", "/Ở/", "/Ỡ/", "/Ợ/"));
            $vietU[$i++] = array('E', array("/É/", "/È/", "/Ẻ/", "/Ẽ/", "/Ẹ/", "/Ê/", "/Ế/", "/Ề/", "/Ể/", "/Ễ/", "/Ệ/"));
            $vietU[$i++] = array('U', array("/Ú/", "/Ù/", "/Ủ/", "/Ũ/", "/Ụ/", "/Ư/", "/Ứ/", "/Ừ/", "/Ử/", "/Ữ/", "/Ự/"));
            $vietU[$i++] = array('I', array("/Í/", "/Ì/", "/Ỉ/", "/Ĩ/", "/Ị/"));
            $vietU[$i++] = array('Y', array("/Ý/", "/Ỳ/", "/Ỷ/", "/Ỹ/", "/Ỵ/"));
            $vietU[$i++] = array('D', array("/Đ/"));
            $i = 0;
            $vietL[$i++] = array('a', array("/á/", "/à/", "/ả/", "/ã/", "/ạ/", "/ă/", "/ắ/", "/ằ/", "/ẳ/", "/ẵ/", "/ặ/", "/â/", "/ấ/", "/ầ/", "/ẩ/", "/ẫ/", "/ậ/"));
            $vietL[$i++] = array('o', array("/ó/", "/ò/", "/ỏ/", "/õ/", "/ọ/", "/ô/", "/ố/", "/ồ/", "/ổ/", "/ỗ/", "/ộ/", "/ơ/", "/ớ/", "/ờ/", "/ở/", "/ỡ/", "/ợ/"));
            $vietL[$i++] = array('e', array("/é/", "/è/", "/ẻ/", "/ẽ/", "/ẹ/", "/ê/", "/ế/", "/ề/", "/ể/", "/ễ/", "/ệ/"));
            $vietL[$i++] = array('u', array("/ú/", "/ù/", "/ủ/", "/ũ/", "/ụ/", "/ư/", "/ứ/", "/ừ/", "/ử/", "/ữ/", "/ự/"));
            $vietL[$i++] = array('i', array("/í/", "/ì/", "/ỉ/", "/ĩ/", "/ị/"));
            $vietL[$i++] = array('y', array("/ý/", "/ỳ/", "/ỷ/", "/ỹ/", "/ỵ/"));
            $vietL[$i++] = array('d', array("/đ/"));
        }
        for ($i = 0; $i < count($vietL); $i++) {
            $strOutput = preg_replace($vietL[$i][1], $vietL[$i][0], $strOutput);
            $strOutput = preg_replace($vietU[$i][1], $vietU[$i][0], $strOutput);
        }
        if ($stripSpace) {
            $strOutput = str_replace(' ', '', $strOutput);
        }
        if ($replaceSpace) {
            if (!empty($arrIgnore)) {
                return preg_replace(array('[^[^a-zA-Z0-9,]+|[^a-zA-Z0-9,]+$]', '[[^a-zA-Z0-9,]+]'), array('', $replaceSpace), $strOutput);
            }
            return preg_replace(array('[^[^a-zA-Z0-9]+|[^a-zA-Z0-9]+$]', '[[^a-zA-Z0-9]+]'), array('', $replaceSpace), $strOutput);
        }
        return $strOutput;
    }

}
