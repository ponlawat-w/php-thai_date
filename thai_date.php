<?php
/**
 * function thai_date()
 */

const THAI_DATE_MONTHS = array('', 'มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม');
const THAI_DATE_SHORT_MONTHS = array('', 'ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.');
const THAI_DATE_DAYS = array('อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์');
const THAI_DATE_SHORT_DAYS = array('อา.', 'จ.', 'อ.', 'พ.', 'พฤ.', 'ศ.', 'ส.');
const THAI_DATE_SEARCH_KEYWORDS = array('฿วทวท', '฿วท', '฿วว', '฿ว', '฿ดด', '฿ด', '฿ปปปป', '฿ปป');

/**
 * thai_date() ฟังก์ชันสำหรับแสดงผลวันที่ภาษาไทยในรูปแบบที่กำหนด
 * @param string $format
 * @param bool|int $timestamp
 * @return false|string
 */
function thai_date($format, $timestamp = false)
{
    if($timestamp === false)
    {
        $timestamp = time();
    }

    $replace = array(
        'd',
        'j',
        THAI_DATE_DAYS[date('w', $timestamp)],
        THAI_DATE_SHORT_DAYS[date('w', $timestamp)],
        THAI_DATE_MONTHS[date('n', $timestamp)],
        THAI_DATE_SHORT_MONTHS[date('n', $timestamp)],
        date('Y', $timestamp) + 543,
        substr(date('Y', $timestamp) + 543, strlen(date('Y', $timestamp) + 543) - 2, 2)
    );

    $format = str_replace(THAI_DATE_SEARCH_KEYWORDS, $replace, $format);

    return date($format, $timestamp);
}