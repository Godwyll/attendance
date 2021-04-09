<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Facades;
// use Illuminate\Support\Facades\DB;

class Helpers
{
    public function __construct(){

    }

    // Function to Get User's Full Name
    public static function getUserName($user_id){
        $user = App\User::where('id', $user_id)->first();
        $fullname = $user->firstname." ".$user->lastname;
        return $fullname;
    }

    // TimeAgo Function
    public static function timeAgo($oldTime){
        if(isset($oldTime)){
        $newTime = date("Y-m-d H:i:s");
        $month = date(("F"), strtotime($oldTime));
        $month = substr($month,0,3);

        $timeCalc = strtotime($newTime) - strtotime($oldTime);
        if ($timeCalc >= (60*60*24*30*12*2)){
                $timeCalc = date(("j "), strtotime($oldTime)). $month ." ". date(("Y, g:i A"), strtotime($oldTime));
            }else if ($timeCalc >= (60*60*24*30*12)){
                $timeCalc = date(("j "), strtotime($oldTime)). $month ." ". date(("Y, g:i A"), strtotime($oldTime));
            }else if ($timeCalc >= (60*60*24*30*2)){
                $timeCalc = $month ." ". date(("j, g:i A"), strtotime($oldTime));
            }else if ($timeCalc >= (60*60*24*30)){
                $timeCalc = $month ." ". date(("j, g:i A"), strtotime($oldTime));
            }else if ($timeCalc >= (60*60*24*2)){
                $timeCalc = $month ." ". date(("j, g:i A"), strtotime($oldTime));
            }else if ($timeCalc >= (60*60*24)){
                $timeCalc = " Yesterday, ". date(("g:i A"), strtotime($oldTime));
            }else if ($timeCalc >= (60*60*2)){
                $timeCalc = $month." ". date(("j, g:i A"), strtotime($oldTime));
            }else if ($timeCalc >= (60*60)){
                $timeCalc = " Today, ". date(("g:i A"), strtotime($oldTime));
            }else if ($timeCalc >= 60*2){
                $timeCalc = intval($timeCalc/60) . " minutes ago";
            }else if ($timeCalc >= 60){
                $timeCalc = intval($timeCalc/60) . " minute ago";
            }else if ($timeCalc > 0){
                $timeCalc .= " seconds ago";
            }else if ($timeCalc == 0){
                $timeCalc = " now";
            }
        return $timeCalc;
        }else{
            return $timeCalc=NULL;
        }
    }

    // Cool Date Function 
    public static function coolDate($date){
        if(isset($date)){
            $coolDate = date("D, jS M Y", strtotime($date));
            return $coolDate;
        }else{
            return $coolDate=NULL;
        }
    }

    // Time Meridian
    public static function coolTime($time){
        return date(("g:i a"), strtotime($time));
    }

    // Cool DateTime Function 
    public static function coolDateTime($date){
        if(isset($date)){
        $coolDate = date("D, jS M Y g:i a", strtotime($date));
        return $coolDate;
        }else{
            return $coolDate=NULL;
        }
    }

    public static function logLogin($user_id, $ip_address){
        $login = new App\Login;
        $login->user_id = $user_id;
        $login->ip_address = $ip_address;
        return $login->save();
    }

    // Function to Truncate Text
    public static function truncate($text, $length){
        if(strlen($text)>$length){
            $truncate = substr($text, 0, $length)."...";
            return $truncate;
        }else{
            return $text;
        }
    }

    // Function to Calculate Date from a Given Number of Day(s)
    // public static function dateFromDays($days){
    //     $dateCalc = strtotime(date('Y-m-d ').'00:00:00 - '.$days.' day');
    //     $dateResult = date('Y-m-d H:i:s', $dateCalc);
    //     return $dateResult;
    // }

    // Function to Calculate Date from a Given Number of Day(s)
    public static function dateFromDays($days){
        $dateCalc = strtotime(date('Y-m-d ').'00:00:00 - '.$days.' day');
        $dateResult = date('Y-m-d H:i:s', $dateCalc);
        return $dateResult;
    }

    // Function to Return Submission count per (n) days.
    public static function countPerDays($days){
        $feedbackCount = \App\Submission::where('created_at', '>=', Helpers::dateFromDays($days))->get();
        return $feedbackCount;
    }

    // Function to Return Submission count per Week (n).
    public static function countPerWeek($week){
        
        // $feedbackCount = \App\Submission::where('created_at', '>=', Helpers::dateFromDays($days))->get();
        return $feedbackCount;
    }

    // Function to Return Submission count per a given date.
    public static function countPerDate($date){
        $feedbackCount = \App\Submission::where('created_at', 'like', $date.'%')->get();
        return $feedbackCount;
    }

    // Function to Return Submission count per a given date.
    public static function userTypePerDate($userType, $date){
        $feedbackCount = \App\Submission::where('user_type', $userType)->where('created_at', 'like', $date.'%')->get();
        return $feedbackCount;
    }

    // Function to return periodic Submission
    public static function thisPeriod($period){
        $feedbackCount = \App\Submission::where('created_at', strtotime($period));
        return $feedbackCount;
    }

    // Function to return Submission Type
    public static function getSubmissionType($id){        
        if($id == 1){
            $name = "Feedback";
        }elseif($id == 2){
            $name = "Idea";
        }else{
            $name = NULL;
        }
        return $name;
    }

    // Function to return Category by Content Id
    public static function getCategory($contentId){
        if($contentId != 0){
            $category = \App\Category::find($contentId)->name;
        }else{
            $category = 'Other';
        }
        return $category;
    }

    // Function to return colour code for Tagged Item
    public static function getStatus($submissionId){
        if($submission  = \App\SubmissionAction::where('submission_id', $submissionId)->first()){
            $action = \App\Action::find('$submission->action_id');
            return $action->action;
        }
        return "Pending";
    }

    // Function to return colour code for Tagged Item
    public static function statusColor($submissionId){
        if($submission  = \App\SubmissionAction::where('submission_id', $submissionId)->first()){
            switch($submission->action_id){
                case 1: 
                    $color = "blue";
                    break;
                case 2: 
                    $color = "orange";
                    break;
                case 3: 
                    $color = "red";
                    break;
                default: 
                    $color = "green";
                    break;
            }
            return $color;
        }
        return NULL;
    }

}