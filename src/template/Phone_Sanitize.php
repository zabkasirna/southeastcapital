<?php

/**
 * Phone Sanitize Function
 * @since 0.0.0
 * @depends libphonenumber/PhoneNumberUtil
 */

// use libphonenumber\PhoneNumberUtil;

function sanitize_phone( $raw ) {
    // $_PhoneUtil = new PhoneNumberUtil;
    $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();
    $phoneProto = $phoneUtil->parse($raw, "ID");
    $isValid = $phoneUtil->isValidNumber($phoneProto);
    $result = $isValid ?
        $phoneUtil->format($phoneProto, \libphonenumber\PhoneNumberFormat::INTERNATIONAL) :
        "#"
        ;
    return $result;
}