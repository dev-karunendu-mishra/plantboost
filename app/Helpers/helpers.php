<?php

use Carbon\Carbon;

if (!function_exists('formatDateRange')) {
    /**
     * Format a date range string like "4-8" to something like "Aug 24th - Aug 28th"
     *
     * @param string $range
     * @return string
     */
    function formatDateRange($range)
    {
        // Split the string to get the start and end days
        list($startDay, $endDay) = explode('-', $range);

        // Get the current month and year
        $month = now()->format('M');
        $year = now()->year;

        // Create Carbon instances for both start and end dates
        $startDate = Carbon::createFromDate($year, now()->month, $startDay);
        $endDate = Carbon::createFromDate($year, now()->month, $endDay);

        // Format the dates to include ordinal suffixes (like 24th, 28th)
        $startFormatted = $startDate->format('M jS');
        $endFormatted = $endDate->format('M jS');

        // Combine the formatted dates
        return "{$startFormatted} - {$endFormatted}";
    }
}

if (!function_exists('currentDate')) {
    /**
     * Get the current date formatted.
     *
     * @param string $format (Optional)
     * @return string
     */
    function currentDate($format = 'M jS')
    {
        return Carbon::now()->format($format);
    }
}

if (!function_exists('upcomingDateRange')) {
    /**
     * Get an upcoming date range starting from X days ahead until Y days ahead
     *
     * @param string $range The range in "start-end" format, e.g., "4-8"
     * @return string
     */
    function upcomingDateRange($range)
    {
        // Split the string to get the start and end days ahead
        list($startOffset, $endOffset) = explode('-', $range);

        // Get the current date
        $currentDate = Carbon::now();

        // Calculate start and end dates based on offsets
        $startDate = $currentDate->copy()->addDays(intval($startOffset));
        $endDate = $currentDate->copy()->addDays(intval($endOffset));

        // Format the dates to include ordinal suffixes (like Aug 29th)
        $startFormatted = $startDate->format('M jS');
        $endFormatted = $endDate->format('M jS');

        // Combine the formatted dates
        return "{$startFormatted} - {$endFormatted}";
    }
}
