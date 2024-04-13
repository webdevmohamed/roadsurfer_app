<?php

class DateTimeFormater
{

    function secondsToTime($seconds) {
        $dateTimeUnix = new DateTime('@0');
        $dateTime = new DateTime("@$seconds");
        $dateTimeDiff = $dateTimeUnix->diff($dateTime);

        $readableOutput = '';
        if ($dateTimeDiff->y > 0) {
            $readableOutput .= $dateTimeDiff->y . ' year' . ($dateTimeDiff->y > 1 ? 's' : '') . ', ';
        }
        if ($dateTimeDiff->d > 0) {
            $readableOutput .= $dateTimeDiff->d . ' day' . ($dateTimeDiff->d > 1 ? 's' : '') . ', ';
        }
        if ($dateTimeDiff->h > 0) {
            $readableOutput .= $dateTimeDiff->h . ' hour' . ($dateTimeDiff->h > 1 ? 's' : '') . ', ';
        }
        if ($dateTimeDiff->i > 0) {
            $readableOutput .= $dateTimeDiff->i . ' minute' . ($dateTimeDiff->i > 1 ? 's' : '') . ', ';
        }
        if ($dateTimeDiff->s > 0) {
            $readableOutput .= $dateTimeDiff->s . ' second' . ($dateTimeDiff->s > 1 ? 's' : '') . ', ';
        }

        if ($readableOutput === '') {
            $readableOutput = '0 seconds';
        } else {
            $readableOutput = rtrim($readableOutput, ', ');
        }

        return $readableOutput;
    }

}