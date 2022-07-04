<?php

declare(strict_types = 1);

namespace App\Charts\Hr;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use App\Models\Hr\HrEmployee;

class AgeChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $countBelowForty= HrEmployee::where('date_of_birth','>=',\Carbon\Carbon::now()->subYears(40))->whereIn('hr_status_id',array(1,5))->count();

        $countBelowFifty= HrEmployee::where('date_of_birth','>=',\Carbon\Carbon::now()->subYears(50))->whereIn('hr_status_id',array(1,5))->count() - $countBelowForty;

        $countBelowSixty= HrEmployee::where('date_of_birth','>=',\Carbon\Carbon::now()->subYears(60))->whereIn('hr_status_id',array(1,5))->count() - $countBelowForty - $countBelowFifty;

        $countBelowSeventy= HrEmployee::where('date_of_birth','>=',\Carbon\Carbon::now()->subYears(70))->whereIn('hr_status_id',array(1,5))->count() - $countBelowForty - $countBelowFifty - $countBelowSixty;

        $countAboveSeventy= HrEmployee::whereIn('hr_status_id',array(1,5))->count()-$countBelowForty-$countBelowFifty - $countBelowSixty - $countBelowSeventy;


        return Chartisan::build()
            ->labels(['Below Forty', 'Below fifty', 'Below Sixty','Below Seventy','Above Seventy'])
            ->dataset('Age', [$countBelowForty,  $countBelowFifty, $countBelowSixty,$countBelowSeventy,$countAboveSeventy ]);
    }
}