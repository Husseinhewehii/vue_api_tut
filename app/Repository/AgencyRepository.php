<?php

namespace App\Repositories;

use App\Agency;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;

class AgencyRepository
{
    public function searchFromRequest($request)
    {
        $agency = Agency::orderBy('id', 'DESC')->whereHas('location');
     
        if($request->filled('word')) {
            $agency->where('name', 'like', '%' . $request->query->get('word') . '%');
        }
        
        if($request->filled('active')) {
            $agency->where('active', $request->query->get('active'));  
        }

        if($request->filled('country_id')) {
            $agency->whereHas('location.parent', function ($query) use ($request) {
                $query->whereIn('id',$request->query->get('country_id'));
            });
        }

        if($request->filled('date')) {
            $agency->whereRaw('DATE(created_at) = ?', $request->query->get('date'))  ;
        }
        // if ($request->filled('country_key')) {
        //     $agency->whereIn('location_id', $request->query->get('country_key'));
        // }
        if ($request->filled('residence_city')) {
            $agency->whereIn('location_id', $request->query->get('residence_city'));
        }
        if ($request->has('name') && !empty($request->get('name'))) {
                $agency->where('name', 'like', '%' . $request->query->get('name') . '%');
        } 

        return $agency;
    }


    public function Charts(Request $request)
    {
        $agency = Agency::select(DB::raw('count(id) as `number`'), DB::raw("DATE_FORMAT(created_at, '%d') as 'day'"));


        if ($request->has('from_date') && $request->get('from_date') != "") {
            $agency->where('created_at', '>=', $request->get('from_date'));
        }
        if ($request->has('to_date') && $request->get('to_date') != "") {
            $agency->where('created_at', '<=', $request->get('to_date'));
        }

        if($request->filled('countries')) {
            $agency->whereHas('location.parent', function ($query) use ($request) {
                $query->whereIn('id',$request->query->get('countries'));
            });
        }
        $agency->groupby('day');

        return $agency;
    }


   
}
