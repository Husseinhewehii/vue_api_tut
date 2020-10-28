<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Repositories\AgencyRepository;
use Illuminate\Http\Request;
use App\Agency;


class AgenciesController extends BaseController
{
    

    private $agencyRepository;
    protected $locationRepository;
   

    public function __construct(AgencyRepository $agencyRepository)
    {
        $this->agencyRepository = $agencyRepository;
    }

    public function index(Request $request)
    {
        request()->query->set('active', 1);
        $list = $this->agencyRepository->searchFromRequest(request())->paginate(30);
        $list->appends(request()->all());
//        $locationsHaveagencies = $this->locationRepository->locationsHaveagencies(request());
//        $agenciesCount = $this->locationRepository->agenciesCount();
          $data = [
            'list' => $list,
            'totalAgencies'=>$list->total(),
        ];

        if ($request->ajax()) {
            $view = view('web.agencies.agenciesFiltrationLoadMore', compact('data'))->render();
            return response()->json(['html' => $view]);
        }

        return view('web.agencies.agenciesFiltration')->with($data);
    }

}
